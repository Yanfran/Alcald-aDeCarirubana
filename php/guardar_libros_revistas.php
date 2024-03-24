<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"libros")){

$titulo=$_POST['titulo'];
$imagen=$_POST['imagen'];


    if($_FILES['documento']['type']=='application/pdf'){            

        $sql="SELECT * FROM libros WHERE titulo='$titulo' and status!='2'";
        $query=mysqli_query($conexion,$sql);
        $fila=mysqli_fetch_array($query);
        if(is_countable($fila)>0){
            echo 0;
        }else{
            
            if (isset($_FILES['documento']) && !empty($_FILES['documento'])) {            
            
                $uploads_dir = '../img/inicio/sesion_libros_revistas/';            
                $ubicacionTemporal = $_FILES['documento']['tmp_name'];
                $nombre = $_FILES['documento']['name'];            
                $temp = explode('.' ,$nombre);
                $extension = end($temp);
                $nombreFinal = time().'.'.$extension;            
                move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                $file_nombre=time().".png";
                $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
                $imagen=str_replace("data:image/jpg;base64,","",$imagen);
                $imagen=str_replace(" ","+",$imagen);
                $imagen=base64_decode($imagen);
                file_put_contents("../img/inicio/sesion_libros_revistas/caratula/".$file_nombre,$imagen);

                $sql2="INSERT INTO libros(titulo,documento,ruta,status) values ('$titulo','$nombreFinal','$file_nombre',1)";        
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


}
?>