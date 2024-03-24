<?php
session_start();
$id_user=$_SESSION["id_user"];
//error_reporting(0);
    include("../conexion/conexion.php");
    include("../acceso/permisos.php");
    $conexion=conexion();
?>
<input type="hidden" name="horario_i" id="horario_i" value="<?php echo date('D M j G:i:s T Y');?>">
<script>
function tiempo() {
    var horita = new Date('' + $('#horario_i').val());
    addTime = horita.getSeconds() + 1; //Tiempo en segundos
    horita.setSeconds(addTime);
    $('#horario_i').val(horita);
}
</script>


    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                
                <a href="#" id="menu_inicio" onclick="linked($(this))" class="logo">
                    <img src="../assets/img/logo-blanco.png" style="width: 130px;" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">

                                <div class="avatar avatar-online">
                                    <span class="avatar-title rounded-circle bg-grey2">
                                        <?php echo substr($_SESSION["nombre"], 0, 1)." ".substr($_SESSION["apellido"], 0, 1) ?>
                                    </span>
                                </div>

                                <!-- <div class="avatar-sm">
                                    <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                                </div> -->
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <!-- <div class="dropdown-divider"></div> -->
                                        <a class="dropdown-item" href="#" id="perfil">Mi Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" id="contra">Cambiar contraseña</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" id="lock">Bloquear pantallas</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" id="salir">Cerrar Sesión</a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">           
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-primary">
                        <?php
                            echo getMenu($id_user,$conexion);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">

                    <!-- <div class="d-flex justify-content-center centrado">
                        <div class="spinner-border" role="status" id="loading" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div> -->

                    <div class="centrado">
                        <img id="loading" src="../assets/img/loader.gif" alt="" style="display: none;">
                    </div>

                    <div id="dash">
                        <?php
                            // echo getDashboard($id_user,$conexion);
                        ?>
                    </div>
                </div>
            </div>




            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Soporte
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        Created 
                        by <a href="https://cintecsa.net">CINTECSA</a>
                    </div>              
                </div>
            </footer>
        </div>
        
        <!-- Custom template | don't include it in your project! -->
        <div class="custom-template">
            <div class="title">Settings</div>
            <div class="custom-content">
                <div class="switcher">
                    <div class="switch-block">
                        <h4>Logo Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
                            <button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                            <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Navbar Header</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeTopBarColor" data-color="dark"></button>
                            <button type="button" class="changeTopBarColor" data-color="blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                            <button type="button" class="changeTopBarColor" data-color="green"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange"></button>
                            <button type="button" class="changeTopBarColor" data-color="red"></button>
                            <button type="button" class="changeTopBarColor" data-color="white"></button>
                            <br/>
                            <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                            <button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                            <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                            <button type="button" class="changeTopBarColor" data-color="green2"></button>
                            <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                            <button type="button" class="changeTopBarColor" data-color="red2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Sidebar</h4>
                        <div class="btnSwitch">
                            <button type="button" class="selected changeSideBarColor" data-color="white"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark"></button>
                            <button type="button" class="changeSideBarColor" data-color="dark2"></button>
                        </div>
                    </div>
                    <div class="switch-block">
                        <h4>Background</h4>
                        <div class="btnSwitch">
                            <button type="button" class="changeBackgroundColor" data-color="bg2"></button>
                            <button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
                            <button type="button" class="changeBackgroundColor" data-color="bg3"></button>
                            <button type="button" class="changeBackgroundColor" data-color="dark"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-toggle">
                <i class="flaticon-settings"></i>
            </div>
        </div>
        <!-- End Custom template -->
    </div>


    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


    <!-- Chart JS -->
    <!-- <script src="../assets/js/plugin/chart.js/chart.min.js"></script> -->

    <!-- jQuery Sparkline -->
    <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <!-- <script src="../assets/js/plugin/chart-circle/circles.min.js"></script> -->

    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="../assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Sweet Alert -->
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="../assets/js/atlantis.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo-min.js"></script>
    <!-- <script src="../assets/js/demo.js"></script> -->

    <script src="../assets-plugin/js/pickers/flatpickr.js"></script>
        
    <script src="../js/funct-min.js"></script>



<script type="text/javascript">
$("#userSettings").data('id', 0);


$("#salir").click(function() {
    salir();
});

$("#salir2").click(function() {
    salir();
});

$("#lock").click(function() {
    lock();
});

$("#lock2").click(function() {
    lock();
});
$("#perfil").click(function() {
    perfil();
});

$("#perfil2").click(function() {
    perfil();
});

$("#contra").click(function() {
    contra();
});
setTimeout(() => {
    $('[data-toggle="tooltip"]').tooltip();
}, 3000);
datas();
setInterval(function() {
    // Nuevos_pedidos()
}, 45000);

setInterval(function() {
    // UpdatePedidos()
}, 45000);

$(document).ready(function() {
    $("#menu_inicio").click();
});

</script>

