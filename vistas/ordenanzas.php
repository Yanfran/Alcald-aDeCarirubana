<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>

<h4 class="page-title">Ordenanzas</h4>

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


                        <table id="tb-multimedia" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 30%">Título</th>
                                    <th style="width: 20%">Estatus</th>
                                    <th style="width: 20%">Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 30%">Título</th>
                                    <th style="width: 20%">Estatus</th>
                                    <th style="width: 20%">Opciones</th>
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
<div class="main-content" id="nuevo_multimedia" style="display: none">
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
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Documento <b class="text-danger">(PDF)</b>
                                        </label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="documento" id="idtxtdocumento"
                                                placeholder="" style="position: relative;top: -2px;">
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
                                Cargando
                            </button>

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
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Documento <b class="text-danger">(PDF)</b>
                                        </label>
                                        <div class="" style="height: 55px;">
                                            <input type="file" class="form-control" name="documento"
                                                id="idtxtdocumentoE" placeholder=""
                                                style="position: relative;top: -2px;">
                                            <!-- <input type="hidden" id="hidtxtpdfE"> -->
                                        </div>
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

<script src="../js/tables-min.js"></script>

<script type="text/javascript">
$("#idtxtdocumento").on("change", (e) => {
    const archivo = $(e.target)[0].files[0];
    let nombArchivo = archivo.name;
    var extension = nombArchivo.split(".").slice(-1);
    extension = extension[0];
    let extensiones = ["pdf"];

    if (extensiones.indexOf(extension) === -1) {
        alert("Extensión NO permitida");
    }
});

$("#idtxtdocumentoE").on("change", (e) => {
    const archivo = $(e.target)[0].files[0];
    let nombArchivo = archivo.name;
    var extension = nombArchivo.split(".").slice(-1);
    extension = extension[0];
    let extensiones = ["pdf"];

    if (extensiones.indexOf(extension) === -1) {
        alert("Extensión NO permitida");
    }
});


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
            }
        })
});
$("#div-atras4").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
});


$("#recargar").click(function() {
    listarOrdenanzas('tb-multimedia');
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