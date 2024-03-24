<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>


<!-- BEGIN .main-heading -->
<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-start mb-0">Modulo</h2>
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Inicio</a>
                        </li>
                        <li class="breadcrumb-item active">Multimedia
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
        <div class="mb-1 breadcrumb-right">
            <div class="dropdown">
                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                        data-feather="grid"></i></button>
                <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"><i class="me-1"
                            data-feather="check-square"></i><span class="align-middle">Todo</span></a><a
                        class="dropdown-item" href="#"><i class="me-1" data-feather="message-square"></i><span
                            class="align-middle">Chat</span></a><a class="dropdown-item" href="#"><i class="me-1"
                            data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item"
                        href="#"><i class="me-1" data-feather="calendar"></i><span
                            class="align-middle">Calendar</span></a></div>
            </div>
        </div>
    </div> -->
</div>
<!-- END: .main-heading -->

<!-- BEGIN .main-content -->
<div class="main-content" id="tabla_vista">

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span style="cursor: pointer;" id="recargar">
                        <i class='icon-loop2' style='float: right;margin-left: 7px;' data-toggle="tooltip"
                            data-placement="top" title="Recargar"></i>
                    </span>
                    <span style="cursor: pointer;" id="btnnuevo-paquete">
                        <i class='icon-plus' style='float: right;' data-toggle="tooltip" data-placement="left"
                            title="Nuevo"></i>
                    </span>
                </div>
                <div class="card-body">

                    <div class="table-responsive">


                        <!-- ********************************************** -->


                        <table id="tb-multimedia" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">Id</th>
                                    <th style="width: 5%">Título</th>
                                    <th style="width: 20%">Descripción</th>
                                    <th style="width: 10%">Imagen</th>
                                    <th style="width: 20%">Fecha</th>
                                    <th style="width: 5%">Estatus</th>
                                    <th style="width: 30%">Opciones</th>
                                </tr>
                            </thead>

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
<div class="main-content" id="nuevo_multimedia" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title"><i class="icon-puzzle"></i> Multimedias</h4>
                    <div class="d-flex align-items-center">
                        <!-- <p class="card-text me-25 mb-0">Updated 1 month ago</p> -->
                        <span style="cursor: pointer;" id="div-atras">
                            <i class='icon-arrow-left-thick' style='float: right;' data-toggle="tooltip"
                                data-placement="left" title="Regresar">
                            </i>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formMultimedia" name="formMultimedia">
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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"
                                            style="position: relative;top: 2px;">Descripción</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtdescripcion"
                                                id="idtxtdescripcion" placeholder="Ingrese su descripción"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Imagen
                                            referencial</label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="txtimagen" id="idtxtimagen"
                                                placeholder="" style="position: relative;top: -2px;"
                                                onchange="foto(this);">
                                            <input type="hidden" id="hidtxtimagen">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="msgN" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El paquete ingresado ya se encuentra registrado!
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
                    <h4 class="card-title"><i class="icon-edit"></i> Editar Noticia</h4>
                    <div class="d-flex align-items-center">
                        <!-- <p class="card-text me-25 mb-0">Updated 1 month ago</p> -->
                        <span style="cursor: pointer;" id="div-atras2">
                            <i class='icon-arrow-left-thick' style='float: right;' data-toggle="tooltip"
                                data-placement="left" title="Regresar">
                            </i>
                        </span>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formMultimediaEditar" name="formMultimediaEditar">

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

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"
                                            style="position: relative;top: 2px;">Descripción</label>
                                        <div class="" style="height: 55px;">
                                            <input type="text" class="form-control" name="txtdescripcion"
                                                id="idtxtdescripcionE" placeholder="Ingrese su descripción"
                                                style="position: relative;top: -2px;"
                                                onkeyPress="return alfaNumerica(event)">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Imagen
                                            referencial</label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="txtimagen" id="idtxtimagenE"
                                                placeholder="" style="position: relative;top: -2px;"
                                                onchange="foto(this);">
                                            <!--onchange="foto(this);"-->
                                            <input type="hidden" id="hidtxtimagenE">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3" style="margin-top: 3px;margin-bottom: 10px;">
                                    <a id="enlace_img" href="" target="_blank">
                                        <img id="preview_img" src="" alt=""
                                            style="width: 100%;height: auto;border-radius: 5px;">
                                    </a>
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
<!--<script src="../js/bootstrap.min.js"></script>
         Common JS
        <script src="../js/common.js"></script> -->
