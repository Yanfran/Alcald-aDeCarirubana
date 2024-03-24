<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];


        $guardar="update categoria_eventos set descripcion='$titulo' where id='$id'";
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {            
            echo 1;
        }else{
            echo 2;
        }

            

//}
?>