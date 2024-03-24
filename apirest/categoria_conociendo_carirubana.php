<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"categorias");
if($permiso==true){
$sql="select * from categoria_conociendo_carirubana where status!=2";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "descripcion" => $fila[1],
        "icono" => $fila[2],
        "unico" => $fila[3],
        "ruta" => $fila[4],  
        "status" => $fila[5],  
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>