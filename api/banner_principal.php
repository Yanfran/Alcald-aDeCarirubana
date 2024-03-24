<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();


$sql="select * from banner_principal where status!=2";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "descripcion" => $fila[2],        
        "categoria" => $fila[3],
        "ruta" => $fila[4],
        "status" => $fila[5]        
    );
}

$resultado=json_encode($array);
echo $resultado;
?>