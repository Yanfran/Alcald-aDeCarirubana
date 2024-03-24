<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$subtitulo=$_POST['subtitulo'];
$descripcion=$_REQUEST['descripcion'];
$etiqueta1=$_POST['etiqueta1'];
$etiqueta2=$_POST['etiqueta2'];
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
            file_put_contents("../img/inicio/sesion_carirubana/".$file_nombre,$imagen);
            $guardar="UPDATE alcalde SET titulo='$titulo', subtitulo='$subtitulo', descripcion='$descripcion', categoria='$categoria', etiqueta1='$etiqueta1', etiqueta2='$etiqueta2', ruta='$file_nombre', descripcion_ruta='$descripcionimg' WHERE id='$id'";
        }else{
            $guardar="UPDATE alcalde SET titulo='$titulo', subtitulo='$subtitulo', descripcion='$descripcion', categoria='$categoria', etiqueta1='$etiqueta1', etiqueta2='$etiqueta2', descripcion_ruta='$descripcionimg' WHERE id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_carirubana/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>