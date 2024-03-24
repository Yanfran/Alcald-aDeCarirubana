<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"alcalde");
if($permiso==true){
$sql="select * from  alcalde where status!=2";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "subtitulo" => $fila[2],
        "descripcion" => $fila[3],        
        "categoria" => $fila[4],
        "etiqueta1" => $fila[5],
        "etiqueta2" => $fila[6],        
        "ruta" => $fila[7],
        "descripcion_ruta" => $fila[8],
        "status" => $fila[9]        
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>