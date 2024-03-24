<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
// if(getVerificar($conexion,"entes_descentralizados_documentos")){

$titulo=$_POST['titulo'];
$antigua=$_POST['antigua'];
$id=$_POST['id'];

// var_dump($documento);
        
    if (isset($_FILES['documento']) && !empty($_FILES['documento'])) {
            
            if($_FILES['documento']['type']=='application/pdf'){
                $uploads_dir = '../img/inicio/tramites_y_servicios_documentos/';            
                $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                $nombre = $_FILES['documento']['name'];            
                $temp = explode('.' ,$nombre);
                $extension = end($temp);
                $nombreFinal = time().'.'.$extension;            
                move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                $guardar="UPDATE tramites_y_servicios_documentos SET titulo='$titulo', ruta='$nombreFinal' WHERE id='$id'";                        
            }

    } else {
        $guardar="UPDATE tramites_y_servicios_documentos SET titulo='$titulo' WHERE id='$id'";
    }


    $guardado=mysqli_query($conexion,$guardar);
    if ($guardado) {
        if(isset($_FILES['documento'])){
            unlink('../img/inicio/tramites_y_servicios_documentos/'.$antigua);            
    }
        echo 1;
    }else{
        echo 2;
    }
        
// }
?>