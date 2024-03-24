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
            $id=$_POST['id'];

            if (!empty($_FILES) || $_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/jpg' || $_FILES['file']['type']=='image/png') {


                // $uploadDir = "../img/inicio/conociendo_carirubana_img/"; 
                // $fileName = basename($_FILES['file']['name']); 
                // $uploadFilePath = $uploadDir.$fileName; 

                $uploads_dir = '../img/inicio/turismo_img/';            
                $ubicacionTemporal = $_FILES['file']['tmp_name'];
                $nombre = $_FILES['file']['name'];            
                $temp = explode('.' ,$nombre);
                $extension = end($temp);
                $nombreFinal = $randomString.'.'.$extension; #time()
                // move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                if(move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal)){ 
                    $sql2="INSERT INTO conociendo_carirubana_imagenes (ruta,id_conociendo_carirubana,status) 
                        values 
                    ('$nombreFinal','$id',1)";        
                    $query2=mysqli_query($conexion,$sql2);

                  echo 1;
                } else {
                  echo 2;
                }

            }
        }

}
?>