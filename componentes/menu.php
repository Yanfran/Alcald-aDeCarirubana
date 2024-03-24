<!-- search-popup -->
<div id="search-popup" class="search-popup">
    <div class="close-search"><span>Close</span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <form method="post" action="index.php">
                <div class="form-group">
                    <fieldset>
                        <input type="search" class="form-control" name="search-input" value=""
                            placeholder="Search Here" required>
                        <input type="submit" value="Search Now!" class="theme-btn style-four">
                    </fieldset>
                </div>
            </form>
            <h3>Recent Search Keywords</h3>
            <ul class="recent-searches">
                <li><a href="index.php">Finance</a></li>
                <li><a href="index.php">Idea</a></li>
                <li><a href="index.php">Service</a></li>
                <li><a href="index.php">Growth</a></li>
                <li><a href="index.php">Plan</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- search-popup end -->
<!-- sidebar cart item -->
<div class="xs-sidebar-group info-group info-sidebar">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget"><i class="fal fa-times"></i></a>
            </div>
            <div class="sidebar-textwidget">
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="index.php">
                                <img src="assets-from/images/logo-alcaldia-borde-blanco.png" alt="" />
                            </a>
                        </div>
                        <div class="content-box">
                            <h4>Book Now</h4>
                            <form action="index.php" method="post" class="booking-form">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Text"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit">Send Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->
<!-- main header -->
<header id="header" class="main-header style-one">
    <!-- header-top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="left-column pull-left clearfix">
                <?php 
                    function contador(){
                        $archivo = "contador.txt"; //el archivo que contiene en numero
                        $f = fopen($archivo, "r"); //abrimos el archivo en modo de lectura
                        if($f)
                        {
                            $contador = fread($f, filesize($archivo)); //leemos el archivo
                            $contador = $contador + 1; //sumamos +1 al contador
                            fclose($f);
                        }
                        $f = fopen($archivo, "w+");
                        if($f)
                        {
                            fwrite($f, $contador);
                            fclose($f);
                        }
                        return $contador;
                    }

                    $visitantes = contador();
                    echo "<div class='weathre-box'><i class='flaticon-star'></i>
                    Visto: ".$visitantes.'</div>';

                    // echo "<a href='' class='btn-flotante-visitas'>Visto: ".$visitantes."</a>";
                ?>
                    <!-- <div class="weathre-box"><i class="flaticon-sunny-day-or-sun-weather"></i>
                    <a href="index.php">25th Jan: 32 0C / 65 0F</a></div> -->
                    <!-- <ul class="links-box clearfix">                                
                        <li><a href="#">Faq’s</a></li>                                
                    </ul> -->
                </div>
                <div class="right-column pull-right clearfix">
                    <ul class="info-list clearfix">
                        <!-- <li><i class="flaticon-phone-with-wire"></i><a href="tel:2692458511">+58 269 2458511</a></li> -->
                        <li><i class="flaticon-fast"></i>Fecha: <a href="#" id="fecha-cabecera"></a></li>
                    </ul>
                    <ul class="social-links clearfix">
                        <li><a href="https://twitter.com/alcarirubana2" target="_black"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.facebook.com/profile.php?id=100082118151171" target="_black"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/alcarirubana" target="_black"><i class="fab fa-instagram"></i></a></li>
                        <!-- <li><a href="index.php"><i class="fab fa-linkedin"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="index.php"><img src="assets-from/images/logo-alcaldia-2.png" width="150" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix pull-right">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current dropdown">
                                    <a href="index.php">Inicio</a>
                                    <ul>
                                        <li><a href="el-alcalde.php">El Alcalde</a></li>
                                        <li class="dropdown"><a href="#">La Alcaldía</a>
                                            <ul>
                                                <li><a href="mision-y-vision.php">Misión y Visión</a></li>
                                                <li><a href="history.html">Organigrama</a></li>                                                              
                                                <li><a href="la-alcaldia.php">Historia</a></li>         
                                                <li><a href="simbolos-patrios.php">Símbolos Municipales</a></li>                                                     
                                            </ul>
                                        </li>
                                        <li class="dropdown"><a href="#">Multimedia</a>
                                            <ul>
                                                <li><a href="ordenanzas.php">Ordenanzas</a></li>            
                                                <li><a href="semanario.php">Semanario</a></li>         
                                                <li><a href="libros_revistas.php">Revistas</a></li>         
                                            </ul>
                                        </li>
                                        <li><a href="entes.php">Entes</a></li>
                                        <li><a href="turismo.php">Turismo</a></li>                                                
                                    </ul>
                                </li>
                                <li><a href="tramites_servicios.php">Servicios</a></li>
                                <li><a href="eventos.php">Eventos</a></li>
                                <li><a href="noticias.php">Noticias</a></li>                                                                                
                                <li class="current dropdown"><a href="#">GAC</a>
                                    <ul>                                                
                                        <!-- <li><a href="#">Recaudación Tributaria</a></li>
                                        <li><a href="#">Inversion Social</a></li>
                                        <li><a href="#">Seguimiento a las Obras</a></li> 
                                        <li><a href="#">Mantenimiento Vial</a></li>
                                        <li><a href="#">Contratación Transparente</a></li>
                                        <li><a href="#">Así va el Plan de Gestión Municipal 2022-2025</a></li> -->
                                        <li><a href="transparencia.php">Transparecia</a></li>
                                    </ul>
                                </li>
                                <li><a href="contacto.php">Contacto</a></li> 
                            </ul>
                        </div>
                    </nav>
                    <!-- <div class="menu-right-content clearfix">
                        <ul class="other-option clearfix">
                            <li class="search-btn">
                                <button type="button" class="search-toggler"><i class="far fa-search"></i></button>
                            </li>                                    
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="index.php">
                        <img src="assets-from/images/logo-alcaldia-2.png" width="150" alt="">
                    </a>
                </figure>
                </div>
                <div class="menu-area clearfix pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                    <!-- <div class="menu-right-content clearfix">
                        <ul class="other-option clearfix">
                            <li class="search-btn">
                                <button type="button" class="search-toggler"><i class="far fa-search"></i></button>
                            </li>                                   
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="index.php">
            <img src="assets-from/images/logo-blanco.png" width="150" alt="">
        </a>
    </div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Información de Contacto</h4>
            <ul>
                <li>
                    Avenida Rafael González entre Av. Los Caobos y Las Acacias Punto Fijo Estado Falcón
                </li>
                <li><a href="tel:+5802692458511">+58 (0269) 2458511</a></li>
                <li><a style="font-size: 13px;" href="mailto:contacto@alcaldiadecarirubana.com">contacto@alcaldiadecarirubana.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
            <li><a href="https://twitter.com/alcarirubana2" target="_black"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/profile.php?id=100082118151171" target="_black"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.instagram.com/alcarirubana" target="_black"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->
