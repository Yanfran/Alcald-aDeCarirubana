<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"entes")){

$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$icono=$_POST['icono'];
$imagen=$_POST['imagen'];
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


    $sql="SELECT * FROM entes WHERE titulo='$titulo' and status!='2'";
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
        file_put_contents("../img/inicio/sesion_entes_descentralizados/".$file_nombre,$imagen);

        $sql2="INSERT INTO entes
            (titulo,descripcion,icono,nombre_cordinador,telefono_cordinador,correo_cordinador,pagina_web, direccion_fisica, horario_administrativo, horario_publico,numero_emergencia,twitter,facebook,instagram,ruta,status) 
            values 
            ('$titulo','$descripcion','$icono','$cordinador','$telefono_cordinador','$correo_cordinador','$pagina_web','$direccion_fisica','$horario_administrativo','$horario_publico','$numero_emergencia','$twitter','$facebook','$instagram','$file_nombre',1)";        
        $query2=mysqli_query($conexion,$sql2);
        if($query2){
            echo 1;
        }else{
            echo 2;
        }
    }

}
?>