<!-- Data Tables -->
<!-- <script src="../vendor/datatables/dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap.min.js"></script> -->
<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>
<script src="../js/sweetalert.min.js" type="text/javascript"></script>


<!-- BEGIN: Page JS-->
<script src="../app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../app-assets/js/scripts/extensions/ext-component-toastr.js"></script>
<!-- END: Page JS-->


<!-- Custom Data tables -->
<!-- <script src="../vendor/datatables/custom/custom-datatables.js"></script>
        <script src="../vendor/datatables/custom/fixedHeader.js"></script> -->

<script src="../js/tables-min.js"></script>
<script src="../vendor/notify/notify.js"></script>

<script type="text/javascript">
$(window).on('load', function() {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
})

// const buildLoadingSvg = (height, width, stroke, radius) => `
//   <svg id="loading-circle" width="${width}" height="${height}">
//     <defs>
//       <style>
//         .loading-circle {
//           stroke: #fff;
//           fill: none;
//         }
//       </style>
//     </defs>
//     <circle class="loading-circle" cx="${width / 2}" cy="${height / 2}"  stroke-linecap="round" r="${radius || width / 3}" stroke-width="${stroke || 2}" stroke="#fff" stroke-dasharray="${width}" transform="rotate(180 ${width / 2} ${height / 2})">
//       <animateTransform attributeName="transform" type="rotate" calcMode="linear" values="0 ${width / 2} ${height / 2};360 ${width / 2} ${height / 2}" keyTimes="0;1" dur="1s" begin="0s" repeatCount="indefinite"></animateTransform>
//     </circle>
//   </svg>
// `;


// document.getElementById('loading').innerHTML =buildLoadingSvg(14,14)+" Cargando";
// document.getElementById('loadingE').innerHTML =buildLoadingSvg(14,14)+" Cargando";

$("#btnnuevo-paquete").click(function() {
    $("#tabla_vista").css('display', 'none');
    $("#nuevo_multimedia").css('display', 'block');


});
$("#div-atras").click(function() {
    $("#nuevo_multimedia").css('display', 'none');
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
                $("#nuevo_multimedia").css('display', 'none');
                $("#tabla_vista").css('display', 'block');
                //act_regs('nuevo_usuario','tabla_vista','formusuario');
            }
        })
    //$("#formrol").data('conteo',0);
});
/* $("#div-atras4").click(function(){
    var msj_sup="¿Está seguro?";
  var msj_inf="";
    btnmsj="Si, cancelar!";

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
        act_regs('editar_usuario','tabla_vista','formusuario');
        }
    })
    //$("#editar-rol").data('conteo',0);
});*/
$("#div-atras4").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
    //act_regs('info_usuario','tabla_vista','formusuario');
    //$("#editar-rol").data('conteo',0);
});


$("#recargar").click(function() {
    listarMultimedia('tb-multimedia');
    // mensaje("Su tabla ha sido recargada satisfactoriamente", "Recargado con éxito", "success",
    //     "<i class='icon-tick-outline'></i>");
    toastr['info']('Su tabla ha sido recargada satisfactoriamente', 'Recargado con éxito!', {
        closeButton: true,
        tapToDismiss: false,
        progressBar: true
    });
    setTimeout(() => {
        $('[data-toggle="tooltip"]').tooltip();
    }, 1000);
});
setTimeout(() => {
    $('[data-toggle="tooltip"]').tooltip();
}, 1000);
</script>