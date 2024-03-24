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

    if(getVerificar($conexion,"turismo")){

    $titulo=$_POST['titulo'];
    $imagen=$_POST['imagen'];
    $icono=$_POST['icono'];
    $unico=$_POST['unico'];


        $sql="SELECT * FROM categoria_conociendo_carirubana WHERE descripcion='$titulo' and icono='$icono' and status!='2'";
        $query=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_array($query);
        if(is_countable($fila)>0){
            echo 0;
        }else{

            $file_nombre=$randomString.".png"; #time()
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/categoria_img/".$file_nombre,$imagen);
            // file_put_contents("../img/inicio/conociendo_carirubana_img/".$file_nombre,$imagen);

            $sql2="INSERT INTO categoria_conociendo_carirubana(descripcion,icono,unico,ruta,status) 
                values
                ('$titulo','$icono','$unico','$file_nombre',1)";
            $query2=mysqli_query($conexion,$sql2);
            if($query2){
                echo 1;
            }else{
                echo 2;
            }
        }

    }
}
?>