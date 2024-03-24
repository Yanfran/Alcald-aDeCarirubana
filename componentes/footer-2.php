<!-- SEMANARIO -->
<?php 
$sqlSemanario="SELECT * FROM semanario WHERE status = 1 ORDER BY id DESC LIMIT 1 ";
$resultSemana=mysqli_query($conexion, $sqlSemanario);                        
while ($fila = mysqli_fetch_array($resultSemana)) {
?>
<a href="./img/inicio/semanario/<?php echo $fila['ruta']; ?>" class="btn-flotante" target="_blank">Semanario</a>
<?php } ?>
<!-- SEMANARIO -->
<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-top-two" style="padding-top: 50px!important;">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="index.php"><img src="assets-from/images/logo-blanco.png" style="width: 200px;" alt="" loading="lazy"></a></figure>
                        <div class="text">
                            <p>
                                De la mano con el presidente Nicolás Maduro y el gobernador Víctor Clark, trabajamos en unidad, lucha, batalla y victoria por nuestra Patria
                            </p>
                        </div>
                        <h3 style="color: #fff;">Eventos</h3>
                        <div class="carousel-box">
                            <div class="twitter-carousel owl-carousel owl-theme">
                                <?php 
                                    $sqlEventos="SELECT * FROM eventos WHERE status=1 ORDER BY id DESC LIMIT 3";
                                    $resultEventos=mysqli_query($conexion, $sqlEventos);                        
                                    while ($filaEventos = mysqli_fetch_array($resultEventos)) {
                                ?>

                                <div class="twitter-box">
                                    
                                    <div class="icon-box"><i class="flaticon-romantic-date"></i></div>
                                    <h5><i class="far fa-calendar"></i> <?php echo date("d-m-Y", strtotime($filaEventos['fecha'])); ?></h5><!----->
                                    <a href="event-details.php?id=<?php echo $filaEventos['id']; ?>">
                                        <p><?php echo $filaEventos['titulo']; ?></p>
                                    </a>
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h4>ENLACES ÚTILES</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="el-alcalde.php">El Alcalde</a></li>
                                <li><a href="tramites_servicios.php">Trámites y Servicios</a></li>
                                <li><a href="noticias.php">Noticias</a></li>
                                <li><a href="eventos.php">Eventos</a></li>
                                <li><a href="entes.php">Entes Municipales</a></li>
                                <li><a href="transparencia.php">Transparencia</a></li>
                                <li><a href="ordenanzas.php">Ordenanzas</a></li>
                                <li><a href="libros_revistas.php">Libros y Revistas</a></li>
                                <li><a href="simbolos-patrios.php">Símbolos Patrios</a></li>
                                <li><a href="#">Organigrama</a></li>
                            </ul>
                            <div class="inner-box clearfix">  
                                <div class="widget-title">  
                                    <h4>@alcarirubana</h4>
                                </div>
                                <ul class="social-style-one clearfix">
                                    <li><a href="https://twitter.com/alcarirubana2" target="_black"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/profile.php?id=100082118151171" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/alcarirubana" target="_black"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                                <div class="widget-title">  
                                    <h4>@soyabelpetit</h4>
                                </div>
                                <ul class="social-style-one clearfix">
                                    <li><a href="https://twitter.com/soyabelpetit" target="_black"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.facebook.com/soyabelpetit" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.instagram.com/soyabelpetit" target="_black"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                    <div class="footer-widget post-widget">
                        <div class="widget-title">
                            <h4>NOTICIAS RECIENTES</h4>
                        </div>
                        <div class="widget-content">
                            <div class="post-inner">
                                <?php 
                                    $sqlFooter="SELECT * FROM noticias WHERE status=1 ORDER BY id DESC LIMIT 2";
                                    $resultFooter=mysqli_query($conexion, $sqlFooter);                        
                                    while ($filaFooter = mysqli_fetch_array($resultFooter)) {
                                ?>
                                <div class="post">
                                    <div class="post-date">
                                        <h3>
                                            <?php echo date("d", strtotime($filaFooter['fecha'])); ?>
                                            <span><?php echo date("m/Y", strtotime($filaFooter['fecha'])) ?></span>
                                        </h3>
                                    </div>
                                    <!-- <div class="post-date"><h3>28<span>Dec’20</span></h3></div> -->
                                    <p><i class="far fa-user"></i><?php echo $filaFooter['periodista']; ?></p>
                                    <h5><a href="noticia.php?id=<?php echo $filaFooter['id']; ?>"><?php echo $filaFooter['titulo']; ?></a></h5>
                                </div>
                                <!-- <div class="post">
                                    <div class="post-date"><h3>14<span>Dec’20</span></h3></div>
                                    <p><i class="far fa-user"></i>Bert Anslem</p>
                                    <h5><a href="blog-details.html">Better Basic Presentation to the Education Committee</a></h5>
                                </div> -->
                                <?php } ?>
                            </div>
                            <div class="subscribe-inner" style="margin-top:95px!important;">
                                <p><b>RIF:</b> G-20000325-1</p>
                                <p><b>Dirección:</b> Avenida Rafael González entre Av. Los Caobos y Las Acacias, Punto Fijo estado Falcón.</p>
                                <p><b>Telf.</b> (0269) 2458511</p>
                                <!-- <form action="contact.html" method="post" class="subscribe-form">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address ..." required="">
                                        <button type="submit">Subscribe</button>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom alternat-2">
        <div class="auto-container">
            <div class="bottom-inner clearfix">
                <div class="copyright pull-left">
                    <p>&copy; 2022 By <a href="#">Alcaldía del Municipio Carirubana</a> All Rights Reserved. </p>
                </div>
                <ul class="footer-nav clearfix pull-right">
                    <li>Created by <b>CINTECSA</b></li>
                    <!-- <li><a href="index.html">Covid’19 Updates </a></li>
                    <li><a href="index.html">Government</a></li> -->
                </ul>
            </div>
        </div>
    </div>
</footer>


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fas fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="assets-from/js/jquery.js"></script>
    <script src="assets-from/js/popper.min.js"></script>
    <script src="assets-from/js/bootstrap.min.js"></script>
    <script src="assets-from/js/owl-min.js"></script>
    <script src="assets-from/js/wow.js"></script>
    <script src="assets-from/js/validation.js"></script>
    <script src="assets-from/js/jquery.fancybox-min.js"></script>
    <script src="assets-from/js/appear-min.js"></script>
    <script src="assets-from/js/scrollbar.js"></script>
    <script src="assets-from/js/jquery.nice-select.min.js"></script>
    <script src="assets-from/js/nav-tool.js"></script>
    <script src="assets-from/js/bxslider-min.js"></script>
    <script src="assets-from/js/isotope.js"></script>
    <script src="assets-from/js/jquery-ui-min.js"></script>
    <script src="assets-from/js/app-min.js"></script>
    <script src="assets-from/js/timePicker-min.js"></script>



    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="assets-from/js/gmaps.js"></script>
    <script src="assets-from/js/map-helper.js"></script>

    <!-- main-js -->
    <script src="assets-from/js/script-min.js"></script>
    <script>

        var hoy = new Date();
        var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
        var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
        var fechaYHora = fecha + ' ' + hora;
        //Obteniendo una variable con la máscara d-m-Y H:i:s
        console.log(fechaYHora);
        const a = document.getElementById("fecha-cabecera");
        a.textContent = fechaYHora;



        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        
        var URLactual = window.location;
        // alert(URLactual);

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

            alert("Enlace Copiado")
            // toastr["success"](
            //     "👋 Su enlace ha sido copiado con éxito!",
            //     "Success!",
            //     {
            //       positionClass: 'toast-bottom-right',
            //       closeButton: true,
            //       tapToDismiss: false,
            //       progressBar: true,
            //     }
            //   );

          } catch (err) {
            console.log('Oops, unable to copy');
          }
        });
    </script>

</body><!-- End of .page_wrapper -->
</html>

