<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"semanario");
if($permiso==true){
    $sql="SELECT * FROM semanario WHERE status!=2 ORDER BY id DESC";
    $result=mysqli_query($conexion, $sql);

    while($fila=mysqli_fetch_array($result)){ 	
    	$array[] = array(
            "id" => $fila[0],
            "titulo" => $fila[1],
            "ruta" => $fila[2],
            "status" => $fila[3]
        );
    }
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>