<?php
require_once("db_connection.php");
require("jsontabla.class.php");

// Chart sa prosječnim ocjenama
$statistikachart="
SELECT CONCAT('Ocjena ', GProsjek,': ', Skupina) As Legenda, Brojcic FROM 
(
SELECT count(Prosjek) AS Brojcic, GROUP_CONCAT(nazPred SEPARATOR ', ') AS Skupina,
IF(Prosjek < 2, 1,
IF(Prosjek >= 2 AND Prosjek < 2.5,2,
IF( Prosjek >= 2.5 AND Prosjek < 3.5,3,
IF( Prosjek >= 3.5 AND Prosjek < 4.5,4,
5)))) AS GProsjek 
FROM (
Select
AVG(ispit.ocjena) AS Prosjek,
pred.nazPred
FROM stud inner join ispit on stud.mbrStud=ispit.mbrStud
inner join nastavnik on nastavnik.sifNastavnik=ispit.sifNastavnik
inner join pred on pred.sifPred=ispit.sifPred 
GROUP BY pred.nazPred
) AS grupna
GROUP BY GProsjek
) AS xxl

";

$jsonStatistikaChart=new jsontabla($statistikachart);


$studenti_iz_84_85="
select 
stud.imeStud AS 'Ime studenta', 
stud.prezStud AS 'Prezime studenta', 
year(stud.datRodStud) as 'Godina', 
month(stud.datRodStud) as 'Mjesec' 
from fakultet.stud
group by mbrStud
having Godina = 1984 and Mjesec in (10,11,12) 
OR Godina= 1985 and Mjesec in (1,2) 
ORDER BY Godina,Mjesec  
LIMIT 7
    ";
$json1=new jsontabla($studenti_iz_84_85);



$rezervacijeispitashort="
Select DISTINCT 
pred.nazPred,
concat(stud.imeStud,' ',stud.prezStud) AS 'Opis',
DATE_FORMAT(ispit.datIspit,'%Y-%m-%d') AS 'Datum1',
DATE_FORMAT(DATE_ADD(ispit.datIspit,INTERVAL 1 DAY),'%Y-%m-%d') AS 'Datum2'
FROM stud inner join ispit on stud.mbrStud=ispit.mbrStud
inner join nastavnik on nastavnik.sifNastavnik=ispit.sifNastavnik
inner join pred on pred.sifPred=ispit.sifPred  
HAVING Datum1 BETWEEN '2003-03-01' AND '2003-04-01'
";
$json3=new jsontabla($rezervacijeispitashort);



?>

<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
    google.load("visualization", "1", {packages:["table"]});
    google.load("visualization", "1", {packages:["timeline"]});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(drawChartIspiti);
    google.setOnLoadCallback(drawTable); 
    google.setOnLoadCallback(drawTableIspiti); 
      

        function drawChartIspiti() {
       // get data from mysql   
       jsonData=<?php $jsonStatistikaChart->ispischart();?>;

      // Create our data table out of JSON data loaded from server.
       var data = new google.visualization.DataTable(jsonData);
      
      
      // Prosječne ocjene:
      var chart = new google.visualization.PieChart(document.getElementById('chart_ispiti_div'));
      var options = {
          title: 'Grupirano po prosječnim ocjenama',
          pieHole: 0.4,
          height: 350,
          is3D: false,
          pieStartAngle: 220,
          slices: {  3: {offset: 0.2},4: {offset: 0.2}},
          legend: { 
            textStyle: {color: 'black', fontName: 'Arial',fontSize: '11'},
            position:'right',
            alignment:'center'
          },
          tooltip:{textStyle:{color: 'black', fontName: 'Arial',fontSize: '11'}}
        };
      chart.draw(data, options);
    }

   function drawTable() {
      var jsonData = $.ajax({
          url: "google_json_data.php",
          dataType:"json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      //var data = new google.visualization.DataTable(jsonData);
      jsonData=<?php $json1->ispis();?>;
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      
      //var myView = google.visualization.DataView.fromJSON(data, viewAsJson)
      var mytable = new google.visualization.Table(document.getElementById('table_div'));

      mytable.draw(data, {showRowNumber: true});
    }
   function drawTableIspiti() {
         
      // Create our data table out of JSON data loaded from server.
      //var data = new google.visualization.DataTable(jsonData);
      jsonData=<?php $json3->ispistimeline(); ?>;
      var data = new google.visualization.DataTable(jsonData);

      // Instantiate and draw our chart, passing in some options.
      
      //var myView = google.visualization.DataView.fromJSON(data, viewAsJson)
      var mytable = new google.visualization.Timeline(document.getElementById('table_ispiti'));

  var options = {
    colors: ['#134060','#004411'],
    timeline: { 
      colorByRowLabel: false,
      rowLabelStyle: {fontName: 'Helvetica', fontSize: 14, color: '#702203' },
      barLabelStyle: { fontName: 'Garamond', fontSize: 14, color: '#702203'  }
     }
  };

      mytable.draw(data,options);
    }


    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <h3>Kolegiji grupirani po prosječnim ocjenama</h3>
    <div id="chart_ispiti_div"></div> 
    <br/>
    <h3>Studenti rođeni u 10,11,12 mjesecu '84 te 1 i 2 mjesecu '85</h3>
    <div id="table_div"></div>
    <br/>
    <br/>
    <br/>
    <h3>Rezervacije ispita po predmetima</h3>
    <div id="table_ispiti" style="width:850px;height:500px"></div>




 

  </body>
</html>