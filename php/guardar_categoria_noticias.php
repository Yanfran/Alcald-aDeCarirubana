<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"noticias")){

$descripcion=$_POST['descripcion'];
// $descripcion=$_POST['descripcion'];
// $imagen=$_POST['imagen'];


    $sql="SELECT * FROM categoria_noticias WHERE descripcion='$descripcion' and status!='2'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);
    if(is_countable($fila)>0){
        echo 0;
    }else{

        // $file_nombre=time().".png";
        // $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
        // $imagen=str_replace("data:image/jpg;base64,","",$imagen);
        // $imagen=str_replace(" ","+",$imagen);
        // $imagen=base64_decode($imagen);
        // file_put_contents("../img/inicio/sesion_categoria_noticias/".$file_nombre,$imagen);

        $sql2="INSERT INTO categoria_noticias(descripcion,status) values('$descripcion',1)";
        $query2=mysqli_query($conexion,$sql2);
        if($query2){
            echo 1;
        }else{
            echo 2;
        }
    }

}
?>