<?php
session_start();
$id=$_SESSION["id_user"];
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$txtnombre=$_REQUEST['txtnombre'];
$txtapellido=$_REQUEST['txtapellido'];
$txttelefono=$_REQUEST['txttelefono'];
$txtcorreo=$_REQUEST['txtcorreo'];
$txtdireccion=$_REQUEST['txtdireccion'];
$txtfecha=$_REQUEST['txtfecha'];

  
        $guardar="update detalle_usuario set nombre='$txtnombre', apellido='$txtapellido', telefono='$txttelefono', correo='$txtcorreo', direccion='$txtdireccion', fecha_nac='$txtfecha' where id_usuario='$id'";
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
               $_SESSION["nombre"]=$txtnombre;
               $_SESSION["apellido"]=$txtapellido;
               $_SESSION["telefono"]=$txttelefono;
               $_SESSION["correo"]=$txtcorreo;
               $_SESSION["direccion"]=$txtdireccion;
               $_SESSION["fecha_nac"]=$txtfecha;
               $a=1;
            echo 1;
        }else{
            echo 2;
            }
            

//}
?>