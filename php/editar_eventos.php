<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$categoria=$_REQUEST['categoria'];
$ubicacion=$_POST['ubicacion'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$telefono_organizador=$_POST['telefono_organizador'];
$correo_organizador=$_POST['correo_organizador'];
$nombre_organizador=$_POST['nombre_organizador'];
$imagen=$_REQUEST['imagen'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];
$antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_eventos/".$file_nombre,$imagen);
            $guardar="update eventos set titulo='$titulo',descripcion='$descripcion',id_categoria='$categoria',ubicacion='$ubicacion',fecha='$fecha',hora='$hora',telefono_organizador='$telefono_organizador',correo_organizador='$correo_organizador',nombre_organizador='$nombre_organizador',latitud='$latitud',longitud='$longitud',ruta='$file_nombre' where id='$id'";
        }else{
            $guardar="update eventos set titulo='$titulo',descripcion='$descripcion',id_categoria='$categoria',ubicacion='$ubicacion',fecha='$fecha',hora='$hora',telefono_organizador='$telefono_organizador',correo_organizador='$correo_organizador',nombre_organizador='$nombre_organizador',latitud='$latitud',longitud='$longitud' where id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_eventos/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>