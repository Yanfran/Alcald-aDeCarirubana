<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
$array = array();
$permiso=getVerificarApi($conexion,"tramites");
if($permiso==true){
$sql="SELECT * FROM  tramites WHERE status!=2 ORDER BY id DESC";
$result=mysqli_query($conexion, $sql);

while($fila=mysqli_fetch_array($result)){ 	

        $detallesDocumento = array();
        $sql2="SELECT * FROM tramites_y_servicios_documentos WHERE id_tramites_y_servicios='$fila[0]' && status!=2 ";
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
        "categoria" => $fila[3],
        "icono" => $fila[4],        
        "nombre_cordinador" => $fila[5],
        "telefono_cordinador" => $fila[6],
        "correo_cordinador" => $fila[7],
        "pagina_web" => $fila[8],
        "direccion_fisica" => $fila[9],
        "horario_administrativo" => $fila[10],
        "horario_publico" => $fila[11],
        "numero_emergencia" => $fila[12],
        "twitter" => $fila[13],
        "facebook" => $fila[14],
        "instagram" => $fila[15],
        "ruta" => $fila[16],        
        "ruta_detalle" => $fila[17],        
        "status" => $fila[18],
        "documentos" => $detallesDocumento
    );
}
}
$arreglo['data']=$array;
$resultado=json_encode($arreglo);

echo $resultado;
?>