<?php
session_start();
include("./conexion/conexion.php");                        
$conexion=conexion();   
$sql="SELECT turismo.*, categoria_conociendo_carirubana.unico AS unico FROM turismo
        INNER JOIN categoria_conociendo_carirubana ON turismo.id_categoria = categoria_conociendo_carirubana.id 
        WHERE turismo.status = 1 ";
$row=mysqli_query($conexion, $sql);    

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
                        <h1>TURISMO</h1>
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
                                                        <a class="js-textareacopybtn" href="#">
                                                            <i class="fas fa-copy"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://twitter.com/intent/tweet?text= escola%20inform%C3%A1tica%20i%20disseny&url=https://turismo.php&hashtags=dissenyweb" target="_blank">
                                                            <i class="fab fa-twitter"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://api.whatsapp.com/send?text=escola%20inform%C3%A1tica%20i%20disseny%20https://turismo.php" target="_blank">
                                                            <i class="fab fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=turismo.php" target="_blank">
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


        <!-- portfolio-section -->
        <section class="portfolio-section sec-pad centred">
            <div class="auto-container">
                <div class="sec-title centred">
                    <h6><i class="flaticon-star"></i><span>Turismo</span><i class="flaticon-star"></i></h6>
                    <h2>SITIOS TURÍSTICOS</h2>
                    <div class="title-shape"></div>
                </div>
                <div class="sortable-masonry">
                    <div class="filters">
                        <ul class="filter-tabs filter-btns centred clearfix">
                            <?php 
                                $sql3="SELECT * FROM categoria_conociendo_carirubana WHERE status = 1 ORDER BY id ASC";
                                $result3=mysqli_query($conexion, $sql3);                        
                                while ($fila3 = mysqli_fetch_array($result3)) {
                            ?>
                            <!-- <li class="active filter" data-role="button" data-filter=".all">[ View All ]</li> -->
                            <li class="filter" data-role="button" data-filter=".<?php echo $fila3['unico']; ?>"><?php echo $fila3['descripcion']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="items-container row clearfix">
                        <?php 
                            foreach ($row as $resultado):  
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column <?php echo $resultado['unico']; ?>
                        ">
                        <input type="text" class="js-copytextarea" value="" style="display: block; background: #f5f5f6;color: #f5f5f6; position: absolute; margin-left: 20px;">
                            <div class="portfolio-block-two">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img src="./img/inicio/turismo/<?php echo $resultado['ruta']; ?>" 
                                        style="width: 370px; height: 320px;" alt="" loading="lazy">
                                    </figure>
                                    <div class="lower-content" style="text-align: left;">
                                        <h4><?php echo $resultado['titulo']; ?></h4>
                                        <h5><b>Dirección:</b> <?php echo $resultado['direccion']; ?></h5>
                                        <h5><b>Horario:</b> <?php echo $resultado['horario']; ?></h5>
                                        <h5><b>Entrada:</b> <?php echo $resultado['entrada']; ?>1</h5>
                                    </div>
                                    <div class="overlay-content">
                                        <div class="link">
                                            <a href="#" 
                                                data-toggle="modal" 
                                                data-target="#<?php echo substr($resultado['ruta'], 0, -4); ?>">
                                                <i style="font-size: 34px;" class="flaticon-click-1"></i>
                                            </a>
                                        </div>
                                        <div class="text">
                                            <p><?php echo $resultado['titulo']; ?></p>
                                            <h4><a href="#"><?php echo $resultado['descripcion']; ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>              
                        <?php endforeach; ?>
                    </div>


                    <?php 
                    foreach ($row as $resultado2):                     
                    ?>
                    
                        <!-- Modal -->
                        <div class="modal fade " id="<?php echo substr($resultado2['ruta'], 0, -4); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="background: transparent!important;">
                              <div class="modal-header" style="border:none!important">
                                <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                <button style="background: #e41e2f; padding: 8px 11px 8px 11px;; border-radius: 50px; position: absolute; right: 0px; top: -5px; color: #fff;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">                               
                                <section class="service-style-two centred">
                                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" 
                                    style="background: #e41e2f; padding: 8px 11px 8px 11px;; border-radius: 50px; position: absolute; right: 0px; top: -65px;">
                                      <span aria-hidden="true">&times;</span>
                                    </button> -->

                                        <div tyle="width: 270px!important; height: 170px!important;" class="turismo owl-carousel owl-theme owl-dots-none">

                                            <?php 
                                                $sql2="SELECT * FROM conociendo_carirubana_imagenes WHERE status=1 AND id_conociendo_carirubana='".$resultado2['id']."'";
                                                $result2=mysqli_query($conexion, $sql2); 
                                                while ($fila2 = mysqli_fetch_array($result2)) {
                                            ?>

                                            <div class="service-block-two">
                                                <div class="inner-box">
                                                    <figure class="image-box">
                                                        <img src="./img/inicio/turismo_img/<?php echo $fila2['ruta'];?>" 
                                                          alt="" loading="lazy">
                                                    </figure>
                                                </div>
                                            </div>

                                            <?php } ?>
                                        </div>

                                </section>
                                
                              </div>
                            </div>
                          </div>
                        </div>
                    
                    <?php endforeach; ?>

                </div>
                <!-- <div class="pagination-wrapper">
                    <ul class="pagination clearfix">
                        <li><a href="portfolio-2.html"><i class="far fa-angle-double-left"></i></a></li>
                        <li><a href="portfolio-2.html" class="current">1</a></li>
                        <li><a href="portfolio-2.html">2</a></li>
                        <li><a href="portfolio-2.html"><i class="far fa-angle-double-right"></i></a></li>
                    </ul>
                </div> -->
            </div>
        </section>
        <!-- portfolio-section end -->

        <?php include ("./componentes/footer-2.php"); ?>


