<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>


<h4 class="page-title">Eventos</h4>

<!-- BEGIN .main-content -->
<div class="main-content" id="tabla_vista">

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header mb-5">
                    <div class="card-head-row">
                        <div class="card-title">
                            <button 
                                id="recargar"
                                type="button" 
                                class="btn btn-icon btn-round btn-sm btn-warning"
                                data-toggle="tooltip"
                                data-placement="top" 
                                title="Recargar"
                                >
                                    <i class="fas fa-redo-alt"></i>
                            </button>
                        </div>
                        <div class="card-tools">
                            <button 
                                id="btnnuevo-paquete"
                                type="button" 
                                class="btn btn-icon btn-round btn-sm btn-primary"
                                data-toggle="tooltip"
                                data-placement="top" 
                                title="Nuevo"
                                >
                                    <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
               
                <div class="card-body">

                    <div class="table-responsive">


                        <!-- ********************************************** -->


                        <table id="tb-eventos" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 10%">Título</th>
                                    <th style="width: 10%">Categoría</th>
                                    <th style="width: 10%">Fecha</th>
                                    <th style="width: 10%">Organizador</th>
                                    <th style="width: 5%">Estatus</th>
                                    <th style="width: 30%">Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%">ID</th>
                                    <th style="width: 10%">Título</th>
                                    <th style="width: 10%">Categoría</th>
                                    <th style="width: 10%">Fecha</th>
                                    <th style="width: 10%">Organizador</th>
                                    <th style="width: 5%">Estatus</th>
                                    <th style="width: 30%">Opciones</th>
                                </tr>
                            </tfoot>

                            <tbody>

                            </tbody>
                        </table>
                        <!-- ********************************************** -->

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<div id="mensaje2"></div>


