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
        $id=$_POST['id'];
        $imagen=$_REQUEST['imagen'];
        $antigua=$_REQUEST['antigua'];

                if($imagen!=""){
                    $file_nombre=$randomString.".png";
                    $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                    $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                    $imagen=str_replace(" ","+",$imagen);
                    $imagen=base64_decode($imagen);
                    file_put_contents("../img/inicio/turismo_img/".$file_nombre,$imagen);
                    $guardar="update conociendo_carirubana_imagenes set ruta='$file_nombre' where id='$id'";
                }else{
                    echo 2;
                }
                
                $guardado=mysqli_query($conexion,$guardar);
                if ($guardado) {
                    if($imagen!=""){
                        unlink('../img/inicio/turismo_img/'.$antigua);            
                    }
                    echo 1;
                }else{
                    echo 2;
                }
        //}
    }
?>