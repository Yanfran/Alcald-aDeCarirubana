<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"entes");
if($permiso==true){
$sql="SELECT * FROM entes WHERE status!=2 ORDER BY id DESC";
$result=mysqli_query($conexion, $sql);




while($fila=mysqli_fetch_array($result)){ 	

        $detallesDocumento = array();
        $sql2="SELECT * FROM entes_descentralizados_documentos WHERE id_entes_descentralizados='$fila[0]' && status!=2 ";
        $result2=mysqli_query($conexion, $sql2);
        while ($documentos=mysqli_fetch_array($result2)) {
            $detallesDocumento[] = array(
                "id" => $documentos[0],
                "titulo" => $documentos[1],
                "ruta" => $documentos[2],
                "id_documento" => $documentos[3],
                "status" => $documentos[4]
            );
        }

	$array[] = array(
        "id" => $fila[0],
        "titulo" => $fila[1],        
        "descripcion" => $fila[2],                       
        "icono" => $fila[3],        
        "nombre_cordinador" => $fila[4],
        "telefono_cordinador" => $fila[5],
        "correo_cordinador" => $fila[6],
        "pagina_web" => $fila[7],
        "direccion_fisica" => $fila[8],
        "horario_administrativo" => $fila[9],
        "horario_publico" => $fila[10],
        "numero_emergencia" => $fila[11],
        "twitter" => $fila[12],
        "facebook" => $fila[13],
        "instagram" => $fila[14],
        "ruta" => $fila[15],        
        "status" => $fila[16],
        "documentos" => $detallesDocumento
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>