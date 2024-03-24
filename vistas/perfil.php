<?php
include("../conexion/conexion.php");
session_start();
$conexion=conexion();
?>

<h4 class="page-title">Opciones de Perfil</h4>

<div id="mensaje2"></div>
<!-- BEGIN .main-content -->
<div class="main-content">

    <div class="row gutters">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <!-- <div class="card-header"></div> -->
                <div class="card-body">

                    <form name="formeditarperfil" id="formeditarperfil">

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Usuario:</label>
                                    <div class="" style="height: 40px;">
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['usuario']; ?>" name="txtuser" id="txtuser"
                                            readonly placeholder="Ingrese su nombre"
                                            style="position: relative;top: -2px;cursor: not-allowed;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Documento</label>
                                    <div class="" style="height: 40px;">
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3"
                                                style="padding:0 0 0 15px; position:relative;">
                                                <select class="form-control" disabled style="cursor:no-drop"
                                                    name="nacionalidad" id="nacionalidad">
                                                    <option
                                                        <?php if($_SESSION["nacionalidad"]=='N'){ echo "selected"; } ?>>
                                                        N</option>
                                                    <option
                                                        <?php if($_SESSION["nacionalidad"]=='P'){ echo "selected"; } ?>>
                                                        P</option>
                                                    <option
                                                        <?php if($_SESSION["nacionalidad"]=='G'){ echo "selected"; } ?>>
                                                        G</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-9 col-sm-9 col-md-9" style="padding:0;">
                                                <input type="text" class="form-control" style="cursor:no-drop"
                                                    value="<?php echo $_SESSION['documento']; ?>" name="txtdocumento"
                                                    id="txtdocumento" placeholder="Ingrese su documento"
                                                    style="position: relative;top: -2px;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Nombre:</label>
                                    <div class="" style="height: 40px;">
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['nombre']; ?>" name="txtnombre" id="txtnombre"
                                            placeholder="Ingrese su nombre" style="position: relative;top: -2px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Apellido</label>
                                    <div class="" style="height: 40px;">
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['apellido']; ?>" name="txtapellido"
                                            id="txtapellido" placeholder="Ingrese su apellido"
                                            style="position: relative;top: -2px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Fecha de
                                        nacimiento:</label>
                                    <div class="" style="height: 40px;">
                                        <input type="date" class="form-control" name="txtfecha" id="txtfecha"
                                            placeholder="Ingrese su fecha de nacimiento"
                                            style="position: relative;top: -2px;"
                                            value="<?php echo $_SESSION['fecha_nac']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Telefono</label>
                                    <div class="" style="height: 40px;">
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['telefono']; ?>" name="txttelefono"
                                            id="txttelefono" placeholder="Ingrese su n° de telefono"
                                            style="position: relative;top: -2px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Correo
                                        electronico:</label>
                                    <div class="" style="height: 40px;">
                                        <input type="email" class="form-control"
                                            value="<?php echo $_SESSION['correo']; ?>" name="txtcorreo" id="txtcorreo"
                                            placeholder="Ingrese su correo electronico"
                                            style="position: relative;top: -2px;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label class="form-label" style="position: relative;top: 2px;">Dirección</label>
                                    <div class="" style="height: 40px;">
                                        <input type="text" class="form-control"
                                            value="<?php echo $_SESSION['direccion']; ?>" name="txtdireccion"
                                            id="txtdireccion" placeholder="Ingrese su direccion"
                                            style="position: relative;top: -2px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar
                                        cambios</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- END: .main-content -->

<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../js/validacion-min.js" type="text/javascript"></script>
<script src="../js/tables-min.js"></script>
<!-- <script src="../vendor/notify/notify.js"></script> -->
<script type="text/javascript">
$("#btnnuevo").click(function() {
    $('#nuevo').modal('show');
});
$("#cancelar").click(function() {
    CancelarCambiarContraseña();
});
</script>