<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>

<h4 class="page-title">Noticias</h4>


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


                        <table id="tb-noticias-principales" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">Id</th>
                                    <th style="width: 5%">Título</th>
                                    <th style="width: 5%">Categoría</th>
                                    <th style="width: 20%">Fecha</th>
                                    <th style="width: 5%">Estatus</th>
                                    <th style="width: 30%">Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 5%;">Id</th>
                                    <th style="width: 5%">Título</th>
                                    <th style="width: 5%">Categoría</th>
                                    <th style="width: 20%">Fecha</th>
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
<div class="main-content" id="nuevas_noticias" style="display: none">
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
                    <form id="formNoticiasPrincipales" name="formNoticiasPrincipales">
                        <input type="hidden" name="idtxt" id="idtxt">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
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
                                        <label class="form-label"
                                            style="position: relative;top: 2px;">Periodista</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtperiodista"
                                                id="idtxtperiodista" placeholder="Ingrese nombre del periodista"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Fotógrafo</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtfotografo"
                                                id="idtxtfotografo" placeholder="Ingrese nombre del fotografo"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Imagen referencial recomendada <b class="text-danger">"1000px X 670px"</b>
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
                    <form id="formNoticiasPrincipalesEditar" name="formNoticiasPrincipalesEditar">

                        <div class="modal-body">
                            <!---->
                            <div class="row">

                                <div class="col-md-6">
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
                                        <label class="form-label"
                                            style="position: relative;top: 2px;">Periodista</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtperiodista"
                                                id="idtxtperiodistaE" placeholder="Ingrese nombre del periodista"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Fotógrafo</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtfotografo"
                                                id="idtxtfotografoE" placeholder="Ingrese nombre del fotografo"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Imagen referencial recomendada <b class="text-danger">"1000px X 670px"</b>
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

                                <div class="col-md-12">
                                    <div id="msgE" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El título ingresado ya se encuentra registrado!
                                    </div>
                                </div>

                            </div>
                            <!---->

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-secondary btn-sm" type="button"
                                style="border-radius:3px;" id="div-atras4"><i class="icon-arrow-left-thick"></i>
                                Regresar</button>
                            <button id="btnEP" type="submit" class="btn btn-primary btn-sm"
                                style="border-radius:3px;"><i class="icon-check"></i>
                                Guardar cambios
                            </button>

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

<!-- DOCUMENTOS -->
<div class="main-content" id="info_documento" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">

                            <button 
                                id="div-atras-documento" 
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
                    <section id="dropzone-examples">
                        <!-- remove thumbnail file upload starts -->
                        <div class="row">
                            <div class="col-12">

                                <p class="card-text">
                                    Agregar múltiples imáganes recomendada <b class="text-danger">"1000px X
                                        670px"</b>
                                </p>
                                <form action="#" class="dropzone dropzone-area" id="dpz-remove-thumb">
                                    <div class="dz-message">Suelte los archivos aquí o haga clic para cargar.</div>
                                    <input type="hidden" id="textiddocumento" name="iddocumento">

                                    <div class="modal-footer"
                                        style="margin-top: 80px;border:none!important;float: right;">
                                        <button id="send" class="btn btn-primary btn-sm send" type="button"
                                            style="border-radius:3px;">
                                            <i class="icon-check"></i>
                                            Guardar cambios
                                        </button>

                                        <button id="loadingE" type="button" class="btn btn-primary btn-sm"
                                            type="button" style="border-radius:3px;display: none;" disabled="">
                                            <i class="icon-check"></i>
                                            Cargando
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- remove thumbnail file upload ends -->
                    </section>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- DOCUMENTOS -->

<!-- DOCUMENTOS EDITAR-->
<div class="main-content" id="info_documento_editar" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">

                            <button 
                                id="div-atras-documento-editar" 
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
                    <form id="formSesionNoticiasImagenesE" name="formSesionNoticiasImagenesE">

                        <div class="modal-body">
                            <!---->
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Agregar imagen recomendada <b class="text-danger">"1000px X 670px"</b>
                                        </label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="txtimagen" id="idtxtimagenID"
                                                placeholder="" style="position: relative;top: -2px;"
                                                onchange="foto(this);">
                                            <input type="hidden" id="hidtxtimagenID">
                                        </div>
                                    </div>
                                </div>


                                <input type="hidden" id="textiddocumentoI" name="iddocumento">
                                <input type="hidden" id="idtxtdocumentoI" name="documentoA">

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
                                style="border-radius:3px;" id="div-atras-documento-cancelar"><i
                                    class="icon-arrow-left-thick"></i>
                                Cancelar
                            </button>
                            <button id="btnEP" type="submit" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios
                            </button>

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
<!-- DOCUMENTOS EDITAR -->

