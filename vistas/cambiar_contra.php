<?php
include("../conexion/conexion.php");
$conexion=conexion();
?>

<h4 class="page-title">Cambiar contraseña</h4>


<div id="mensaje2"></div>
<!-- BEGIN .main-content -->
<div class="main-content">

    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-4">
            <div class="card">
                <!-- <div class="card-header"></div> -->
                <div class="card-body">

                    <form id="formcontra">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Contraseña
                                        actual</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="txtcontra" placeholder=""
                                            style="position: relative;top: -2px;" id="idtxtcontra">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Nueva
                                        contraseña</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="txtnueva1" placeholder=""
                                            style="position: relative;top: -2px;" id="idtxtnueva1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Repita nueva
                                        contraseña</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" name="txtnueva2" placeholder=""
                                            style="position: relative;top: -2px;" id="idtxtnueva2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-sm" type="button"
                                    style="border-radius:3px;float: right;margin-left: 5px;"><i class="icon-check"></i>
                                    Guardar cambios</button>
                                <button class="btn btn-secondary btn-sm" type="button"
                                    style="border-radius:3px;float: right;" id="cancelar"><i class="icon-times"></i>
                                    Cancelar</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- END: .main-content -->

<!-- Custom Data tables -->
<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>
<script src="../js/tables-min.js"></script>

<script type="text/javascript">
$("#btnnuevo").click(function() {
    $('#nuevo').modal('show');
});
$("#cancelar").click(function() {
    CancelarCambiarContraseña();
});
</script>