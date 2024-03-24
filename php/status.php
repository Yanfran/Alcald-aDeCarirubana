<?php
session_start();
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar3($conexion)){
$tabla=$_REQUEST['tabla'];
$value=$_REQUEST['valor'];
$campo_id=$_REQUEST['campoid'];
$id=$_REQUEST['id_t'];

$query = mysqli_query($conexion,  "UPDATE ".$tabla." SET status = '".$value."' WHERE ".$campo_id ."= '".$id."'");
//}
?>