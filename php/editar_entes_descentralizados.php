<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$icono=$_POST['icono'];
$imagen=$_REQUEST['imagen'];
$cordinador=$_POST['cordinador'];
$telefono_cordinador=$_POST['telefono_cordinador'];
$correo_cordinador=$_POST['correo_cordinador'];
$pagina_web=$_POST['pagina_web'];
$direccion_fisica=$_POST['direccion_fisica'];
$horario_administrativo=$_POST['horario_admin'];
$horario_publico=$_POST['horario_publi'];
$numero_emergencia=$_POST['numero_emergencia'];
$twitter=$_POST['twitter'];
$facebook=$_POST['facebook'];
$instagram=$_POST['instagram'];
$antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_entes_descentralizados/".$file_nombre,$imagen);
            $guardar="UPDATE entes 
                SET titulo='$titulo', 
                    descripcion='$descripcion', 
                    icono='$icono', 
                    nombre_cordinador='$cordinador', 
                    telefono_cordinador='$telefono_cordinador', 
                    correo_cordinador='$correo_cordinador', 
                    pagina_web='$pagina_web',     
                    direccion_fisica='$direccion_fisica',     
                    horario_administrativo='$horario_administrativo',
                    horario_publico='$horario_publico',
                    numero_emergencia='$numero_emergencia',
                    twitter='$twitter',
                    facebook='$facebook',
                    instagram='$instagram',
                    ruta='$file_nombre' 
                    WHERE id='$id'";
        }else{
            $guardar="UPDATE entes 
                SET titulo='$titulo', 
                descripcion='$descripcion', 
                icono='$icono', 
                nombre_cordinador='$cordinador', 
                telefono_cordinador='$telefono_cordinador', 
                correo_cordinador='$correo_cordinador', 
                pagina_web='$pagina_web',     
                direccion_fisica='$direccion_fisica',     
                horario_administrativo='$horario_administrativo',
                horario_publico='$horario_publico',
                numero_emergencia='$numero_emergencia',
                twitter='$twitter',
                facebook='$facebook',
                instagram='$instagram'
                WHERE id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_entes_descentralizados/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>