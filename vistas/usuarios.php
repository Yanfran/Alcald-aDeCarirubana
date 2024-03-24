<?php
include("../conexion/conexion.php");
$conexion=conexion();
$fecha=(date('Y')-18)."-".date('m')."-".date('d');
?>


<h4 class="page-title">Usuario</h4>

<!-- BEGIN .main-content -->
<div class="main-content" id="tabla_vista">

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <span style="cursor: pointer;" id="recargar">
                        <i class='fas fa-redo-alt' style='margin-left: 7px;' data-toggle="tooltip"
                            data-placement="top" title="Recargar"></i>
                    </span>
                    <span style="cursor: pointer;" id="btnnuevo-rol">
                        <i class="fas fa-plus" style='float: right;' data-toggle="tooltip" data-placement="top"
                            title="Nuevo">
                        </i>
                    </span>
                </div>                    
                <div class="card-body">

                    <div class="table-responsive">


                        <!-- ********************************************** -->


                        <table id="tb-usuarios" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 10%">Documento</th>
                                    <th style="width: 18%">Nombre y apellido</th>
                                    <th style="width: 15%">Correo</th>
                                    <th style="width: 10%">Rol</th>
                                    <th style="width: 10%">Estatus</th>
                                    <th style="width: 20%">Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 10%">Documento</th>
                                    <th style="width: 18%">Nombre y apellido</th>
                                    <th style="width: 15%">Correo</th>
                                    <th style="width: 10%">Rol</th>
                                    <th style="width: 10%">Estatus</th>
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
<div class="main-content" id="nuevo_usuario" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title"><i class="fas fa-tasks"></i> Agregar Usuario</div>
                        <div class="card-tools">

                            <button id="div-atras" type="button" class="btn btn-icon btn-round btn-sm btn-primary"
                                        data-toggle="tooltip"
                                        data-placement="left" title="Regresar"
                                >
                                    <i class="fas fa-arrow-left"></i>
                            </button>
    
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form id="formusuario" name="formusuario">
                        <input type="hidden" name="idtxt" id="idtxt">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    style="position: relative;top: 2px;">Identificación</label>
                                                <div class="" style="height: 40px;">
                                                    <div class="row">
                                                        <div class="col-md-3"
                                                            style="padding:0 0 0 15px; position:relative; top:-2px; display: block">
                                                            <select class="form-control" name="nacionalidad">
                                                                <option>V</option>
                                                                <option>E</option>
                                                                <!-- <option>G</option> -->
                                                            </select>
                                                        </div>
                                                        <div class="col-md-9" style="">
                                                            <input type="text" class="form-control" name="txtdocumento"
                                                                id="txtdocumento" placeholder="Ingrese su documento"
                                                                style="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    style="position: relative;top: 2px;">Nombre</label>
                                                <div class="" style="height: 40px;">
                                                    <input type="text" class="form-control" name="txtnombre"
                                                        id="txtnombre" placeholder="Ingrese su nombre"
                                                        style="position: relative;top: -2px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Apellido</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" name="txtapellido" id="txtapellido"
                                                placeholder="Ingrese su apellido" style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Fecha de
                                            nacimiento</label>
                                            <div class="" style="height: 55px;">
                                                <input type="text" id="txtfecha" name="txtfecha"
                                                class="form-control flatpickr-basic" placeholder="Ingrese su fecha de nacimiento" />
                                            </div>

                                        <!-- <div class="" style="height: 40px;">
                                            <input type="date" class="form-control" name="txtfecha" id="txtfecha"
                                                placeholder="Ingrese su fecha de nacimiento"
                                                style="position: relative;top: -2px;" max="<?php echo $fecha;?>"
                                                value="<?php echo $fecha;?>">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">N° de
                                            telefono</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" name="txttelefono" id="txttelefono"
                                                placeholder="Ingrese su n° de telefono"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Correo
                                            electronico</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" name="txtcorreo" id="txtcorreo"
                                                placeholder="Ingrese su correo electronico"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Dirección</label>

                                        <input type="text" class="form-control" name="txtdireccion" id="txtdireccion"
                                            placeholder="Ingrese su direccion" style="position: relative;top: -2px;">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Nombre de
                                            usuario</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" name="txtuser" id="txtuser"
                                                placeholder="Ingrese su nombre de usuario"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Clave de Acceso
                                        </label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" name="txtclave" id="txtclave"
                                                placeholder="Ingrese su clave de acceso"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"
                                            style="position: relative;top: 2px;margin-top: -20px;">Rol de
                                            usuario</label>
                                        <div class="" style="height: 40px;">
                                            <select class="form-control" name="txtrol" id="rol_on">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="msg" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El usuario ingresado ya se encuentra registrado!
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-sm" type="button" style="border-radius:3px;"
                                id="div-atras3"><i class="icon-times"></i> Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- General section box modal start -->