<!-- DOCUMENTOS TABLA-->
<div class="main-content" id="info_documento_table" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">


                <div class="card-body">
                    <div class="col-md-12">
                        <!-- <p id="hola"></p> -->
                        <div class="table-responsive">
                            <!-- ********************************************** -->
                            <table id="tb-noticias_img" class="table table-hover table-condensed" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Id</th>
                                        <th style="width: 20%">Título</th>
                                        <th style="width: 5%">Estatus</th>
                                        <th style="width: 23%">Opciones</th>
                                    </tr>
                                </thead>

                                <tbody id="documentos">

                                </tbody>
                            </table>
                            <!-- ********************************************** -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- 
            <div class="row" style="padding-bottom: 60px!important;">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <button data-dismiss="modal" class="btn btn-secondary btn-sm" type="button"
                        style="border-radius:3px; position: absolute; margin-top: 0px;" id="div-atras-documento-1"><i
                            class="icon-arrow-left-thick"></i>
                        Regresar
                    </button>
                </div>
            </div> -->

        </div>
    </div>
</div>
<!-- DOCUMENTOS TABLA -->


<!-- END: .main-content -->

<script src="../assets/js/plugin/file-uploaders/dropzone.min.js"></script>
<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>


<script src="../js/tables-min.js"></script>
<script src="../js/tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>
<!-- <script src="../assets-plugin/js/scripts.js"></script>
<script src="../assets-plugin/js/scripts-edit.js"></script> -->



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

Dropzone.autoDiscover = false;
$(document).ready(function() {
    var noticias = [];  

    let myDropzoneNoticias = new Dropzone('.dropzone', {
        url: '/Admin/',
        maxFilesize: 1,
        maxFiles: 5,
        acceptedFiles: 'image/jpeg, image/png, image/jpg',
        addRemoveLinks: true,
        autoProcessQueue: false,
        dictRemoveFile: 'Quitar'
    })

    myDropzoneNoticias.on('addedfile', file => {
        noticias.push(file);
        // console.log(file);
    })

    myDropzoneNoticias.on('removedfile', file => {
        let i = noticias.indexOf(file);
        noticias.splice(i, 1);
        // console.log(i);
        // console.log(file);
    })

    document.getElementById('send').addEventListener('click', () => {
        console.log(noticias);
        let not = [];
        for (let i = 0; i < noticias.length; i++) {
            let imgData = new FormData();
            imgData.append('file', noticias[i]);
            imgData.append('id', $("#textiddocumento").val());

            fetch('../php/guardar_noticias_principales_img.php', {
                method: 'POST',
                body: imgData
            }).then(res => res.json()).then(data => {
                not.push(data);
                var res = data;
                if (res == 1) {

                    $.notify({
                        icon: 'la flaticon-success',
                        title: 'Agregado',
                        message: 'Sus imagen han sido registrada exitosamente!',
                      },{
                        type: 'info',
                        placement: {
                          from: "bottom",
                          align: "right"
                        },
                        time: 1000,
                    });
                    $("#tb-noticias-principales").DataTable().ajax.reload();
                    $("#info_documento_table").css('display', 'none');
                    $("#info_documento").css('display', 'none');
                    $("#tabla_vista").css('display', 'block');
                    myDropzoneNoticias.removeAllFiles(true);
                } else if (res == 0) {
                    $.notify({
                        icon: 'la flaticon-success',
                        title: 'Agregado',
                        message: 'Ha completado el limite máximo de imágenes!',
                      },{
                        type: 'info',
                        placement: {
                          from: "bottom",
                          align: "right"
                        },
                        time: 1000,
                    });
                } else if (res == 2) {
                    alert("Ha ocurrido un error, intente de nuevo");
                }
            });
        }

        if (!not.includes('fail')) {
            // alert('Guardado');
        } else {
            // alert('Error');
        }
    })
});







ListarSelects('idtxtcategoria', '', 'select_categoria_noticias.php');
ListarSelects('idtxtcategoriaE', '', 'select_categoria_noticias.php');

$("#btnnuevo-paquete").click(function() {
    $("#tabla_vista").css('display', 'none');
    $("#nuevas_noticias").css('display', 'block');
});
$("#div-atras").click(function() {
    $("#nuevas_noticias").css('display', 'none');
    $("#tabla_vista").css('display', 'block');

});
$("#div-atras2").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
});



$("#div-atras-documento").click(function() {
    $("#info_documento").css('display', 'none');
    $("#info_documento_table").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
    $("#tb-noticias_img tbody").empty();
});
// $("#div-atras-documento-1").click(function() {
//     $("#info_documento").css('display', 'none');
//     $("#info_documento_table").css('display', 'none');
//     $("#info_documento_editar").css('display', 'none');
//     $("#formSesionNoticiasImagenesE")[0].reset();
//     $("#tabla_vista").css('display', 'block');
//     $("#tb-noticias_img tbody").empty();
// });
$("#div-atras-documento-editar").click(function() {
    $("#info_documento_editar").css('display', 'none');
    $("#formSesionNoticiasImagenesE")[0].reset();
    $("#info_documento").css('display', 'block');
    $("#info_documento_table").css('display', 'block');
});
$("#div-atras-documento-cancelar").click(function() {
    $("#info_documento_editar").css('display', 'none');
    $("#formSesionNoticiasImagenesE")[0].reset();
    $("#info_documento").css('display', 'block');
    $("#info_documento_table").css('display', 'block');
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
                $("#nuevas_noticias").css('display', 'none');
                $("#tabla_vista").css('display', 'block');

            }
        })
});

$("#div-atras4").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
});


$("#recargar").click(function() {
    listarNoticiasPrincipales('tb-noticias-principales');
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