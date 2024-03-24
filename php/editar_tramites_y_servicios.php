<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$categoria=$_POST['categoria'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$icono=$_POST['icono'];
$imagen=$_REQUEST['imagen'];
$imagen_detalle=$_REQUEST['imagen_detalle'];
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
$antigua_detalle=$_REQUEST['antigua_detalle'];

        if($imagen!="" && $imagen_detalle!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/tramites_servicios/".$file_nombre,$imagen);


            $file_nombre_detalle=time().".png";
            $imagen_detalle=str_replace("data:image/jpeg;base64,","",$imagen_detalle);
            $imagen_detalle=str_replace("data:image/jpg;base64,","",$imagen_detalle);
            $imagen_detalle=str_replace(" ","+",$imagen_detalle);
            $imagen_detalle=base64_decode($imagen_detalle);
            file_put_contents("../img/inicio/tramites_servicios_img_detalle/".$file_nombre_detalle,$imagen_detalle);

            $guardar="UPDATE tramites 
                SET 
                categoria='$categoria', 
                titulo='$titulo', 
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
                ruta='$file_nombre', 
                ruta_detalle='$file_nombre_detalle'
                WHERE id='$id'";

        } elseif ($imagen!="") {
                $file_nombre=time().".png";
                $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                $imagen=str_replace(" ","+",$imagen);
                $imagen=base64_decode($imagen);
                file_put_contents("../img/inicio/tramites_servicios/".$file_nombre,$imagen);
            
            $guardar="UPDATE tramites 
                SET 
                categoria='$categoria', 
                titulo='$titulo', 
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
        } elseif ($imagen_detalle!=""){
            $file_nombre_detalle=time().".png";
            $imagen_detalle=str_replace("data:image/jpeg;base64,","",$imagen_detalle);
            $imagen_detalle=str_replace("data:image/jpg;base64,","",$imagen_detalle);
            $imagen_detalle=str_replace(" ","+",$imagen_detalle);
            $imagen_detalle=base64_decode($imagen_detalle);
            file_put_contents("../img/inicio/tramites_servicios_img_detalle/".$file_nombre_detalle,$imagen_detalle);

            $guardar="UPDATE tramites 
                SET 
                categoria='$categoria', 
                titulo='$titulo', 
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
                ruta_detalle='$file_nombre_detalle'
                WHERE id='$id'";
        }else{
            $guardar="UPDATE tramites 
                SET 
                categoria='$categoria', 
                titulo='$titulo', 
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
                instagram='$instagram' WHERE id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/tramites_servicios/'.$antigua);            
            }
            if($imagen_detalle!=""){
                unlink('../img/inicio/tramites_servicios_img_detalle/'.$antigua_detalle);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>