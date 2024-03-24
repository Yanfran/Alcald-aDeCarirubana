<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
//if(getVerificar($conexion,"")){
$id=$_REQUEST['id'];
$titulo=$_POST['titulo'];
$antigua=$_REQUEST['antigua'];


            if (isset($_FILES['documento']) && !empty($_FILES['documento'])) {
                if($_FILES['documento']['type']=='application/pdf'){
                                
                    $uploads_dir = '../img/inicio/sesion_ordenanzas/';            
                    $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                    $nombre = $_FILES['documento']['name'];            
                    $temp = explode('.' ,$nombre);
                    $extension = end($temp);
                    $nombreFinal = time().'.'.$extension;            
                    move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                    $guardar="UPDATE ordenanzas SET titulo='$titulo', ruta='$nombreFinal' WHERE id='$id'";
                }             

            } else {
                $guardar="UPDATE ordenanzas SET titulo='$titulo' WHERE id='$id'";
            }


            $guardado=mysqli_query($conexion,$guardar);

            if ($guardado) {
                if(isset($_FILES['documento'])){
                    unlink('../img/inicio/sesion_ordenanzas/'.$antigua);            
            }
                echo 1;
            }else{
                echo 2;
            }
            

    

            

//}
?>