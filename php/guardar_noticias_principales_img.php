<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"noticias")){

$id=$_POST['id'];


// $sql="SELECT id_noticias COUNT(*) FROM noticias_principales_imagenes WHERE and status!='2'";
//     $query=mysqli_query($conexion,$sql);
//     $fila=mysqli_fetch_array($query);
    
//     if(is_countable($fila)>0){
//         echo 0;
//     }else{

        if (!empty($_FILES) || $_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/jpg' || $_FILES['file']['type']=='image/png') {


            $uploadDir = "../img/inicio/sesion_noticias_principales_img/"; 
            $fileName = basename($_FILES['file']['name']); 
            $uploadFilePath = $uploadDir.$fileName; 

            if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
                $sql2="INSERT INTO noticias_principales_imagenes (ruta,id_noticias,status) values ('$fileName','$id',1)";        
                $query2=mysqli_query($conexion,$sql2);

              echo 1;
            } else {
              echo 2;
            }

        }

    // }


    // if($_FILES['file']['type']=='image/jpeg' || $_FILES['file']['type']=='image/jpg' || $_FILES['file']['type']=='image/png'){            


            
    //         if (isset($_FILES['file']) && !empty($_FILES['file'])) {

    //             $file=$_FILES['file'];


    //             $uploads_dir = '../img/inicio/sesion_noticias_principales_img/';            
    //             $ubicacionTemporal = $_FILES['file']['tmp_name'];
    //             $nombre = $_FILES['file']['name'];            
    //             $temp = explode('.' ,$nombre);
    //             $extension = end($temp);
    //             $nombreFinal = time().'.'.$extension;            
    //             move_uploaded_file($ubicacionTemporal, $uploads_dir.$nombreFinal);

                
    //             foreach($nombreFinal as $a => $b){
    //                 $sql2="INSERT INTO noticias_principales_imagenes(ruta,id_noticias,status) values ('$nombreFinal[$a]','$id',1)";        
    //                 $query2=mysqli_query($conexion,$sql2);


    //                 if($query2){
    //                     echo 1;
    //                 }else{
    //                     echo 2;
    //                 }
                    
    //             }

    //         }
        

    // } else {
    //     echo 2;
    // }




    // $sql="SELECT * FROM noticias_principales_imagenes WHERE ruta <= 5 and status!='2'";
    // $query=mysqli_query($conexion,$sql);
    // $fila=mysqli_fetch_array($query);
    // if(is_countable($fila)>0){
    //     echo 0;
    // }else{

    //     $file_nombre=time().".png";
    //     $imagen=str_replace("data:image/jpeg;base64,","",$imagen);
    //     $imagen=str_replace("data:image/jpg;base64,","",$imagen);
    //     $imagen=str_replace(" ","+",$imagen);
    //     $imagen=base64_decode($imagen);
    //     file_put_contents("../img/inicio/sesion_noticias_principales_img/".$file_nombre,$imagen);

    //     $sql2="INSERT INTO noticias_principales_imagenes(ruta,id_noticias,status) values('$file_nombre','$id',0)";
    //     $query2=mysqli_query($conexion,$sql2);
    //     if($query2){
    //         echo 1;
    //     }else{
    //         echo 2;
    //     }
    // }

}
?>