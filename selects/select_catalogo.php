<?php
include("../conexion/conexion.php");
$conexion=conexion();
$tabla=$_REQUEST["tabla"];
$campo=$_REQUEST["campo"];
$array = array();

$sql="select * from ".$tabla." where status=1";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){
	$array[] = array(
        "id" => $fila[0],
        "descripcion" => $fila[1],
        "status" => $fila[2]
    );
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>