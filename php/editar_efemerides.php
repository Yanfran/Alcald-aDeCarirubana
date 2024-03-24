<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$descripcion=$_REQUEST['descripcion'];
$url=$_REQUEST['url'];
$imagen=$_REQUEST['imagen'];
$antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/efemerides/".$file_nombre,$imagen);
            $guardar="update efemerides set titulo='$titulo',descripcion='$descripcion',url='$url',ruta='$file_nombre' where id='$id'";
        }else{
            $guardar="update efemerides set titulo='$titulo',descripcion='$descripcion',url='$url' where id='$id'";
        }
        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/efemerides/'.$antigua);            
            }
            echo 1;
        }else{
            echo 2;
        }

    

            

//}
?>