<!-- END: .main-content -->
<div class="main-content" id="editar_usuario" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title"><i class="fas fa-pen"></i> Editar Usuario</div>
                        <div class="card-tools">

                            <button id="div-atras2" type="button" class="btn btn-icon btn-round btn-sm btn-primary"
                                        data-toggle="tooltip"
                                        data-placement="left" title="Regresar"
                                >
                                    <i class="fas fa-arrow-left"></i>
                            </button>
    
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form id="formeditarusuario" name="formeditarusuario">

                        <div class="modal-body">
                            <!---->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    style="position: relative;top: 2px;">Identificación</label>
                                                <div class="" style="height: 40px;">
                                                    <div class="row">
                                                        <div class="col-xs-3 col-sm-3 col-md-3"
                                                            style="padding:0 0 0 15px; position:relative; display: none">
                                                            <select class="form-control" disabled style="cursor:no-drop"
                                                                name="nacionalidad" id="idnacionalidad">
                                                                <option value="N">N</option>
                                                                <option value="P">P</option>
                                                                <option value="G">G</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12" style="">
                                                            <input type="text" class="form-control"
                                                                style="cursor:no-drop" value="" name="txtdocumento"
                                                                id="idtxtdocumento" placeholder="Ingrese su documento"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label"
                                                    style="position: relative;top: 2px;">Nombre</label>
                                                <div class="" style="height: 40px;">
                                                    <input type="text" class="form-control" value="" name="txtnombre"
                                                        id="idtxtnombre" placeholder="Ingrese su nombre"
                                                        style="position: relative;top: -2px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Apellido</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" value="" name="txtapellido"
                                                id="idtxtapellido" placeholder="Ingrese su apellido"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Fecha de
                                            nacimiento</label>

                                        <div class="" style="height: 55px;">
                                            <input type="text" id="idtxtfecha" name="txtfecha"
                                            class="form-control flatpickr-basic" placeholder="Ingrese su fecha de nacimiento" style="position: relative;top: -2px;" />
                                        </div>
                                        <!-- <div class="" style="height: 40px;">
                                            <input type="date" class="form-control" value="" name="txtfecha"
                                                id="idtxtfecha" placeholder="Ingrese su fecha de nacimiento"
                                                style="position: relative;top: -2px;">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">N° de
                                            telefono</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" value="" name="txttelefono"
                                                id="idtxttelefono" placeholder="Ingrese su n° de telefono"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Correo
                                            electronico</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" value="" name="txtcorreo"
                                                id="idtxtcorreo" placeholder="Ingrese su correo electronico"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Dirección</label>

                                        <input type="text" class="form-control" value="" name="txtdireccion"
                                            id="idtxtdireccion" placeholder="Ingrese su direccion"
                                            style="position: relative;top: -2px;">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Nombre de
                                            usuario</label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" value="" style="cursor:no-drop"
                                                name="txtuser" id="idtxtuser" placeholder="Ingrese su nombre de usuario"
                                                style="position: relative;top: -2px;" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">
                                            Clave de Acceso
                                        </label>
                                        <div class="" style="height: 40px;">
                                            <input type="text" class="form-control" value=""
                                                name="txtclave" id="idtxtclave" placeholder="Ingrese su clave de acceso"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" style="position: relative;top: 2px;">Rol de
                                            usuario</label>
                                        <div class="" style="height: 40px;">
                                            <select class="form-control" name="txtrol" id="idtxtrol">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div id="msgE" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El usuario ingresado ya se encuentra registrado!
                                    </div>
                                </div>

                            </div>
                            <!---->

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-secondary btn-sm" type="button"
                                style="border-radius:3px;" id="div-atras4"><i class="icon-times"></i> Cancelar</button>
                            <button type="submit" class="btn btn-primary btn-sm" type="button"
                                style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios</button>
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


<script type="text/javascript">
ListarSelects('idtxtrol', '', 'select_rol.php');
ListarSelects('idtxtcompania', '', 'select_catalogo.php?tabla=compania&campo=x');

$("#btnnuevo-rol").click(function() {

    ListarSelects('rol_on', '', 'select_rol.php');
    ListarSelects('compania_select', '', 'select_catalogo.php?tabla=compania&campo=x');

    act_regs('tabla_vista', 'nuevo_usuario', 'formusuario');

});
$("#div-atras").click(function() {
    act_regs('nuevo_usuario', 'tabla_vista', 'formusuario');
});
$("#div-atras2").click(function() {
    act_regs('editar_usuario', 'tabla_vista', 'formusuario');
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
                act_regs('nuevo_usuario', 'tabla_vista', 'formusuario');
            }
        })
});
$("#div-atras4").click(function() {
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
                act_regs('editar_usuario', 'tabla_vista', 'formusuario');
            }
        })
});


$("#recargar").click(function() {
    listarUsuarios('tb-usuarios');
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