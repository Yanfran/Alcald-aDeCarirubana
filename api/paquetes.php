<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();

$sql="select * from paquetes where status=1";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "descripcion" => $fila[1],
        "ruta" => $fila[2],
        "status" => $fila[3],
        "precio" => $fila[4]
    );
}

$resultado=json_encode($array);
echo $resultado;

?>