<?php
include('../conexion/conexion.php');
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"configuracion")){
$id=$_POST['idtxt'];
//$nacionalidad=$_POST['nacionalidad'];
$txtdocumento=$_POST['txtdocumento'];
$txtnombre=$_POST['txtnombre'];
$txtapellido=$_POST['txtapellido'];
$txtfehca=$_POST['txtfecha'];
$txttelefono=$_POST['txttelefono'];
$txtcorreo=$_POST['txtcorreo'];
$txtdireccion=$_POST['txtdireccion'];
$txtuser=$_POST['txtuser'];
$txtrol=$_POST['txtrol'];
$txtclave=$_POST['txtclave'];

/*detalle_usuario.nacionalidad=$nacionalidad,*/

    $sql="SELECT * FROM detalle_usuario WHERE correo='$txtcorreo' and id_usuario!='$id'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);
    if(is_countable($fila > 0) ){
        echo 0;
    }else{

$sql="UPDATE usuario INNER JOIN detalle_usuario on detalle_usuario.id_usuario SET detalle_usuario.documento='$txtdocumento',detalle_usuario.nombre='$txtnombre',detalle_usuario.apellido='$txtapellido',detalle_usuario.fecha_nac='$txtfehca',detalle_usuario.telefono='$txttelefono',detalle_usuario.correo='$txtcorreo',detalle_usuario.direccion='$txtdireccion',usuario.nombre='$txtuser', usuario.clave='$txtclave', usuario.id_rol='$txtrol' WHERE usuario.id='$id' and detalle_usuario.id_usuario='$id'";
$query=mysqli_query($conexion,$sql);
if($query){
    echo 1;
}else{
    echo 2;
}
}
}
?>