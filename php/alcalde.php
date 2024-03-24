<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"alcalde")){

$titulo=$_POST['titulo'];
$subtitulo=$_POST['subtitulo'];
$descripcion=$_POST['descripcion'];
$etiqueta1=$_POST['etiqueta1'];
$etiqueta2=$_POST['etiqueta2'];
$categoria=$_POST['categoria'];
$descripcionimg=$_POST['descripcionimg'];
$imagen=$_POST['imagen'];


    $sql="SELECT * FROM alcalde WHERE titulo='$titulo' and status!='2'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);


    // if (is_countable($fila) <= 2) {            

        if(is_countable($fila) <= 1){
            echo 0;
        }else{

            $file_nombre=time().".png";
            $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
            $imagen=str_replace("data:image/jpg;base64,","",$imagen);
            $imagen=str_replace(" ","+",$imagen);
            $imagen=base64_decode($imagen);
            file_put_contents("../img/inicio/sesion_carirubana/".$file_nombre,$imagen);

            $sql2="INSERT INTO alcalde(
                    titulo,
                    subtitulo,
                    descripcion,
                    categoria,
                    etiqueta1,
                    etiqueta2,
                    ruta,
                    descripcion_ruta,
                    status
                ) values (
                    '$titulo',
                    '$subtitulo',
                    '$descripcion',
                    '$categoria',
                    '$etiqueta1',
                    '$etiqueta2',
                    '$file_nombre',
                    '$descripcionimg',
                    0
                )";
            $query2=mysqli_query($conexion,$sql2);
            if($query2){
                echo 1;
            }else{
                echo 2;
            }
        }
    // } else {
    //     echo 3;
    // }

}
?>