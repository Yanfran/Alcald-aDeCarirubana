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
        $descripcion=$_REQUEST['descripcion'];
        $direccion=$_POST['direccion'];
        $horario=$_POST['horario'];
        $entrada=$_POST['entrada'];
        $categoria=$_POST['categoria'];
        $imagen=$_REQUEST['imagen'];
        $antigua=$_REQUEST['antigua'];

            
                if($imagen!=""){
                    $file_nombre=$randomString.".png";
                    $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                    $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                    $imagen=str_replace(" ","+",$imagen);
                    $imagen=base64_decode($imagen);
                    file_put_contents("../img/inicio/turismo/".$file_nombre,$imagen);
                    $guardar="UPDATE turismo SET titulo='$titulo', descripcion='$descripcion', id_categoria='$categoria', direccion='$direccion', horario='$horario', entrada='$entrada', ruta='$file_nombre' WHERE id='$id'";
                }else{
                    $guardar="UPDATE turismo SET titulo='$titulo', descripcion='$descripcion', id_categoria='$categoria', direccion='$direccion', horario='$horario', entrada='$entrada' WHERE id='$id'";
                }
                $guardado=mysqli_query($conexion,$guardar);
                if ($guardado) {
                    if($imagen!=""){
                        unlink('../img/inicio/turismo/'.$antigua);            
                    }
                    echo 1;
                }else{
                    echo 2;
                }

        //}

}
?>