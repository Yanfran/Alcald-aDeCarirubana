<?php
error_reporting(0);
session_start();
$_SESSION["id_user"]="";
$_SESSION["usuario"]="";
$_SESSION["nombre"]="";
$_SESSION["apellido"]="";
$_SESSION["password"]="";
$_SESSION["rol"]="";
$_SESSION["id_rol"]="";
session_destroy();
?>
<script type="text/javascript">
this.document.location.href="../login/";
</script>