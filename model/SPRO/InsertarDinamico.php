<?php

require_once('../../security.php');
require '../DatosBD.php';

$_para = $_POST['para'];
$_data = $_POST['data'][0];
$_camp = $_POST['camp'][0];
$_Tabla = $_para[0]['_Tabla'];

$con = open_conection($host, $user, $pass, $db);

mysqli_set_charset($con, "utf8");

$tamañoData = sizeof($_data);
$tamañoCamp = sizeof($_camp);

for ($i=0; $i < $tamañoData ; $i++) { 		

	$sql = "insert into ".$_Tabla." values (";

	for($m=0; $m < $tamañoCamp ; $m++){
		$campo = $_camp[$m];
		$prueba2 = $_data[$i][$campo];
		$prueba2 = mb_strtoupper($prueba2, 'UTF-8');
		$prueba2 = mysqli_real_escape_string($con, $prueba2);
		$max = $m + 1;
		if($tamañoCamp === $max){
			$sql = $sql."'".$prueba2."')";
		}else{
			$sql = $sql."'".$prueba2."',";
		}
		
	}
       
    $result = mysqli_query($con,$sql);
	
}

close_conection($con);

echo $result;

?>