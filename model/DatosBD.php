<?php

function open_conection($ip,$usuariobd,$clavebd,$bd){
    $con = mysqli_connect($ip,$usuariobd,$clavebd,$bd);
    mysqli_select_db($con,$bd);
    return $con;
}

function close_conection($con1){
    if(isset($con1) && $con1!=null ){
        mysqli_close($con1);    
    }
}

?>