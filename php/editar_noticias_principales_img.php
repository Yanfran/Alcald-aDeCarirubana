<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_POST['id'];
$imagen=$_REQUEST['imagen'];
$antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_noticias_principales_img/".$file_nombre,$imagen);
            $guardar="update noticias_principales_imagenes set ruta='$file_nombre' where id='$id'";
        }else{
            echo 2;
        }
        
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_noticias_principales_img/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>