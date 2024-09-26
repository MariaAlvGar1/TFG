<?php
function conectar(){
    $user="root";
    $pass="";
    $server="localhost";
    $bd="mypantry";
    $con= mysqli_connect($server,$user,$pass) or die("Error al conectar a la bbdd".mysql_error());
    mysqli_select_db($con,$bd);
    return $con;
}
?>
