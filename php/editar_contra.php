<?php
session_start();
$id=$_SESSION["id_user"];
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$txtcontra=$_REQUEST['txtcontra'];
$txtnueva1=$_REQUEST['txtnueva1'];
$txtnueva2=$_REQUEST['txtnueva2'];


if(empty($txtcontra) || empty($txtnueva1) || empty($txtnueva2) ){
    ?>
    <script>
        showErrorMessage("Faltan datos por llenar");
    </script>
    <?php
}else{  

    if ($txtnueva1==$txtnueva2){
        $guardar="update usuario set clave='$txtnueva2' where id='$id'";
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            $_SESSION["password"]=$txtnueva2;
            echo 1;
        }else{
            echo 2;
            }

    }else{
         echo 0;
            }

            
}
//}
?>