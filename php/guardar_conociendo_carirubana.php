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
    $descripcion=$_POST['descripcion'];
    $direccion=$_POST['direccion'];
    $horario=$_POST['horario'];
    $entrada=$_POST['entrada'];
    $categoria=$_POST['categoria'];
    $imagen=$_POST['imagen'];


        $sql="SELECT * FROM turismo WHERE titulo='$titulo' and status!='2'";
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
            file_put_contents("../img/inicio/turismo/".$file_nombre,$imagen);

            $sql2="INSERT INTO 
                turismo(titulo,descripcion,id_categoria,direccion,horario,entrada,ruta,status) 
                    values 
                ('$titulo','$descripcion','$categoria','$direccion','$horario','$entrada','$file_nombre',1)";
            $query2=mysqli_query($conexion,$sql2);
            $ultimo_id = mysqli_insert_id($conexion);

            if($query2){
                // $sql3="INSERT INTO turismo_imagenes(ruta,id_conociendo_carirubana,status)values('$file_nombre','$ultimo_id',1)";
                //     $query3=mysqli_query($conexion,$sql3);
                echo 1;
            }else{
                echo 2;
            }
        }

    }

}

?>