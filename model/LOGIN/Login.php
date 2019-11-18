<?php

require_once('../../security.php');
require '../DatosBD.php';

$_Usuario = $_POST['_Usuario'];
$_Password = $_POST['_Password'];

$sql = "select * from users where user = '" . $_Usuario . "' and password = '" . $_Password . "'";
$con = open_conection($host, $user, $pass, $db);
$result = mysqli_query($con,$sql);

mysqli_free_result($result);
    
close_conection($con);

echo $result->num_rows;

?>