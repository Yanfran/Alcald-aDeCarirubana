<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();

$sql="SELECT * FROM libros WHERE status!=2 ORDER BY id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){   
    $array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "documento" => $fila[2],
        "ruta" => $fila[3],
        "status" => $fila[4]
    );
}

// $resultado=json_encode($array);
// echo $resultado;

$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;

?>