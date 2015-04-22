<?php 

/**
*
*  @Poziv: $t3=new jsontabla("select * from ispit LIMIT 5");
*
*/
/* trebamo JSON u ovom formatu:
{
"cols": [
    {"id":"",
    "label":"Topping",
    "pattern":"",
    "type":"string"},
    {"id":"","label":"Slices","pattern":"","type":"number"}
  ],
"rows": [
    {"c":[{"v":"Mushrooms","f":null},{"v":3,"f":null}]},
    {"c":[{"v":"Onions","f":null},{"v":1,"f":null}]},
    {"c":[{"v":"Olives","f":null},{"v":1,"f":"Teško sranje"}]},
    {"c":[{"v":"Zucchini","f":null},{"v":1,"f":null}]},
    {"c":[{"v":"Pepperoni","f":null},{"v":2,"f":null}]}
  ]
}
*/
class jsontabla{

// prilikom poziva predaje query i šalje na ispis()
	function __construct($query){  
		$this->query=$query;
	}

/*
*
*   Prva verzija ispisa za google tablicu
*/
function ispis(){

// izvršava upit
	$result=mysql_query($this->query);  

// iz upita dohvaća prvi red
	$row=mysql_fetch_object($result);


// Dohvaćanje headera
	foreach ((array)$row as $key => $value) {
		$array['cols'][] = array('id'=>'','label'=>$key,'pattern'=>'','type' => 'string');
	}


// Vraćamo pointer na nultu poziciju
	mysql_data_seek($result, 0); 

// petlja za redove:
	while($row=mysql_fetch_object($result)){

		$c=array();
	// Petlja za fieldove
		foreach ((array)$row as $key => $value) {
			$c[]=array('v'=>$value);
		}
		$array['rows'][] = array('c' => $c);
	}
	echo json_encode($array);

} // function ispis() end

function ispischart(){

// izvršava upit
	$result=mysql_query($this->query);  

// iz upita dohvaća prvi red
	$row=mysql_fetch_object($result);


// Dohvaćanje headera
	//foreach ((array)$row as $key => $value) {}
	
	$array['cols'][] = array('id'=>'','label'=>'Grupa','pattern'=>'','type' => 'string');
	$array['cols'][] = array('id'=>'','label'=>'Ocjena','pattern'=>'','type' => 'number');

// Vraćamo pointer na nultu poziciju
	mysql_data_seek($result, 0); 

// petlja za redove:
	while($row=mysql_fetch_array($result)){

		$c=array();
	// Petlja za fieldove
	
		$c[]=array('v'=>$row[0],'f'=>null);
		$c[]=array('v'=>$row[1],'f'=>null);	
		
		$array['rows'][] = array('c' => $c);
	}
	echo json_encode($array,JSON_NUMERIC_CHECK);

} // function ispischart() end


function ispistimeline(){

// izvršava upit
	$result=mysql_query($this->query);  

// iz upita dohvaća prvi red
	$row=mysql_fetch_object($result);


// Dohvaćanje headera
	//foreach ((array)$row as $key => $value) {}
	$array['cols'][] = array('id'=>'','label'=>'Opis','pattern'=>'','type' => 'string');
	$array['cols'][] = array('id'=>'','label'=>'Opis','pattern'=>'','type' => 'string');
	$array['cols'][] = array('id'=>'','label'=>'Datum1','pattern'=>'','type' => 'date');
	$array['cols'][] = array('id'=>'','label'=>'Datum2','pattern'=>'','type' => 'date');


// Vraćamo pointer na nultu poziciju
	mysql_data_seek($result, 0); 

// petlja za redove:
	while($row=mysql_fetch_array($result)){

		$c=array();
	// Petlja za fieldove
		foreach ((array)$row as $key => $value) {}
		$c[]=array('v'=>$row[0]);
		$c[]=array('v'=>$row[1]);	
		$c[]=array('v'=>$this->JSdate($row[2],'date'));
		$c[]=array('v'=>$this->JSdate($row[3],'date'));
		
		$array['rows'][] = array('c' => $c);
	}
	echo json_encode($array);

} // function ispis() end

// Pretvorba Mysql DATETIME u JS Date()
function JSdate($in,$type){
    if($type=='date'){
        //Dates are patterned 'yyyy-MM-dd'
        preg_match('/(\d{4})-(\d{2})-(\d{2})/', $in, $match);
    } elseif($type=='datetime'){
        //Datetimes are patterned 'yyyy-MM-dd hh:mm:ss'
        preg_match('/(\d{4})-(\d{2})-(\d{2})\s(\d{2}):(\d{2}):(\d{2})/', $in, $match);
    }
     
    $year = (int) $match[1];
    $month = (int) $match[2] - 1; // Month conversion between indexes
    $day = (int) $match[3];
     
    if ($type=='date'){
        return "Date($year, $month, $day)";
    } elseif ($type=='datetime'){
        $hours = (int) $match[4];
        $minutes = (int) $match[5];
        $seconds = (int) $match[6];
        return "Date($year, $month, $day, $hours, $minutes, $seconds)";    
    }
}
} // class end
?>