<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
// if(getVerificar($conexion,"eventos")){

$titulo=$_POST['titulo'];
$categoria=$_POST['categoria'];
$ubicacion=$_POST['ubicacion'];
$telefono_organizador=$_POST['telefono_organizador'];
$correo_organizador=$_POST['correo_organizador'];
$nombre_organizador=$_POST['nombre_organizador'];
// $fecha=date("d-m-Y", strtotime($_POST['fecha']));
$fecha=date($_POST['fecha']);
$hora=$_POST['hora'];
$imagen=$_POST['imagen'];
$descripcion=$_POST['descripcion'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];


    $sql="SELECT * FROM eventos WHERE titulo='$titulo' and status!='2'";
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
        file_put_contents("../img/inicio/sesion_eventos/".$file_nombre,$imagen);

        $sql2="INSERT INTO eventos(
            titulo,
            descripcion,
            id_categoria,
            ubicacion,
            fecha,
            hora,
            telefono_organizador,
            correo_organizador,
            nombre_organizador,
            latitud,
            longitud,
            ruta,
            status
            ) VALUES (
            '$titulo',
            '$descripcion',
            '$categoria',
            '$ubicacion',
            '$fecha',
            '$hora',
            '$telefono_organizador',
            '$correo_organizador',
            '$nombre_organizador',
            '$latitud',
            '$longitud',
            '$file_nombre',
            '1'
            )";
        // $query2=mysqli_query($conexion,$sql2);

        if(mysqli_query($conexion,$sql2)){
            echo 1;
        }else{
            echo 2;
            // echo "Error: " . $sql. mysqli_error($conexion);
        }
    }

// }
?>