<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>

<h4 class="page-title">El Alcalde</h4>


<!-- BEGIN .main-content -->
<div class="main-content" id="tabla_vista">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header mb-5">
                    <div class="card-head-row">
                        <div class="card-title">
                        </div>
                        <div class="card-tools">
                            <button 
                                type="button" 
                                class="btn btn-icon btn-round btn-sm btn-primary info"
                                data-toggle="tooltip"
                                data-placement="top" 
                                title="Editar"
                                >
                                    <i class="far fa-edit"></i>
                            </button>
                        </div>
                    </div>
                </div>
                        
                    
                    <div class="card-body" style="margin-top: -30px!important; paddig-top: -30px!important;">                                                                        
                        <form id="dataInput" class="validate-form mt-2 pt-50">
                            <div class="row"> 
                                <div class="col-6 col-sm-6">
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="categoria">Categoría</label>
                                        <input disabled type="text" class="form-control" id="categoriaR" name="categoria" />
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="titulo">Título </label>
                                        <input disabled type="text" class="form-control" id="titulo" name="titulo"  data-msg="Please enter first name" />
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="subtitulo">SubTítulo</label>
                                        <input disabled type="text" class="form-control" id="subtitulo" name="subtitulo" data-msg="Please enter last name" />
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="descripcion">Descripción</label>
                                        <textarea disabled class="form-control" aria-label="With textarea" id="descripcion" 
                                                name="descripcion" style="height: 160px;">
                                        </textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="etiqueta1">Etiqueta 1</label>
                                        <input disabled type="text" class="form-control account-number-mask" id="etiqueta1" name="etiqueta1" />
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="etiqueta2">Etiqueta 2</label>
                                        <input disabled type="text" class="form-control" id="etiqueta2" name="etiqueta2" />
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6">
                                    <div class="col-12 col-sm-12 mb-1">
                                        <label class="form-label" for="descripcion_ruta">Descripción Imagen</label>
                                        <textarea readonly class="form-control" aria-label="With textarea" id="descripcion_ruta" name="descripcion_ruta" style="height: 113px;">
                                        </textarea>
                                    </div>
                                    <div class="col-12 col-sm-12 mb-1" style="margin-top: 3px;margin-bottom: 10px;">
                                        <a id="enlace_img" href="" target="_blank">
                                            <img id="preview_img" src="" alt="" style="width: 100%;height: auto;border-radius: 5px;">
                                        </a>
                                    </div>
                                </div>  
                            </div>
                        </form>
                                                               
                    </div>


            </div>  
        </div>        
    </div>

</div>
<div id="mensaje2"></div>


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
                    <form id="formSesionCarirubanaEditar" name="formSesionCarirubanaEditar">

                        <div class="modal-body">
                                                    
                            <div class="row">
                                <div class="col-6 col-sm-6">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label"
                                                style="position: relative;top: 2px;">Categoría</label>
                                            <div class="" style="height: 55px;">
                                                <input type="text" class="form-control" name="txtcategoria"
                                                    id="idtxtcategoriaE" placeholder="Ingrese una categoría"
                                                    style="position: relative;top: -2px;"
                                                    onkeyPress="return alfaNumerica(event)">
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" style="position: relative;top: 2px;">Título</label>
                                            <div class="" style="height: 55px;">
                                                <input type="hidden" id="txtidE" name="txtid">
                                                <input type="text" class="form-control" name="txttitulo" id="idtxttituloE"
                                                    placeholder="Ingrese su título" style="position: relative;top: -2px;"
                                                    onkeyPress="return alfaNumerica(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" style="position: relative;top: 2px;">SubTítulo</label>
                                            <div class="" style="height: 55px;">
                                                <input type="text" class="form-control" name="txtsubtitulo" id="idtxtsubtituloE"
                                                    placeholder="Ingrese un subtítulo" style="position: relative;top: -2px;"
                                                    onkeyPress="return alfaNumerica(event)">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" style="position: relative;top: 2px;">     Descripción
                                            </label>
                                            <div style="height: 150px;">
                                                <textarea class="form-control" aria-label="With textarea" id="idtxtdescripcionE" 
                                                name="txtdescripcion" style="">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" style="position: relative;top: 2px;">Etiqueta 1</label>
                                            <div class="" style="height: 55px;">
                                                <input type="text" class="form-control" name="txtetiqueta1" id="idtxtetiqueta1E"
                                                    placeholder="Ingrese una etiqueta" style="position: relative;top: -2px;">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label" style="position: relative;top: 2px;">Etiqueta 2</label>
                                            <div class="" style="height: 55px;">
                                                <input type="text" class="form-control" name="txtetiqueta2" id="idtxtetiqueta2E"
                                                    placeholder="Ingrese un etiqueta" style="position: relative;top: -2px;">
                                            </div>
                                        </div>
                                    </div>
                                                                                                                                

                                </div>

                                <div class="col-6 col-sm-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" style="position: relative;top: 2px;">Descripción Imagen</label>
                                                <div class="" style="height: 150px;">
                                                <textarea class="form-control" aria-label="With textarea" id="idtxtdescripcionimgE" 
                                                name="txtdescripcionimg" style="">
                                                </textarea>                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" style="position: relative; margin-top: 70px; margin-bottom: 10px;">
                                                    Agregar imagen recomendada <b class="text-danger">"510px X 605px"</b>
                                                </label>
                                                <div class="" style="height: 55px;">
                                                    <input type="file" class="form-control" name="txtimagen" id="idtxtimagenE"
                                                        placeholder="" style="position: relative;top: -2px;"
                                                        onchange="foto(this);">
                                                    <input type="hidden" id="hidtxtimagenE">
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="col-md-12" style="margin-top: 3px;margin-bottom: 10px;">
                                            <a id="enlace_imgE" href="" target="_blank">
                                                <input type="hidden" id="idAntiguo">
                                                <img id="preview_imgE" src="" alt="" style="width: 100%;height: auto;border-radius: 5px;">
                                            </a>
                                        </div>

                                        <div class="col-md-12">
                                            <div id="msgE" class="alert alert-danger"
                                                style="display: none;position: relative;top: 10px;">
                                                <i class="icon-warning2"></i>El paquete ingresado ya se encuentra registrado!
                                            </div>
                                        </div>
                                </div>
                            </div>                        
                        
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

<script src="../js/sesiones.js"></script>
<!-- <script src="../js/tables-min.js"></script> -->
<script src="../js/funct-min.js"></script>

<script type="text/javascript">

listarSesionCarirubana2();


$("#btnnuevo-paquete").click(function() {
    $("#tabla_vista").css('display', 'none');
    $("#nueva_sesion").css('display', 'block');


});
$("#div-atras").click(function() {
    $("#nueva_sesion").css('display', 'none');
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
                $("#nueva_sesion").css('display', 'none');
                $("#tabla_vista").css('display', 'block');
            }
        })
});

$("#div-atras4").click(function() {
    $("#info_usuario").css('display', 'none');
    $("#tabla_vista").css('display', 'block');
    //act_regs('info_usuario','tabla_vista','formusuario');
    //$("#editar-rol").data('conteo',0);
});


$("#recargar").click(function() {
    // listarSesionCarirubana('tb-sesion-carirubana');
    // $("#dataInput")[0].reset();
    // listarSesionCarirubana2();
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