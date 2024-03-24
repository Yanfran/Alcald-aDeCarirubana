<?php
include('../conexion/conexion.php');
$conexion=conexion();

$user=$_POST['txtusuario'];
$pass=$_POST['txtcontra'];

$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.@";

for ($i=0; $i<strlen($user); $i++){ 
      if (strpos($permitidos, substr($user,$i,1))===false){ 
         ?>
		<script>
		showErrorMessage("El usuario ingresado no es valido");
		</script>				

		<?php
         return false; 
      } 
   }

   for ($i=0; $i<strlen($pass); $i++){ 
      if (strpos($permitidos, substr($pass,$i,1))===false){ 
         ?>
		<script>
		showErrorMessage("La contraseña ingresada no es valida");
		</script>				

		<?php
         return false; 
      } 
   }




$sql="SELECT usuario.id, usuario.nombre, detalle_usuario.nombre, detalle_usuario.apellido, roles.descripcion,usuario.id_rol, detalle_usuario.nacionalidad, detalle_usuario.documento, detalle_usuario.telefono, detalle_usuario.correo, detalle_usuario.direccion, detalle_usuario.fecha_nac from usuario inner join detalle_usuario on detalle_usuario.id_usuario=usuario.id inner join roles on roles.id=usuario.id_rol where usuario.nombre='$user' and usuario.clave='$pass'";

$result=mysqli_query($conexion,$sql);
   $fila=mysqli_fetch_array($result);
   $a=0;
   if(is_countable($fila)>0){
           session_start();
           $_SESSION["id_user"]=$fila['0'];
           $_SESSION["usuario"]=$fila['1'];
           $_SESSION["nombre"]=$fila['2'];
           $_SESSION["apellido"]=$fila['3'];
           $_SESSION["rol"]=$fila['4'];
           $_SESSION["id_rol"]=$fila['5'];
           $_SESSION["nacionalidad"]=$fila['6'];
           $_SESSION["documento"]=$fila['7'];
           $_SESSION["telefono"]=$fila['8'];
           $_SESSION["correo"]=$fila['9'];
           $_SESSION["direccion"]=$fila['10'];
           $_SESSION["fecha_nac"]=$fila['11'];
           $_SESSION["password"]=$pass;
           $a=1;
           $sqlt="TRUNCATE TABLE nuevos_pedidos";
           $resultt=mysqli_query($conexion, $sql);
   } 

   echo $a;

?>