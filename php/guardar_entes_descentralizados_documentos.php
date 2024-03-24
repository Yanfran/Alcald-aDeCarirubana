<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
// if(getVerificar($conexion,"entes_descentralizados_documentos")){

$titulo=$_POST['titulo'];
$documento=$_FILES['documento'];
$id=$_POST['id'];

// var_dump($documento);


    if($_FILES['documento']['type']=='application/pdf'){            

        $sql="SELECT * FROM entes_descentralizados_documentos WHERE titulo='$titulo' and status!='2'";
        $query=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_array($query);
        if(is_countable($fila)>0){
            echo 0;
        }else{
            
            if (isset($_FILES['documento']) && !empty($_FILES['documento'])) {            
            
                $uploads_dir = '../img/inicio/entes_descentralizados_ducumentos/';            
                $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                $nombre = $_FILES['documento']['name'];            
                $temp = explode('.' ,$nombre);
                $extension = end($temp);
                $nombreFinal = time().'.'.$extension;            
                move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                $sql2="INSERT INTO entes_descentralizados_documentos(titulo,ruta,id_entes_descentralizados,status) values ('$titulo','$nombreFinal','$id',1)";        
                $query2=mysqli_query($conexion,$sql2);
                if($query2){
                    echo 1;
                }else{
                    echo 2;
                }
            }
        }

    } else {
        echo 2;
    }




// }
?>