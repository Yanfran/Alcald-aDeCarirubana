<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();

$sql="select * from  tramites_y_servicios where status!=2";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],        
        "descripcion" => $fila[2],        
        "categoria" => $fila[3],
        "categoria_carousel" => $fila[4],
        "titulo_carousel" => $fila[5],
        "icono" => $fila[6],
        "ruta" => $fila[7],        
        "status" => $fila[8]        
    );
}


$resultado=json_encode($array);
echo $resultado;

?>