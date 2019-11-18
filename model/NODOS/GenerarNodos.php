<?php

require_once('../../security.php');
require '../DatosBD.php';

$_level = $_POST['_level'];

$sql = "select * from nodos where level = '".$_level."';";
$con = open_conection($host, $user, $pass, $db);
mysqli_set_charset($con, "utf8");
$result = mysqli_query($con,$sql);

$TileCollection = array();

while($row = mysqli_fetch_array($result)) 
{ 	    
    $icon=$row['icon'];
    $type=$row['type'];
    $title=$row['title'];
    $info=$row['info'];
    $view=$row['view'];

    $TileCollection[] = array(
    						'icon'=>$icon,
    						'type'=>$type,
    						'title'=>$title,
    						'info'=>$info,
    						'view'=>$view
    					 );
}

mysqli_free_result($result);

close_conection($con);

$json_string = json_encode(compact('TileCollection'));

echo $json_string;

?>