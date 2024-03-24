<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"noticias");
if($permiso==true){
$sql="SELECT noticias.id, noticias.titulo, noticias.descripcion, noticias.id_categoria, noticias.fecha, noticias.periodista, noticias.fotografo, noticias.ruta, noticias.status, categoria_noticias.descripcion 
FROM noticias
INNER JOIN  categoria_noticias
ON categoria_noticias.id = noticias.id_categoria WHERE noticias.status!=2 ORDER BY noticias.id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	

        $detallesImg = array();
        $sql2="SELECT * FROM noticias_principales_imagenes WHERE id_noticias='$fila[0]' && status!=2";
        $result2=mysqli_query($conexion, $sql2);
        while ($img=mysqli_fetch_array($result2)) {
            $detallesImg[] = array(
                "id" => $img[0],                
                "ruta" => $img[1],
                "id_noticias" => $img[2],
                "status" => $img[3]
            );
        }

	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],
        "descripcion" => $fila[2],        
        "id_categoria" => $fila[3],
        "fecha" => $fila[4],
        "periodista" => $fila[5],
        "fotografo" => $fila[6],
        "ruta" => $fila[7],
        "status" => $fila[8],        
        "categoria" => $fila[9],
        "imagenes" => $detallesImg
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>