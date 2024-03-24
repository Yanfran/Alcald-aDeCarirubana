<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();


$id=$_POST['id'];
$sql="SELECT * FROM entes_descentralizados_documentos WHERE id='$id' && status!=2 ORDER BY id DESC";
$result=mysqli_query($conexion, $sql);
if (!$result) {
	die('Fallo la consulta');
} 

$json = array();
while ($fila = mysqli_fetch_array($result)) {
	$json[] = array(
		'id' => $fila['id'],
		'titulo' => $fila['titulo'],
		'ruta' => $fila['ruta']
	);
}

$jsonstring = json_encode($json[0]);
echo $jsonstring;

?>