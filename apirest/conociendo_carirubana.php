<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"turismo");
if($permiso==true){

$sql="SELECT turismo.id, turismo.titulo, turismo.descripcion, 
turismo.id_categoria, turismo.direccion, turismo.horario, 
turismo.entrada, turismo.ruta, turismo.status, categoria_conociendo_carirubana.descripcion 
FROM turismo 
INNER JOIN categoria_conociendo_carirubana ON categoria_conociendo_carirubana.id = turismo.id_categoria 
WHERE turismo.status!=2 ORDER BY turismo.id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	

     $detallesImg = array();
        $sql2="SELECT * FROM conociendo_carirubana_imagenes WHERE id_conociendo_carirubana='$fila[0]' && status!=2";
        $result2=mysqli_query($conexion, $sql2);
        while ($img=mysqli_fetch_array($result2)) {
            $detallesImg[] = array(
                "id" => $img[0],                
                "ruta" => $img[1],
                "id_conociendo_carirubana" => $img[2],
                "status" => $img[3]
            );
        }

	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],        
        "descripcion" => $fila[2],
        "id_categoria" => $fila[3],
        "direccion" => $fila[4],
        "horario" => $fila[5],
        "entrada" => $fila[6],
        "ruta" => $fila[7],
        "status" => $fila[8],
        "imagenes" => $detallesImg        
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>