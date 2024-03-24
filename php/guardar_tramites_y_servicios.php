<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"tramites")){

$categoria=$_POST['categoria'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$icono=$_POST['icono'];
$imagen=$_POST['imagen'];
$imagen_detalle=$_POST['imagen_detalle'];
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


    $sql="SELECT * FROM tramites WHERE titulo='$titulo' and status!='2'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);
    if(is_countable($fila)>0){
        echo 0;
    }else{

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

        $sql2="INSERT INTO tramites
            (titulo,descripcion,categoria,icono,nombre_cordinador,telefono_cordinador,correo_cordinador,pagina_web, direccion_fisica, horario_administrativo, horario_publico,numero_emergencia,twitter,facebook,instagram,ruta,ruta_detalle,status) 
            values 
            ('$titulo','$descripcion','$categoria','$icono','$cordinador','$telefono_cordinador','$correo_cordinador','$pagina_web','$direccion_fisica','$horario_administrativo','$horario_publico','$numero_emergencia','$twitter','$facebook','$instagram','$file_nombre','$file_nombre_detalle',1)";

        $query2=mysqli_query($conexion,$sql2);
        if($query2){
            echo 1;
        }else{
            echo 2;
        }
    }

}
?>