<!-- END: .main-content -->
<div class="main-content" id="nuevo_eventos" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">

                            <button 
                                id="div-atras" 
                                type="button" 
                                class="btn btn-icon btn-round btn-sm btn-primary"
                                data-toggle="tooltip"
                                data-placement="left" 
                                title="Regresar"
                                >
                                    <i class="fas fa-arrow-left"></i>
                            </button>

                        </div>
                        <div class="card-tools">

                            <!-- <i class="fas fa-pen"></i> Editar Sesión Alcalde -->

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formEvetos" name="formEvetos">
                        <input type="hidden" name="idtxt" id="idtxt">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Título</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txttitulo" id="idtxttitulo"
                                                placeholder="Ingrese su título" style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idtxtcategoria">Categoría</label>
                                        <select class="form-control" name="txtcategoria" id="idtxtcategoria">
                                
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Ubicación</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtubicacion"
                                                id="idtxtubicacion" placeholder="Ingrese su ubicación"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Teléfono Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtorganizadortelefono"
                                                id="idtxtorganizadortelefono" placeholder="Ingrese su teléfono"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return soloNumeros(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Correo Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="email" class="form-control" name="txtorganizadorcorreo"
                                                id="idtxtorganizadorcorreo" placeholder="Ingrese su correo"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return soloCorreos(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Nombre
                                            Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtorganizadornombre"
                                                id="idtxtorganizadornombre" placeholder="Ingrese su nombre"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fp-default"
                                            style="position: relative;top: 2px;">Fecha</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" id="fp-default" name="fp-default"
                                                class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fp-time"
                                            style="position: relative;top: 2px;">Hora</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" id="fp-time" name="fp-time"
                                                class="form-control flatpickr text-start"
                                                style="position: relative;padding-top:8px; padding-bottom:8px;"
                                                placeholder="HH:MM" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Imagen referencial recomendada <b class="text-danger">"730px X 500px"</b>
                                        </label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="txtimagen" id="idtxtimagen"
                                                placeholder="" style="position: relative;top: -2px;"
                                                onchange="foto(this);">
                                            <input type="hidden" id="hidtxtimagen">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <textarea id="idtxtdescripcion" name="txtdescripcion" cols="50" rows="15"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Latitud</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtlatitud" id="idtxtlatitud"
                                                placeholder="Latitud" style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Longitud</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtlongitud"
                                                id="idtxtlongitud" placeholder="Longitud"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="mapa" style="width: 100%; height: 400px;">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="msgN" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El título ingresado ya se encuentra registrado!
                                    </div>
                                </div>


                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-sm" type="button" style="border-radius:3px;"
                                id="div-atras3"><i class="icon-times"></i> Cancelar</button>
                            <button id="btnGP" type="submit" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios</button>

                            <button id="loading" type="button" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;display: none;" disabled=""><i class="icon-check"></i>
                                Cargando</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- General section box modal start -->
<!-- END: .main-content -->
<div class="main-content" id="info_usuario" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">

                            <button 
                                id="div-atras2" 
                                type="button" 
                                class="btn btn-icon btn-round btn-sm btn-primary"
                                data-toggle="tooltip"
                                data-placement="left" 
                                title="Regresar"
                                >
                                    <i class="fas fa-arrow-left"></i>
                            </button>

                        </div>
                        <div class="card-tools">

                            <!-- <i class="fas fa-pen"></i> Editar Sesión Alcalde -->

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formEventosEditar" name="formEventosEditar">

                        <div class="modal-body">
                            <!---->
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Título</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txttitulo" id="idtxttituloE"
                                                placeholder="Ingrese su título" style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idtxtcategoriaE">Categoría</label>
                                        <select class="form-control" name="txtcategoria" id="idtxtcategoriaE">
                                
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Ubicación</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtubicacion"
                                                id="idtxtubicacionE" placeholder="Ingrese su ubicación"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Teléfono
                                            Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtorganizadortelefono"
                                                id="idtxtorganizadortelefonoE" placeholder="Ingrese su teléfono"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return soloNumeros(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Correo
                                            Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtorganizadorcorreo"
                                                id="idtxtorganizadorcorreoE" placeholder="Ingrese su correo"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return soloCorreos(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Nombre
                                            Organizador</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtorganizadornombre"
                                                id="idtxtorganizadornombreE" placeholder="Ingrese su nombre"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fp-default"
                                            style="position: relative;top: 2px;">Fecha</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" id="fp-defaultE" name="fp-default" class="form-control 
                                            flatpickr-basic" placeholder="YYYY-MM-DD" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="fp-time"
                                            style="position: relative;top: 2px;">Hora</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" id="fp-timeE" name="fp-time"
                                                class="form-control flatpickr text-start"
                                                style="position: relative;padding-top:8px; padding-bottom:8px;"
                                                placeholder="HH:MM" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Imagen referencial recomendada <b class="text-danger">"730px X 500px"</b>
                                        </label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="txtimagen" id="idtxtimagenE"
                                                placeholder="" style="position: relative;top: -2px;"
                                                onchange="foto(this);">
                                            <input type="hidden" id="hidtxtimagenE">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="margin-top: 15px;margin-bottom: 10px;">
                                    <a id="enlace_img" href="" target="_blank">
                                        <img id="preview_img" src="" alt=""
                                            style="width: 50%;height: auto;border-radius: 5px;">
                                    </a>
                                </div>
                            

                                <div class="col-md-12">
                                    <textarea id="idtxtdescripcionE" name="txtdescripcion" cols="50" rows="15"></textarea>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Latitud</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtlatitud" id="idtxtlatitudE"
                                                placeholder="Latitud" style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Longitud</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtlongitud"
                                                id="idtxtlongitudE" placeholder="Longitud"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="mapaE" style="width: 100%; height: 400px;">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="msgE" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El paquete ingresado ya se encuentra registrado!
                                    </div>
                                </div>

                            </div>
                            <!---->

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-secondary btn-sm" type="button"
                                style="border-radius:3px;" id="div-atras4"><i class="icon-arrow-left-thick"></i>
                                Regresar</button>
                            <button id="btnEP" type="submit" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios</button>

                            <button id="loadingE" type="button" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;display: none;" disabled=""><i class="icon-check"></i>
                                Cargando</button>
                        </div>
                    </form>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- General section box modal start -->

<!-- END: .main-content -->

<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>


<script src="../assets-plugin/js/pickers/form-pickers.js"></script>

<script src="../js/tables-min.js"></script>
<script src="../js/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYk5-6FtACHCU2nDJ9tUG7lmCAbN8p-14&callback=iniciarMapa">
</script>
<!-- AIzaSyDYk5-6FtACHCU2nDJ9tUG7lmCAbN8p-14 -->


<script type="text/javascript">

tinymce.init({
    selector:'textarea',
    plugins: [
      'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
      'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
      'media', 'table', 'emoticons', 'template', 'help'
    ],
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncentre alignright alignjustify | indent outdent | bullist numlist',
    lists_indent_on_tab: false
});

$('.flatpickr').flatpickr({
    noCalendar: true,
    enableTime: true,
    dateFormat: 'h:i K'
});

function iniciarMapa() {
    insertMapa();
    editMapa();
}

////////////////////////////////// GOOGLE MAPS INSERT ////////////////////////////////////
function insertMapa() {
    var latitud = 11.711523304560872;
    var longitud = -70.11655840039063;

    cordenadas = {
        lng: longitud,
        lat: latitud
    }

    generarMapa(cordenadas)
}

function generarMapa(cordenadas) {
    var mapa = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 12,
        center: new google.maps.LatLng(cordenadas.lat, cordenadas.lng)
    });

    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: new google.maps.LatLng(cordenadas.lat, cordenadas.lng)
    });


    marcador.addListener('dragend', function(evento) {
        document.getElementById("idtxtlatitud").value = this.getPosition().lat();
        // console.log(this.getPosition().lat());
        document.getElementById("idtxtlongitud").value = this.getPosition().lng();
    })

}
////////////////////////////////// GOOGLE MAPS INSERT ////////////////////////////////////    

