<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$resultado='';
$permiso=getVerificarApi($conexion,"pedidos");
if($permiso==true){
$sql="select * from nuevos_pedidos";
$result=mysqli_query($conexion, $sql);
$total_reg=mysqli_num_rows($result);

if($total_reg>0){

while($fila=mysqli_fetch_array($result)){ 	

	$sqlz="delete from nuevos_pedidos where id='$fila[0]'";

	$resultz=mysqli_query($conexion, $sqlz);	
}

$resultado=$total_reg;

}

}

echo $resultado;
?>