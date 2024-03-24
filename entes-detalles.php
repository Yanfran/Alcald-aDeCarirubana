<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();                           

if (isset($_GET['id'])) {

        // echo $_GET['id'];
        $sql="SELECT * FROM entes WHERE status!=2 && status!=0 && id='".$_GET['id']."'";
        $result=mysqli_query($conexion,$sql);

        $fila=mysqli_fetch_array($result);
        if($fila==!''){
?>



    
        <?php include ("componentes/header.php"); ?>

        <!-- main header -->
            <?php include ("./componentes/menu.php"); ?>        
        <!-- main-header end -->

        <!-- Page Title -->
        <section class="page-title blog-page style-two" style="background-image: url(./img/inicio/banner_blog/banner-pequeno-1.jpg);">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title centred">
                        <h1><?php echo $fila['titulo']; ?></h1>
                    </div>
                </div>
            </div>
            <div class="lower-box">
                <div class="auto-container">
                    <div class="post-content">
                        <div class="left-column">                            
                            
                        </div>
                        <div class="right-column">
                            <div class="share-box" style="margin-right: 70px;">
                                <a href="blog-details.html">
                                    Compartir
                                </a>
                            </div>
                            <div 
                                class="team-block-one wow fadeInUp animated animated" 
                                data-wow-delay="00ms" 
                                data-wow-duration="1500ms" 
                                style="margin-top: -250px; margin-left: 110px; position: absolute;">
                                <div class="inner-box" style="background: transparent; box-shadow: none!important">
                                    <div class="lower-content">
                                        <ul class="othre-info clearfix" style="padding-top: 210px;">                     
                                            <li class="share-option" style="margin-left: 0px!important;">
                                                <i class="share-icon flaticon-share"></i>
                                                <ul class="share-links clearfix">
                                                    <li>
                                                        <a class="js-textareacopybtn">
                                                            <i class="fas fa-copy"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?text=<?php echo $fila['titulo']; ?>&url=https://alcaldiadecarirubana.com/entes-detalles.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <!-- <li><a href="index.html"><i class="fab fa-instagram"></i></a></li> -->
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=<?php echo $fila['titulo']; ?>%20https://alcaldiadecarirubana.com/entes-detalles.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://alcaldiadecarirubana.com/entes-detalles.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- department-details -->
        <section class="department-details bg-color-1 sec-pad-2">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="department-details-content">
                            <div class="upper-image">
                                <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                                <figure class="image">
                                    <img src="./img/inicio/sesion_entes_descentralizados/<?php echo $fila['ruta']; ?>" alt="" loading="lazy">
                                </figure>
                            </div>
                            <div class="text descripcion">
                                <p><?php echo $fila['descripcion']; ?></p>
                            </div>

                                                        
                            <div class="download-box">
                                <?php  
                                    $sql2="SELECT * FROM entes_descentralizados_documentos
                                    WHERE status = 1 AND id_entes_descentralizados=".$fila['id']."";
                                    $result2=mysqli_query($conexion, $sql2);                        
                                    $fila2=mysqli_fetch_array($result2);
                                    if ($fila2 > 0) {
                                ?>
                                <h3>Descargar Recursos</h3>
                                    <?php 
                                        }
                                        $sql3="SELECT * FROM entes_descentralizados_documentos
                                        WHERE status = 1 AND id_entes_descentralizados=".$fila['id']."";
                                        $result3=mysqli_query($conexion, $sql3);    
                                        while ($fila3 = mysqli_fetch_array($result3)) {
                                    ?>
                                <ul class="download-list clearfix">  
                                    <li>
                                        <div class="icon-box">
                                            <img src="assets-from/images/icons/icon-1.png" alt="" loading="lazy">
                                        </div>
                                        <h5 style="padding: 10px 0px;"><?php echo $fila3['titulo']; ?></h5>
                                        <!-- <span>pdf (14 mb)</span> -->
                                        <a href="./img/inicio/entes_descentralizados_ducumentos/<?php echo $fila3['ruta']; ?>" target="_blank">
                                            Descargar
                                        </a>
                                    </li>                                       
                                </ul>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                        <div class="department-sidebar">

                            <!-- TODOS LOS ENTES -->
                            <div class="sidebar-banner centred" style="background-image: url(assets-from/images/icons/IMAGEN.png);">
                                <div class="inner-box">
                                    <img class="mb-5" src="assets-from/images/logo-blanco.png" width="200" alt="" style="position: relative;" loading="lazy">

                                    <?php if ($fila['pagina_web']) { ?>
                                    <h3 style="margin-top: -30px;"> 
                                        <a style="padding: 0px!important; background: transparent; color: #fff;" href="<?php echo $fila['pagina_web']; ?>" target="_blank">
                                            <?php echo $fila['pagina_web']; ?>                
                                        </a>
                                    </h3>
                                    <?php } ?>
                                    <a href="entes.php">Todos los Entes</a>
                                </div>
                            </div>
                            <div class="sidebar-category">
                                <div class="inner-box">
                                    <div class="widget-title">
                                        <h3>Entes Descentralizados</h3>
                                        <div class="title-shape"></div>
                                    </div>
                                    <div class="widget-content mb-3">

                                        <?php 
                                        $sql2="SELECT * FROM entes WHERE status = 1 ORDER BY id DESC LIMIT 6";
                                        $result2=mysqli_query($conexion,$sql2);

                                        while ($fila2=mysqli_fetch_array($result2)) {
                                        ?>
                                        <ul class="category-list clearfix">
                                            <li style="padding: 15px 5px; margin-bottom: 10px;">
                                                <div class="icon-box">
                                                    <i class="<?php echo $fila2['icono']; ?>"></i>
                                                </div>
                                                <p 
                                                style="margin-left: 70px;
                                                width: 220px; 
                                                padding: 2px 5px; 
                                                white-space: nowrap; 
                                                overflow: hidden;" 
                                                class="overflow-ellipsis"
                                                data-toggle="tooltip" 
                                                data-placement="top" 
                                                title="<?php echo $fila2['titulo']; ?>">
                                                    <a href="entes-detalles.php?id=<?php echo $fila2['id']; ?>" style="color: #000!important;">
                                                        <?php echo $fila2['titulo']; ?>
                                                    </a>
                                                </p>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                    </div>
                                    <a class="" 
                                        href="entes.php" 
                                        style="background: #e41e2f; 
                                        color: #fff; 
                                        padding: 10px 40px; 
                                        border-radius: 5px;
                                        margin: 10px 26%;
                                        ">Ver Más
                                    </a>
                                </div>
                            </div>
                            
                            <!-- TODOS LOS ENTES -->

                            <!-- SESION DE CONTACTOS -->
                            <?php  
                                if ($fila['direccion_fisica'] || $fila['horario_administrativo'] || $fila['horario_publico'] || $fila['numero_emergencia']) {
                            ?>
                            <div class="sidebar-contact">
                                <div class="widget-title">
                                    <h3>Ponerse en contacto</h3>
                                    <p>Formas de contactarnos</p>
                                    <div class="title-shape"></div>
                                </div>
                                <ul class="info-list clearfix">
                                    <?php if ($fila['horario_administrativo']) {  ?>
                                    <li>
                                        <div class="icon-box"><i class="flaticon-government"></i></div>
                                        <h5>Horario Administrativo</h5>
                                        <p><?php echo $fila['horario_administrativo']; ?></p>
                                    </li>
                                    <?php } if ($fila['horario_publico']) { ?>
                                    <li>
                                        <div class="icon-box"><i class="flaticon-employee"></i></div>
                                        <h5>Horario Atención al Público</h5>
                                        <p><?php echo $fila['horario_publico']; ?></p>
                                    </li>
                                    <?php } if ($fila['numero_emergencia']) { ?>
                                    <li>
                                        <div class="icon-box"><i class="flaticon-alert"></i></div>
                                        <h5>Número de Emergencia</h5>
                                        <p>
                                            <a href="tel:<?php echo $fila['numero_emergencia']; ?>">
                                                <?php echo $fila['numero_emergencia']; ?>
                                            </a>
                                        </p>
                                    </li>
                                    <?php } if ($fila['direccion_fisica']) { ?>
                                    <li>
                                        <div class="icon-box"><i class="flaticon-map"></i></div>
                                        <h5>Dirección</h5>
                                        <p><a href="tel:311"><?php echo $fila['direccion_fisica']; ?></a></p>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>   
                            <?php } ?>    
                            <!-- SESION DE CONTACTOS -->


                            <!-- REDES SOCIALES -->
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-4 mb-4">
                                <div class="content_block_12">
                                    <div class="content-box">
                                        <div class="social-box">

                                                <?php  
                                                    if ($fila['twitter'] || $fila['facebook'] || $fila['instagram']) {
                                                
                                                ?>  

                                            <h4>Redes Sociales</h4>
                                            <ul class="social-style-one clearfix">

                                                <?php if ($fila['twitter']) { ?>

                                                <li>
                                                    <a href="http://twitter.com/intent/user?screen_name=<?php echo $fila['twitter']; ?>" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                    </a>
                                                </li>

                                                <?php } if ($fila['facebook']) {  ?>

                                                <li>
                                                    <a href="https://www.facebook.com/<?php echo $fila['facebook']; ?>" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </a>
                                                </li>

                                                <?php } if ($fila['instagram']) {  ?>

                                                <li>
                                                    <a href="https://www.instagram.com/<?php echo $fila['instagram']; ?>/?ref=badge" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                </li>

                                                <?php } ?>
                                            </ul>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- REDES SOCIALES -->

                            

                            <?php 
                                if ($fila['nombre_cordinador']){
                            ?>

                            <div class="sec-title" style="margin-bottom: 10px;">
                                <h6 style="margin-bottom: -10px;"><span>Nombre del Director </span></h6>
                                <p style="margin-left: 10px;"><?php echo $fila['nombre_cordinador']; ?></p>
                            </div>

                            <?php } if ($fila['telefono_cordinador']){ ?>

                            <div class="sec-title" style="margin-bottom: 10px;">
                                <h6 style="margin-bottom: -10px;"><span>Teléfono </span></h6>
                                <p style="margin-left: 10px;"><?php echo $fila['telefono_cordinador']; ?></p>
                            </div>

                            <?php } if ($fila['correo_cordinador']){ ?>

                            <div class="sec-title">
                                <h6 style="margin-bottom: -10px;"><span>Correo Electrónico </span></h6>
                                <p style="margin-left: 10px;"><?php echo $fila['correo_cordinador']; ?></p>
                            </div>

                            <?php }  ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- department-details end -->


        <?php include ("componentes/footer-2.php"); ?>



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fas fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets-from/js/jquery.js"></script>
    <script src="assets-from/js/popper.min.js"></script>
    <script src="assets-from/js/bootstrap.min.js"></script>
    <script src="assets-from/js/owl.js"></script>
    <script src="assets-from/js/wow.js"></script>
    <script src="assets-from/js/validation.js"></script>
    <script src="assets-from/js/jquery.fancybox.js"></script>
    <script src="assets-from/js/appear.js"></script>
    <script src="assets-from/js/scrollbar.js"></script>
    <script src="assets-from/js/jquery.nice-select.min.js"></script>
    <script src="assets-from/js/nav-tool.js"></script>
    <script src="assets-from/js/isotope.js"></script>

    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="./app-assets/js/scripts/extensions/ext-component-toastr.js"></script>

    <!-- main-js -->
    <!-- <script src="assets-from/js/script.js"></script> -->
        <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        var URLactual = window.location;
        $(".js-copytextarea").val(URLactual);

        var copyTextareaBtn = document.querySelector('.js-textareacopybtn');

        copyTextareaBtn.addEventListener('click', function(event) {
          var copyTextarea = document.querySelector('.js-copytextarea');
          copyTextarea.focus();
          copyTextarea.select();

          try {
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copying text command was ' + msg);

            toastr["success"](
                "👋 Su enlace ha sido copiado con éxito!",
                "Success!",
                {
                  positionClass: 'toast-bottom-right',
                  closeButton: true,
                  tapToDismiss: false,
                  progressBar: true,
                }
              );

          } catch (err) {
            console.log('Oops, unable to copy');
          }
        });
    </script>

</body><!-- End of .page_wrapper -->
</html>


<?php 

        } else {
            header("Location: ./entes.php");    
        }

    } else {
        header("Location: ./entes.php");
    }
?>
