<?php

require_once('../../security.php');
require '../DatosBD.php';

$_Tabla = $_POST['_Tabla'];

$con = open_conection($host, $user, $pass, $db);

mysqli_set_charset($con, "utf8");

$sql = "delete from ".$_Tabla;

$result = mysqli_query($con,$sql);

close_conection($con);

echo $result;

?>
