<?php
include("../conexion/conexion.php");
$conexion=conexion();
$dato=$_REQUEST["valor"];
$array = array();

$sql="select * from clientes where id='$dato'";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){
	$array[] = array(
        "ruc" => $fila[3],
        "telefono" => $fila[5],
        "direccion" => $fila[6],
        "correo" => $fila[4]
    );
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>