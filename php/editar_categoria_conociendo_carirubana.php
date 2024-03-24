<?php

generateRandomString();
function generateRandomString($length = 10) {

    include("../conexion/conexion.php");
    include("../acceso/permisos.php");
    $conexion=conexion();

    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    //if(getVerificar($conexion,"")){
    $id=$_REQUEST['id'];
    $titulo=$_POST['titulo'];
    $imagen=$_REQUEST['imagen'];
    $icono=$_POST['icono'];
    $unico=$_POST['unico'];
    $antigua=$_REQUEST['antigua'];

        if($imagen!=""){
            $file_nombre=$randomString.".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/categoria_img/".$file_nombre,$imagen);
            $guardar="update categoria_conociendo_carirubana set ruta='$file_nombre' where id='$id'";
        }else{
            $guardar="update categoria_conociendo_carirubana set descripcion='$titulo', icono='$icono', unico='$unico' where id='$id'";  
        }

        $guardado=mysqli_query($conexion,$guardar);
        if ($guardado) {
            if($imagen!=""){
                unlink('../img/inicio/categoria_img/'.$antigua);            
                // echo "<h1>No se localizo una imagen para editar!</h1>";
            }
            echo 1;
        } else{
            echo 2;
        }

                

    //}
}
?>