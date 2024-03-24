<?php
include('../conexion/conexion.php');
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"configuracion")){
$descripcion=$_POST['txtdescripcion'];
$permisos=$_POST['check_per'];

    $sql="SELECT * FROM roles WHERE descripcion='$descripcion' and status!='2'";
    $query=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($query);
    if(is_countable($fila)>0){
        echo 0;
    }else{
        $sql2="INSERT INTO roles values(NULL,'$descripcion','1')";
        $query2=mysqli_query($conexion,$sql2);
        if($query2){
            $sql="SELECT * FROM roles WHERE descripcion='$descripcion'";
            $query=mysqli_query($conexion,$sql);
            $id_rol="";
            while($fila=mysqli_fetch_array($query)){
                $id_rol=$fila[0];
            }
            foreach($permisos as $valor){
                $sql3="INSERT INTO permisos values(NULL,'$id_rol','$valor')";
                $query3=mysqli_query($conexion,$sql3);
            }
            echo 1;
        }else{
            // echo "Error: " . $sql. mysqli_error($conexion);
            echo 2;
        }
    }

}
?>