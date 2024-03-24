<?php
include('../conexion/conexion.php');
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"configuracion")){
$id=$_REQUEST['idtxt'];
$descripcion=$_REQUEST['txtdescripcion'];
$permisos=$_POST['check_per_edit'];

$sql="select * from roles where descripcion='$descripcion' and id!='$id' and status!='2'";
$result=mysqli_query($conexion, $sql);
$fila=mysqli_fetch_array($result);    
if(is_countable($fila)>1){
 echo 0;
}else{

$guardar="update roles set descripcion='$descripcion' where id='$id'";
$guardado=mysqli_query($conexion,$guardar);
if ($guardado) {
    $sql_elim="DELETE FROM permisos WHERE id_rol='$id'";
    $query_elim=mysqli_query($conexion,$sql_elim);
    if($query_elim){
        foreach($permisos as $valor){
            $sql3="INSERT INTO permisos values(NULL,'$id','$valor')";
            $query3=mysqli_query($conexion,$sql3);
        }
    } 
echo 1;
}else{
	echo 2;
}
}

}

?>