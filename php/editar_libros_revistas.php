<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$imagen=$_REQUEST['imagen'];
$antigua=$_REQUEST['antigua'];
$antigua_documento=$_REQUEST['antigua_documento'];

            if (isset($_FILES['documento']) && !empty($_FILES['documento']) && $imagen!="" && isset($imagen) && !empty($imagen)) {

                if($_FILES['documento']['type']=='application/pdf'){                
                    $uploads_dir = '../img/inicio/sesion_libros_revistas/';            
                    $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                    $nombre = $_FILES['documento']['name'];            
                    $temp = explode('.' ,$nombre);
                    $extension = end($temp);
                    $nombreFinal = time().'.'.$extension;            
                    move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);
                }   

                $file_nombre=time().".png";
                $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                $imagen=str_replace(" ","+",$imagen);
                $imagen=base64_decode($imagen);
                file_put_contents("../img/inicio/sesion_libros_revistas/caratula/".$file_nombre,$imagen);

                $guardar="UPDATE libros SET titulo='$titulo', documento='$nombreFinal', ruta='$file_nombre' WHERE id='$id'";


            } elseif (isset($_FILES['documento']) && !empty($_FILES['documento'])) {

                if($_FILES['documento']['type']=='application/pdf'){                
                    $uploads_dir = '../img/inicio/sesion_libros_revistas/';            
                    $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                    $nombre = $_FILES['documento']['name'];            
                    $temp = explode('.' ,$nombre);
                    $extension = end($temp);
                    $nombreFinal = time().'.'.$extension;            
                    move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);
                }             

                $guardar="UPDATE libros SET titulo='$titulo', documento='$nombreFinal' WHERE id='$id'";

            } elseif ($imagen!="" && isset($imagen) && !empty($imagen)) {
                $file_nombre=time().".png";
                $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                $imagen=str_replace(" ","+",$imagen);
                $imagen=base64_decode($imagen);
                file_put_contents("../img/inicio/sesion_libros_revistas/caratula/".$file_nombre,$imagen);

                $guardar="UPDATE libros SET titulo='$titulo', ruta='$file_nombre' WHERE id='$id'";
            } else {
                $guardar="UPDATE libros SET titulo='$titulo' WHERE id='$id'";
            }


            $guardado=mysqli_query($conexion,$guardar);

            if ($guardado) {
                if(isset($_FILES['documento'])){
                    unlink('../img/inicio/sesion_libros_revistas/'.$antigua_documento);            
                }
                if($imagen!=""){
                    unlink('../img/inicio/sesion_libros_revistas/caratula/'.$antigua);            
                }

                echo 1;
            }else{
                echo 2;
            }
            

            

//}
?>