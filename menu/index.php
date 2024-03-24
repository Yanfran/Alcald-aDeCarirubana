<?php
    error_reporting(0); 
    session_start();
    $id_user=$_SESSION["id_user"];

        include("../conexion/conexion.php");
        include("../acceso/permisos.php");
        $conexion=conexion();
          if(empty($_SESSION["usuario"]) || empty($_SESSION["password"])){
                ?>
    <script type="text/javascript">
    this.document.location.href = "../login";
    </script>
    <?php
          }else{

    	   } 
?>
<!doctype html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard Carirubana</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/favicon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis-min.css">
    <link rel="stylesheet" href="../assets/css/estilos.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo-min.css">

    <link rel="stylesheet" href="../assets/css/file-uploaders/dropzone.css">  

    <link rel="stylesheet" href="../assets-plugin/css/flaticon-min.css">  
    <link rel="stylesheet" href="../assets-plugin/css/font-awesome-all-min.css"> 
    <link rel="stylesheet" href="../assets-plugin/css/pickers/flatpickr.css">   
    <link rel="stylesheet" href="../assets-plugin/css/style-min.css">

    <style>
        /*@media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
          .inner-column-campana{
            margin-left: 0px!important;
          }
          .content-column-campana{
            right: 0px!important;
          }
        }*/
    </style>
       
</head>

<body>


    <div id="contenedor_j">

       <div class="row justify-content-md-center" id="preloader">
            <div class="col col-lg-2">            
            </div>
            <div class="col-md-auto">
                <div class="loader loader-primary"></div>
            </div>
            <div class="col col-lg-2">            
            </div>
        </div> 

    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="../js/funct-min.js"></script>

    
  
    <script type="text/javascript">
        cargar();    
    </script>



</body>

<!-- Mirrored from bootstrap.gallery/Bluemoon-v4.0.3/bluemoon-apple/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2019 14:22:16 GMT -->

</html>

