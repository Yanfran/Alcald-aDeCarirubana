<?php
function getDashboard($id,$conexion){
$sql="SELECT permisologia.descripcion,roles.id FROM roles INNER JOIN usuario on usuario.id_rol=roles.id INNER JOIN permisos on permisos.id_rol=roles.id INNER JOIN permisologia on permisologia.id=permisos.id_permisologia WHERE usuario.id='$id' ORDER BY permisologia.id asc";
$query=mysqli_query($conexion,$sql);
$dash="";
$a=0;
$contusers=0;
$coutbanner=0;
$coutalcalde=0;
$coutramites=0;
$coutnoticias=0;
$couturismo=0;
$coutordenanzas=0;
$coutsemanario=0;
$coutlibrosrevistas=0;
$couteventos=0;
$coutentes=0;
while($fila=mysqli_fetch_array($query)){
    
    

    $sql2="select count(*) from usuario where status!=2 and id_rol!=1";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $contusers=$fila2[0];
    }


    $sql2="select count(*) from banner where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutbanner=$fila2[0];
    }

    $sql2="select count(*) from alcalde where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutalcalde=$fila2[0];
    }

    $sql2="select count(*) from tramites where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutramites=$fila2[0];
    }

    $sql2="select count(*) from noticias where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutnoticias=$fila2[0];
    }

    $sql2="select count(*) from turismo where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $couturismo=$fila2[0];
    }

    $sql2="select count(*) from ordenanzas where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutordenanzas=$fila2[0];
    }

    $sql2="select count(*) from semanario where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutsemanario=$fila2[0];
    }
    
    $sql2="select count(*) from libros where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutlibrosrevistas=$fila2[0];
    }

    $sql2="select count(*) from eventos where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $couteventos=$fila2[0];
    }

    $sql2="select count(*) from entes where status!=2";
         $result2=mysqli_query($conexion, $sql2);
    while($fila2=mysqli_fetch_array($result2)){
        $coutentes=$fila2[0];
    }


    
        switch($fila[0]){
                                
            
                                case 'banner': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_banner" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Carrusel</p>
                                                        <h4 class="card-title">'.$coutbanner.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                '; break;


                                case 'tramites': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_tramites" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Trámites</p>
                                                        <h4 class="card-title">'.$coutramites.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                               
                                '; break;

                                case 'noticias': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_noticias" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Notícias</p>
                                                        <h4 class="card-title">'.$coutnoticias.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                 
                                '; break;

                                case 'turismo': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_turismo" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Turismo</p>
                                                        <h4 class="card-title">'.$couturismo.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                     
                                '; break;

                                case 'ordenanzas': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_ordenanzas" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Ordenanzas</p>
                                                        <h4 class="card-title">'.$coutordenanzas.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                   
                                '; break;

                                case 'semanario': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_semanario" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Semanario</p>
                                                        <h4 class="card-title">'.$coutsemanario.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                  
                                '; break;

                                case 'libros': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_libros" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Libros y Revistas</p>
                                                        <h4 class="card-title">'.$coutlibrosrevistas.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                
                                '; break;

                                case 'eventos': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_eventos" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Eventos</p>
                                                        <h4 class="card-title">'.$couteventos.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                        
                                '; break;

                                case 'entes': $dash.='
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_entes" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Entes</p>
                                                        <h4 class="card-title">'.$coutentes.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                                                  
                                '; break;

                                case 'configuracion': $dash.=' 
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round" style="cursor: pointer;" id="menu_usuarios" onclick="linked($(this))">
                                        <div class="card-body ">
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="icon-big text-center">
                                                        <i class="la flaticon-shapes-1 text-warning"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 col-stats">
                                                    <div class="numbers">
                                                        <p class="card-category">Usuarios</p>
                                                        <h4 class="card-title">'.$contusers.'</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                '; break;

                           

            default: $dash.="";
        }//fin switch
        
    
  }//fin while
  



  return $dash;
}//fin function
function getMenu($id,$conexion){
    $sql="SELECT permisologia.descripcion,roles.id FROM roles INNER JOIN usuario on usuario.id_rol=roles.id INNER JOIN permisos on permisos.id_rol=roles.id INNER JOIN permisologia on permisologia.id=permisos.id_permisologia WHERE usuario.id='$id' ORDER BY permisologia.id asc";
    $query=mysqli_query($conexion,$sql);
    $dash="";
    
    
                                $dash.='
                                <li id="li_dash"  class="nav-item active">
                                    <a href="#" id="menu_inicio" onclick="linked($(this))">
                                        <i class="fas fa-home"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                                ';
                                

    while($fila=mysqli_fetch_array($query)){
        
            switch($fila[0]){

                                case 'banner': $dash.='
                                <li id="li_banner" class="nav-item">
                                    <a href="#" id="menu_banner" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Carrusel
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'alcalde': $dash.='
                                <li id="li_alcalde" class="nav-item">
                                    <a href="#" id="menu_alcalde" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Alcalde
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'tramites': $dash.='
                                <li id="li_tramites" class="nav-item">
                                    <a href="#" id="menu_tramites" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Trámites
                                        </p>
                                    </a>
                                </li> 
                                '; break;

                                case 'noticias': $dash.='
                                <li id="li_noticias" class="nav-item">
                                    <a href="#" id="menu_noticias" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Noticias
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'turismo': $dash.='
                                <li id="li_turismo" class="nav-item">
                                    <a href="#" id="menu_turismo" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Turismo
                                        </p>
                                    </a>
                                </li>  
                                '; break;

                                case 'ordenanzas': $dash.='
                                <li id="li_ordenanzas" class="nav-item">
                                    <a href="#" id="menu_ordenanzas" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Ordenanzas
                                        </p>
                                    </a>
                                </li>  
                                '; break;

                                case 'semanario': $dash.='
                                <li id="li_semanario" class="nav-item">
                                    <a href="#" id="menu_semanario" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Semanario
                                        </p>
                                    </a>
                                </li>  
                                '; break;

                                case 'libros': $dash.='
                                <li id="li_libros" class="nav-item">
                                    <a href="#" id="menu_libros" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Libro y Revistas
                                        </p>
                                    </a>
                                </li>  
                                '; break;  

                                case 'eventos': $dash.='
                                <li id="li_eventos" class="nav-item">
                                    <a href="#" id="menu_eventos" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Eventos
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'entes': $dash.='
                                <li id="li_entes" class="nav-item">
                                    <a href="#" id="menu_entes" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Entes Descentralizados
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'efemerides': $dash.='
                                <li id="li_efemerides" class="nav-item">
                                    <a href="#" id="menu_efemerides" onclick="linked($(this))">
                                        <i class="fas fa-genderless"></i>
                                        <p>
                                            Efemérides
                                        </p>
                                    </a>
                                </li>
                                '; break;

                                case 'categorias': $dash.='

                                <li id="li_categorias" class="nav-item">
                                    <a data-toggle="collapse" href="#categoria">
                                        <i class="fas fa-cogs"></i>
                                        <p>Categorías</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="categoria">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#"id="menu_categoria_noticias" onclick="linked($(this))">
                                                    <span class="sub-item">Noticias</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"id="menu_categoria_eventos" onclick="linked($(this))">
                                                    <span class="sub-item">Eventos</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"id="menu_categoria_conociendo_carirubana" onclick="linked($(this))">
                                                    <span class="sub-item">Turismo</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                '; break;
                                    
                                                        
                                case 'configuracion': $dash.='

                                <li id="li_configuracion" class="nav-item">
                                    <a data-toggle="collapse" href="#configuracion">
                                        <i class="fas fa-wrench"></i>
                                        <p>Configuración</p>
                                        <span class="caret"></span>
                                    </a>
                                    <div class="collapse" id="configuracion">
                                        <ul class="nav nav-collapse">
                                            <li>
                                                <a href="#"id="menu_usuarios" onclick="linked($(this))">
                                                    <span class="sub-item">Usuarios</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#"id="menu_roles" onclick="linked($(this))">
                                                    <span class="sub-item">Roles</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                '; break;

                                    

                default: $dash.="";
            }//fin switch
        
      }//fin while
      return $dash;
    }//fin function
 function getVerificar($conexion,$url){
    session_start();
    $user=$_SESSION['usuario'];
    $pass=$_SESSION["password"];
    if(empty($_SESSION['usuario']) || empty($_SESSION['password'])){
            ?>
            <script>
            document.location.href="index.php";
            </script>
            <?php
        return false;
    }
    $sql="SELECT group_concat(permisologia.descripcion SEPARATOR ',') FROM usuario inner join roles on roles.id=usuario.id_rol inner join permisos on permisos.id_rol=roles.id inner join permisologia on permisologia.id=permisos.id_permisologia WHERE nombre='$user' and clave='$pass' and roles.status='1' GROUP BY usuario.id";
    $query=mysqli_query($conexion,$sql);
    while($fila=mysqli_fetch_array($query)){
        $page=explode(',',$fila[0]);
        if(in_array($url,$page) || $url=="perfil" || $url=="editar_pass"){
           return true;
        }else{
            ?>
            <script>
            document.location.href="index.php";
            </script>
            <?php
            return false;
        }
        
    }
    }//fin function
    function getVerificar2($conexion){
        session_start();
        $user="";
            $pass="";
        if(empty($_SESSION['usuario']) || empty($_SESSION['password'])){
                ?>
                <script>
                document.location.href="login.php";
                </script>
                <?php
            return;
        }else{
            $user=$_SESSION['usuario'];
            $pass=$_SESSION["password"];
        }
        $e=0;
        $sql="SELECT * FROM usuario inner join roles on roles.id=usuario.id_rol  WHERE nombre='$user' and clave='$pass' and usuario.status='1' GROUP BY usuario.id";
        $query=mysqli_query($conexion,$sql);
        while($fila=mysqli_fetch_array($query)){
            $e=1;
                ?>
                <script>
                document.location.href="menu.php";
                </script>
                <?php
                return;
            
        }
        if($e==0){
            ?>
            <script>
            document.location.href="login.php";
            </script>
            <?php
        return;
        }
        }//fin function

        function getVerificarApi($conexion,$url){
        session_start();
        @$user=$_SESSION['usuario'];
        @$pass=$_SESSION["password"];
        if(empty($_SESSION['usuario']) || empty($_SESSION['password'])){
            return false;
        }
        $sql="SELECT group_concat(permisologia.descripcion SEPARATOR ',') FROM usuario inner join roles on roles.id=usuario.id_rol inner join permisos on permisos.id_rol=roles.id inner join permisologia on permisologia.id=permisos.id_permisologia WHERE nombre='$user' and clave='$pass' and roles.status='1' GROUP BY usuario.id";
        $query=mysqli_query($conexion,$sql);
        while($fila=mysqli_fetch_array($query)){
            $page=explode(',',$fila[0]);
            if(in_array($url,$page) || $url=="perfil" || $url=="editar_pass"){
               return true;
            }else{
                return false;
            }
            
        }
        }//fin function

?>