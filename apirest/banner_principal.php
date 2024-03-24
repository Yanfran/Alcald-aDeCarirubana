<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"banner");
if($permiso==true){
$sql="select * from banner where status!=2";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "descripcion" => $fila[2],        
        "categoria" => $fila[3],
        "url" => $fila[4],
        "ruta" => $fila[5],
        "status" => $fila[6]        
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>