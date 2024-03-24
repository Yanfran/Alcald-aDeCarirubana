<?php
include('../conexion/conexion.php');
$conexion=conexion();
error_reporting(0);
session_start();
$user=$_SESSION["usuario"];
$pass=$_POST['txtcontra'];

$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.@";

/*for ($i=0; $i<strlen($user); $i++){ 
      if (strpos($permitidos, substr($user,$i,1))===false){ 
         echo 2;
         return false; 
      } 
   }*/

   for ($i=0; $i<strlen($pass); $i++){ 
      if (strpos($permitidos, substr($pass,$i,1))===false){ 
         echo 3;
         return false; 
      } 
   }




$sql="SELECT usuario.id, usuario.nombre, detalle_usuario.nombre, detalle_usuario.apellido from usuario inner join detalle_usuario on detalle_usuario.id_usuario=usuario.id where usuario.nombre='$user' and usuario.clave='$pass'";

$result=mysqli_query($conexion,$sql);
   $fila=mysqli_fetch_array($result);
   $a=0;
   if(count($fila)>1){
           session_start();
           $_SESSION["id_user"]=$fila['0'];
           $_SESSION["usuario"]=$fila['1'];
           $_SESSION["nombre"]=$fila['2'];
           $_SESSION["apellido"]=$fila['3'];
           $_SESSION["password"]=$pass;
           $a=1;
   }

   if ($a==1) {
      echo 1;
   }else{
      echo 0;
   }

?>