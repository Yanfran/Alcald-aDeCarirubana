<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$categoria=$_REQUEST['categoria'];
$periodista=$_POST['periodista'];
$fotografo=$_POST['fotografo'];
$imagen=$_REQUEST['imagen'];
$antigua=$_REQUEST['antigua'];
// $fecha = date('Y-m-d');

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_noticias_principales/".$file_nombre,$imagen);
            $guardar="update noticias set titulo='$titulo',descripcion='$descripcion',id_categoria='$categoria', periodista='$periodista',fotografo='$periodista', ruta='$file_nombre' where id='$id'";
        }else{
            $guardar="update noticias set titulo='$titulo',descripcion='$descripcion',id_categoria='$categoria', periodista='$periodista', fotografo='$fotografo'where id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/sesion_noticias_principales/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>