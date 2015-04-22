<?php

require 'rb.php';

// setup( $dsn = NULL, $username = NULL, $password = NULL, $frozen = FALSE )
 R::setup('mysql:host=localhost;dbname=fakultet','root','');
    
   // R::setAutoResolve( TRUE );        //Recommended as of version 4.2
    $mjesto = R::dispense( 'mjesto' );
    //$post->text = 'Hello World1324234';
    //$post->datum= strtotime("now");

   // $pbr = R::store( $mjesto );          //Create or Update
  //  $post = R::load( 'post', $id );   //Retrieve
  //  R::trash( $post );                //Delete
   // $mjesto = R::load( 'mjesto', $pbr );

//$mjesto = R::dispense('mjesto');
//$id = R::store( $mjesto );

$mjesto=R::load( 'mjesto', 1);

//$mjesto->pbr=10000;
echo "Mjesto se zove:".$mjesto->nazmjesto;
//$mjesto->nazmjesto="Zagareb";
R::store( $mjesto );
?>

  $mjesta = R::findAll('mjesto');
    foreach($mjesta as $m) echo "<br>".$m->pbr." ".$m->nazmjesto; 

<?php

/*
  $posts = R::findAll('post');
    foreach($posts as $p) echo "<br>".$p->text; 
*/
//$posts=R::loadAll('post');
//print_r($posts);
    ?>