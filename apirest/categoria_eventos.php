<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"categorias");
if($permiso==true){
$sql="SELECT * FROM categoria_eventos WHERE status!=2 ORDER BY id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "descripcion" => $fila[1],                
        "status" => $fila[2]        
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>