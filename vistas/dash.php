<?php
session_start();
$id_user=$_SESSION["id_user"];
//error_reporting(0);
    include("../conexion/conexion.php");
    include("../acceso/permisos.php");
    $conexion=conexion();
?>

<!-- BEGIN .main-heading -->
<h4 class="page-title">Dashboard</h4>
<!-- END: .main-heading -->

<div class="row" id="dash">
    <?php
         echo getDashboard($id_user,$conexion);
    ?>
</div>