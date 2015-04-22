<?php

require 'rb.php';

// setup( $dsn = NULL, $username = NULL, $password = NULL, $frozen = FALSE )
R::setup('mysql:host=localhost;dbname=fakultet','root','');

   // R::setAutoResolve( TRUE );        //Recommended as of version 4.2
$mjesto = R::dispense( 'mjesto' );

print_r($_POST);
if(isset($_POST['pbrdetalj'])){
  $mjesto=R::load( 'mjesto', $_POST['pbrdetalj']);
}

if(isset($_POST['Uredi'])){
  $mjesto=R::load( 'mjesto', $_POST['id']);
  $mjesto->nazmjesto=$_POST['nazmjesto'];
  $mjesto->pbr      =$_POST['pbr'];
  $mjesto->sifzupanija =$_POST['sifzupanija'];
  R::store( $mjesto );
}

if(isset($_POST['pbrdel'])){
  $mjesto=R::load( 'mjesto', $_POST['pbrdel']);
 R::trash( $mjesto );
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>CRUD forma sa RedBeanPHP</title>
  <style type="text/css">
.inset {
   -moz-box-shadow: inset 0 3px 8px rgba(0,0,50,.6);
   -webkit-box-shadow: inset 0 3px 8px rgba(0,0,50,.6);
   box-shadow: inset 0 3px 8px rgba(20,0,50,.24);
   width: 300px;
}
button{
  background-color: #E2CDD7;
}
  </style>

</head>
<body>

<div class="inset">
  <form action="#" method="post">
  <input type="hidden" name="id" value="<?php echo $mjesto->id;?>">
  <br>
    <table align="center">
      <tbody>
        <tr>
          <td>Poštanski broj:</td><td><input type="text" name="pbr" value="<?php echo $mjesto->pbr;?>"></td>
        </tr>
        <tr>
          <td>Naziv mjesta</td><td><input type="text" name="nazmjesto" value="<?php echo $mjesto->nazmjesto;?>"></td>
        </tr>
        <tr>
          <td>Šifra županije</td><td><input type="text" name="sifzupanija" value="<?php echo $mjesto->sifzupanija;?>"></td>
        </tr>
        <tr>
          <td></td><td><input type="submit" name="Uredi" value="uredi"></td>
        </tr>
      </tbody>
    </table>
    <br>
</div>
    
    
    

    
  </form>

<p>
  Forma za izlistavanje:

</p>
  <form action="#" method="post">
    <?php
    $mjesta = R::findAll('mjesto','ORDER BY vrijemeunosa DESC');
    foreach($mjesta as $m) {
      echo "<button type='submit' name='pbrdetalj' value='".$m->id."'>Edit</button> ";
      echo "<button type='submit' name='pbrdel' value='".$m->id."'>Delete</button> ";
      echo $m->pbr." ";
      echo $m->nazmjesto."<br/>";

    }  
    ?>
  </form>
</body>
</html>