<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"eventos");
if($permiso==true){
$sql="SELECT eventos.id, eventos.titulo, eventos.descripcion, eventos.id_categoria, eventos.ubicacion,
eventos.fecha, eventos.hora, eventos.telefono_organizador, eventos.correo_organizador, eventos.nombre_organizador,
eventos.latitud, eventos.longitud, eventos.ruta, eventos.status, categoria_eventos.descripcion FROM eventos 
INNER JOIN categoria_eventos ON categoria_eventos.id = eventos.id_categoria WHERE eventos.status!=2 ORDER BY eventos.id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	
	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "descripcion" => $fila[2],        
        "id_categoria" => $fila[3],
        "ubicacion" => $fila[4],
        "fecha" => $fila[5],
        "hora" => $fila[6],
        "telefono_organizador" => $fila[7],
        "correo_organizador" => $fila[8],
        "nombre_organizador" => $fila[9],        
        "latitud" => $fila[10],
        "longitud" => $fila[11],
        "ruta" => $fila[12],
        "status" => $fila[13],       
        "categoria" => $fila[14] 
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>