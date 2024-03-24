<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$descripcion=$_POST['descripcion'];


        $guardar="update categoria_noticias set descripcion='$descripcion' where id='$id'";
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {            
            echo 1;
        }else{
            echo 2;
        }

            

//}
?>