<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array('result'=>false);

$nombre=$_REQUEST["nombre"];
$correo=$_REQUEST["correo"];
$telefono=$_REQUEST["telefono"];
$domicilio=$_REQUEST["domicilio"];
$total=$_REQUEST["total"];
$ip=$_REQUEST["ip"];
$arrayPedido=json_decode($_REQUEST['json']);

/*$nombre="jorge";
$correo="jorgeavargasm@hotmail.es";
$telefono="04243579367";
$domicilio="direccion";
$total=50;
$ip="192.168.1.1";*/

$sql="insert into pedido(nombre,correo,telefono,domicilio,total,fecha,hora,ip,status) values('$nombre','$correo','$telefono','$domicilio',".$total.",curdate(),curtime(),'$ip',0)";
$result=mysqli_query($conexion, $sql);

if($result){

	$id=mysqli_insert_id($conexion);
	foreach($arrayPedido as $key){
        $importe=$key->cantidad*$key->precio;
        $guardar="INSERT INTO detalle_pedido(id_pedido,descripcion,ruta,cantidad,precio,importe,status) VALUES ($id,'$key->descripcion','$key->ruta',$key->cantidad,$key->precio,'$importe',0)";
        $query=mysqli_query($conexion,$guardar);
    }

    $array = array('result'=>true);
}

$resultado=json_encode($array);
echo $resultado;

?>