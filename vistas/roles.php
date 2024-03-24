<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>

<h4 class="page-title">Roles</h4>

<div id="mensaje2"></div>
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


                        <table id="tb-roles" class="table table-hover table-condensed" width="100%">
                            <thead>
                                <tr>
                                    <th style="width: 60%">Descripcion</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 25%">Opciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th style="width: 60%">Descripcion</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 25%">Opciones</th>
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
<!-- END: .main-content -->
<div class="main-content" id="nuevo_rol" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title"><i class="fas fa-tasks"></i> Agregar Rol</div>
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
                    <div class="modal-content">
                        <form id="formrol" name="formrol">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="form-label"
                                                style="position: relative;top: 2px;">Descripción</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" name="txtdescripcion"
                                                    placeholder="Ingrese su descripción"
                                                    style="position: relative;top: -2px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="check">Seleccione los permisos del rol</label>
                                        <div class="row">
                                            <?php
                                                $sql_per="SELECT * FROM permisologia";
                                                $query_per=mysqli_query($conexion,$sql_per);
                                                while($fila_per=mysqli_fetch_array($query_per)){                
                                            ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-check">
            <!-- <input class="form-check-input" type="checkbox" value="<?php echo $fila_per[0]; ?>" 
                name="check_per[]" id="check<?php echo $fila_per[0];?>" onclick="contar($(this))">

            <label class="form-check-label" for="defaultCheck<?php echo $fila_per[0]; ?>">
                <?php echo ucfirst($fila_per[1]); ?>
            </label> -->


            <label class="colorinput">
                <input class="colorinput-input" type="checkbox" value="<?php echo $fila_per[0]; ?>"
                name="check_per[]" id="check<?php echo $fila_per[0];?>"  onclick="contar($(this))">
                <span class="colorinput-color bg-primary"></span>
            </label>

            <label class="form-check-label" for="defaultCheck_edit<?php echo $fila_per[0]; ?>">
                <?php echo ucfirst($fila_per[1]); ?>
            </label>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div id="msg" class="alert alert-danger"
                                            style="display: none;position: relative;top: 10px;">
                                            <i class="icon-warning2"></i>El rol ingresado ya se encuentra registrado
                                        </div>
                                        <div id="msgP" class="alert alert-danger"
                                            style="display: none;position: relative;top: 10px;">
                                            <i class="icon-warning2"></i>Debe seleccionar al menos un permiso
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button data-dismiss="modal" class="btn btn-secondary btn-sm" type="button"
                                    style="border-radius:3px;" id="div-atras3"><i class="icon-times"></i>
                                    Cancelar</button>
                                <button type="submit" class="btn btn-primary btn-sm" type="button"
                                    style="border-radius:3px;"><i class="icon-check"></i> Guardar cambios</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- General section box modal start -->

<!-- END: .main-content -->
<div class="main-content" id="editar_rol" style="display: none">
    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">

                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title"><i class="fas fa-pen"></i> Editar Rol</div>
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
                    <form id="formeditarrol" name="formeditarrol">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label"
                                            style="position: relative;top: 2px;">Descripción</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="idtxtdescripcion"
                                                name="txtdescripcion" placeholder="Ingrese su descripción"
                                                style="position: relative;top: -2px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="check">Seleccione los permisos del rol</label>
                                    <div class="row">
                                        <?php
                                            $sql_per="SELECT * FROM permisologia";
                                            $query_per=mysqli_query($conexion,$sql_per);
                                            $a=0;
                                            while($fila_per=mysqli_fetch_array($query_per)){
                                            $a=$a+1;
                                        ?>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="row">
                                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                    <div class="form-check">

                <!-- <input class="colorinput-input" type="checkbox" value="<?php echo $fila_per[0]; ?>" 
                    name="check_per_edit[]" id="check_edit<?php echo $fila_per[0];?>"  onclick="contar($(this))"> -->

                <label class="colorinput">
                    <input class="colorinput-input" type="checkbox" value="<?php echo $fila_per[0]; ?>"
                    name="check_per_edit[]" id="check_edit<?php echo $fila_per[0];?>"  onclick="contar($(this))">
                    <span class="colorinput-color bg-primary"></span>
                </label>

                <label class="form-check-label" for="defaultCheck_edit<?php echo $fila_per[0]; ?>">
                    <?php echo ucfirst($fila_per[1]); ?>
                </label>


                

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div id="msgE" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>El rol ingresado ya se encuentra registrado!
                                    </div>
                                    <div id="msgPE" class="alert alert-danger"
                                        style="display: none;position: relative;top: 10px;">
                                        <i class="icon-warning2"></i>Debe seleccionar al menos un permiso
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary btn-sm" type="button" style="border-radius:3px;"
                                id="div-atras4"><i class="icon-times"></i> Cancelar</button>
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


<!-- modal end -->



<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>


<script src="../js/tables-min.js"></script>

<script type="text/javascript">
$("#btnnuevo-rol").click(function() {
    act_regs('tabla_vista', 'nuevo_rol', 'formrol');
    $("#formrol").data('conteo', 0);
});
$("#div-atras").click(function() {
    act_regs('nuevo_rol', 'tabla_vista', 'formrol');
    $("#formrol").data('conteo', 0);
});
$("#div-atras2").click(function() {
    act_regs('editar_rol', 'tabla_vista', 'formrol');
    $("#editar-rol").data('conteo', 0);
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
                act_regs('nuevo_rol', 'tabla_vista', 'formrol');
                $("#formrol").data('conteo', 0);
            }
        });
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
                act_regs('editar_rol', 'tabla_vista', 'formrol');
                $("#editar-rol").data('conteo', 0);
            }
        })
});
$("#recargar").click(function() {
    listarRoles('tb-roles');
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
});
setTimeout(() => {
    $('[data-toggle="tooltip"]').tooltip();
}, 1000);
$("#formrol").data('total', '<?php echo $a; ?>');
</script>