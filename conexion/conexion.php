<?php
function conexion(){
	
$conexion = mysqli_connect( "localhost", "root", "" ) or die ("No se ha podido conectar al servidor de Base de datos");

$db = mysqli_select_db($conexion, "alcaldia");	
mysqli_set_charset($conexion,"utf8");

return $conexion;
}
setlocale(LC_TIME, 'es_VN'); 
date_default_timezone_set('America/Caracas');
?>