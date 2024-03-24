<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"configuracion");
if($permiso==true){
$sql="SELECT usuario.id, detalle_usuario.documento, detalle_usuario.nombre, detalle_usuario.apellido, detalle_usuario.telefono, detalle_usuario.correo, roles.descripcion, detalle_usuario.nacionalidad, usuario.status,usuario.id_rol,usuario.nombre,detalle_usuario.fecha_nac,detalle_usuario.direccion 
FROM usuario 
INNER JOIN detalle_usuario 
ON detalle_usuario.id_usuario= usuario.id 
INNER JOIN roles 
ON roles.id=usuario.id_rol 
WHERE usuario.status != 2 and usuario.nombre!='superusuario'";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){
    

	$array[] = array(
        "id_usuario" => $fila[0],
        "documento" => $fila[1],
        "nombre" => $fila[2],
        "apellido" => $fila[3],
        "telefono" => $fila[4],
        "correo" => $fila[5],
        "descripcion_rol" => $fila[6],
        "id_rol" => $fila[9],
        "usuario" => $fila[10],
        "fecha_nac" => $fila[11],
        "direccion" => $fila[12],
        "nacionalidad" => $fila[7],
        "status" => $fila[8]
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>