////////////////////////////////// GOOGLE MAPS EDITAR ////////////////////////////////////
function editMapa() {
    var latitud = 11.711523304560872;
    var longitud = -70.11655840039063;

    cordenadas = {
        lng: longitud,
        lat: latitud
    }

    generarMapaEdit(cordenadas)
}

function generarMapaEdit(cordenadas) {
    var mapa = new google.maps.Map(document.getElementById('mapaE'), {
        zoom: 12,
        center: new google.maps.LatLng(cordenadas.lat, cordenadas.lng)
    });

    marcador = new google.maps.Marker({
        map: mapa,
        draggable: true,
        position: new google.maps.LatLng(cordenadas.lat, cordenadas.lng)
    });


    marcador.addListener('dragend', function(evento) {
        document.getElementById("idtxtlatitudE").value = this.getPosition().lat();
        // console.log(this.getPosition().lat());
        document.getElementById("idtxtlongitudE").value = this.getPosition().lng();
    })

}

////////////////////////////////// GOOGLE MAPS EDITAR ////////////////////////////////////

ListarSelects('idtxtcategoria', '', 'select_categoria_eventos.php');
ListarSelects('idtxtcategoriaE', '', 'select_categoria_eventos.php');

$("#btnnuevo-paquete").click(function() {
    $("#tabla_vista").css('display', 'none');
    $("#nuevo_eventos").css('display', 'block');


});
$("#div-atras").click(function() {
    $("#nuevo_eventos").css('display', 'none');
    $("#tabla_vista").css('display', 'block');

});
$("#div-atras2").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
    //act_regs('info_usuario','tabla_vista','formusuario');
    //$("#editar-rol").data('conteo',0);
});
$("#div-atras3").click(function() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, cancelar!";

    swal({
            title: msj_sup,
            text: msj_inf,
            icon: "warning",
            buttons: {
                cancel: "Cerrar",
                danger: btnmsj

            },
        })
        .then((willDelete) => {
            if (willDelete) {
                $("#nuevo_eventos").css('display', 'none');
                $("#tabla_vista").css('display', 'block');
            }
        })
});
$("#div-atras4").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
});


$("#recargar").click(function() {
    listarEventos('tb-eventos');
    $.notify({
        icon: 'la flaticon-success',
        title: 'Recargado con éxito!',
        message: 'Su tabla ha sido recargada satisfactoriamente',
      },{
        type: 'info',
        placement: {
          from: "bottom",
          align: "right"
        },
        time: 1000,
    });
    setTimeout(() => {
        $('[data-toggle="tooltip"]').tooltip();
    }, 1000);
});
setTimeout(() => {
    $('[data-toggle="tooltip"]').tooltip();
}, 1000);
</script>