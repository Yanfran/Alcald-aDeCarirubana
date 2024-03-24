<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$categoria=$_REQUEST['categoria'];
$descripcionimg=$_POST['descripcionimg'];
$imagen=$_REQUEST['imagen'];
$antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_tramites_servicios/".$file_nombre,$imagen);
            $guardar="UPDATE bienvenido_a_carirubana SET 
                titulo='$titulo',                 
                descripcion='$descripcion', 
                categoria='$categoria',                 
                ruta='$file_nombre', 
                descripcion_ruta='$descripcionimg' 
                WHERE id='$id'";
        }else{
            $guardar="UPDATE bienvenido_a_carirubana SET 
                titulo='$titulo',                 
                descripcion='$descripcion', 
                categoria='$categoria',                                 
                WHERE id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_tramites_servicios/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>