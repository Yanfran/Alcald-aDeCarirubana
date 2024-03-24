<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"noticias")){

$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$categoria=$_POST['categoria'];
$periodista=$_POST['periodista'];
$fotografo=$_POST['fotografo'];
$imagen=$_POST['imagen'];
$fecha = date('Y-m-d');


    $sql="SELECT * FROM noticias WHERE titulo='$titulo' and status!='2'";
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
        file_put_contents("../img/inicio/sesion_noticias_principales/".$file_nombre,$imagen);
        file_put_contents("../img/inicio/sesion_noticias_principales_img/".$file_nombre,$imagen);

        $sql1="INSERT INTO noticias(titulo,descripcion,id_categoria,fecha,periodista,fotografo,ruta,status) values('$titulo','$descripcion','$categoria','$fecha','$periodista','$fotografo','$file_nombre',1)";
        $query1=mysqli_query($conexion,$sql1);
        $ultimo_id = mysqli_insert_id($conexion);

        if ($query1) {
                
                $sql3="INSERT INTO noticias_principales_imagenes(ruta,id_noticias,status)values('$file_nombre','$ultimo_id',1)";
                $query3=mysqli_query($conexion,$sql3);
                echo 1;

        } else {
                echo 2;
        }

    }

}
?>