<?php

require_once('../../security.php');
require '../DatosBD.php';

$sql = "select * from areas;";
$con = open_conection($host, $user, $pass, $db);
mysqli_set_charset($con, "utf8");
$result = mysqli_query($con,$sql);

$Area = array();

while($row = mysqli_fetch_array($result)) 
{ 	    
    $code=$row['code'];
    $area=$row['area'];

    $Area[] = array(
    						'code'=>$code,
    						'area'=>$area
    					 );
}

mysqli_free_result($result);

close_conection($con);

$json_string = json_encode($Area);

echo $json_string;
?>