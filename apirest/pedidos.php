<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"pedidos");
if($permiso==true){
$sql="select * from pedido where status=0";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	

	$detalles = array();
	$sqlz="select * from detalle_pedido where id_pedido='$fila[0]'";

	$resultz=mysqli_query($conexion, $sqlz);
	while($filaz=mysqli_fetch_array($resultz)){
		$detalles[] = array(
			"id" => $filaz[0],
	        "descripcion" => $filaz[2],
	        "ruta" => $filaz[3],
	        "cantidad" => $filaz[4],
	        "precio" => $filaz[5],
	        "importe" => $filaz[6],
	        "status" => $filaz[7]
	    );
    }

	$array[] = array(
        "id" => $fila[0],
        "nombre" => $fila[1],
        "correo" => $fila[2],
        "telefono" => $fila[3],
        "domicilio" => $fila[4],
        "total" => $fila[5],
        "fecha" => $fila[6],
        "hora" => $fila[7],
        "ip" => $fila[8],
        "status" => $fila[9],
        "detalles" => $detalles
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>