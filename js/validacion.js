function soloNombres(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyzñ ";
    especiales = [];
  
    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
  
    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
  }
  
  function soloNumeros(e) {
    var key = window.Event ? e.which : e.keyCode;
    return key >= 48 && key <= 57;
  }
  
  // function soloNumeros(e) {
  //     var key = window.Event ? e.which : e.keyCode;
  //     return key >= 48 && key <= 57;
  // }
  
  // function soloNumeros(e) {
  //     var key = window.Event ? e.which : e.keyCode;
  //     return key >= 48 && key <= 57;
  // }
    
  
  function soloCorreos(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyzñ0123456789@!#$%&'*/=?^_+-`{|}~. ";
    especiales = [];
  
    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
  
    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
  }
  
  
  function alfaNumerica(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnopqrstuvwxyzñáéóíúÁÉÍÓÚ0123456789@: -";
    especiales = [];
  
    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
  
    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
  }
  
  function soloPrecio(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = ".0123456789";
    especiales = [];
  
    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
  
    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
  }
  
  //Validacion formularios
  $(document).ready(function () {
    $.validator.addMethod(
      "valueNotEquals",
      function (value, element, arg) {
        return arg !== value;
      },
      "Value must not equal arg."
    );
  
    $("#loginForm").validate({
      rules: {
        txtusuario: {
          required: true,
        },
        txtcontra: {
          required: true,
        },
  
        // txtequipo: {
        // valueNotEquals: "0"
        //}
      },
  
      messages: {
        txtusuario: {
          required: "<div style='font-size: 10px;'>Debe ingresar usuario</div>",
        },
        txtcontra: {
          required:
            "<div style='font-size: 10px;'>Debe ingresar contraseña</div>",
        },
      },
  
      submitHandler: function (form) {
        getLogin();
      },
    });
  });
  $(document).ready(function () {
    $.validator.addMethod(
      "valueNotEquals",
      function (value, element, arg) {
        return arg !== value;
      },
      "Value must not equal arg."
    );
    $("#formrol").validate({
      focusInvalid: false,
      ignore: "",
      rules: {
        txtdescripcion: {
          required: true,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar la descripción del rol</b>",
        },
      },
      invalidHandler: function (event, validator) {
        //showErrorMessage("Debe ingresar la descripción de su empresa");
      },
  
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error"></span>').insertAfter(element).append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      unhighlight: function (element) {
        // revert the change done by hightlight
      },
  
      success: function (label, element) {
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-error").addClass("has-success");
      },
  
      submitHandler: function (form) {
        guardar_rol();
      },
    });
    $("#formeditarrol").validate({
      focusInvalid: false,
      ignore: "",
      rules: {
        txtdescripcion: {
          required: true,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar la descripción del rol</b>",
        },
      },
      invalidHandler: function (event, validator) {
        //showErrorMessage("Debe ingresar la descripción de su empresa");
      },
  
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error"></span>').insertAfter(element).append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      unhighlight: function (element) {
        // revert the change done by hightlight
      },
  
      success: function (label, element) {
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-error").addClass("has-success");
      },
  
      submitHandler: function (form) {
        editar_rol();
      },
    });
  
    $("#formcatalogo").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        guardar_catalogo();
      },
    });
  
    $("#formeditarperfil").validate({
      rules: {
        txtnombre: {
          required: true,
          maxlength: 30,
        },
        txtapellido: {
          required: true,
          maxlength: 30,
        },
        txtfecha: {
          required: true,
        },
        txttelefono: {
          required: true,
          maxlength: 15,
        },
        txtcorreo: {
          required: true,
          maxlength: 45,
        },
        txtdireccion: {
          required: true,
          maxlength: 100,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
        txtapellido: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un apellido</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
        txtfecha: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una fecha</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un teléfono</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 15 caracteres</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un correo</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 45 caracteres</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una dirección</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 100 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        guardarperfil();
      },
    });
  
    $("#formeditcatalogo").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        editar_catalogo();
      },
    });
  
    $("#formvacante").validate({
      rules: {
        txtvacante: {
          required: true,
        },
        txtperfil: {
          required: true,
        },
        txtzona: {
          required: true,
        },
        txtempresa: {
          required: true,
        },
        txtcontacto: {
          required: true,
        },
        txtimportante: {
          required: true,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtperfil: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtzona: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtempresa: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtcontacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtimportante: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
      },
      submitHandler: function (form) {
        guardar_vacante();
      },
    });
  
    $("#editbolsa").validate({
      rules: {
        txtvacante: {
          required: true,
        },
        txtperfil: {
          required: true,
        },
        txtzona: {
          required: true,
        },
        txtempresa: {
          required: true,
        },
        txtcontacto: {
          required: true,
        },
        txtimportante: {
          required: true,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtperfil: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtzona: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtempresa: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtcontacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
        txtimportante: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
        },
      },
  
      submitHandler: function (form) {
        //alert("validado");
        editar_bolsa();
      },
    });
  
    $("#formcentro").validate({
      rules: {
        txtnombre: {
          required: true,
          maxlength: 60,
        },
        txtdireccion: {
          required: true,
          maxlength: 120,
        },
        txttelefono: {
          required: true,
          maxlength: 50,
        },
        txtresponsable: {
          required: true,
          maxlength: 80,
        },
        txtcoordinadora: {
          required: true,
          maxlength: 80,
        },
        txtcategoria: {
          valueNotEquals: "0",
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 60 caracteres</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una dirección</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 120 caracteres</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un teléfono</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 50 caracteres</b>",
        },
        txtresponsable: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un responsable</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 80 caracteres</b>",
        },
        txtcoordinadora: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una coordinadora</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 80 caracteres</b>",
        },
        txtcategoria: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar una categoría</b>",
        },
      },
      submitHandler: function (form) {
        guardar_guarderia();
      },
    });
  
    $("#formeditarguarderia").validate({
      rules: {
        txtnombre: {
          required: true,
          maxlength: 60,
        },
        txtdireccion: {
          required: true,
          maxlength: 120,
        },
        txttelefono: {
          required: true,
          maxlength: 50,
        },
        txtresponsable: {
          required: true,
          maxlength: 80,
        },
        txtcoordinadora: {
          required: true,
          maxlength: 80,
        },
        txtcategoria: {
          valueNotEquals: "0",
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 60 caracteres</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una dirección</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 120 caracteres</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un teléfono</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 50 caracteres</b>",
        },
        txtresponsable: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un responsable</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 80 caracteres</b>",
        },
        txtcoordinadora: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una coordinadora</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 80 caracteres</b>",
        },
        txtcategoria: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar una categoría</b>",
        },
      },
      submitHandler: function (form) {
        editar_guarderia();
      },
    });
  
    $("#formcurso").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        guardar_curso();
      },
    });
  
    $("#formeditcurso").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        editar_curso();
      },
    });
  
    $("#formcategoria").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        guardar_categoria();
      },
    });
  
    $("#formeditcategoria").validate({
      rules: {
        txtdescripcion: {
          required: true,
          maxlength: 30,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una descripción</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Longitud máxima 30 caracteres</b>",
        },
      },
      submitHandler: function (form) {
        editar_categoria();
      },
    });
  
    $("#formusuario").validate({
      rules: {
        txtdocumento: {
          required: true,
          number: true,
        },
        txtnombre: {
          required: true,
        },
        txtapellido: {
          required: true,
        },
        txtfecha: {
          required: true,
        },
        txttelefono: {
          required: true,
          number: true,
        },
        txtcorreo: {
          required: true,
          email: true,
        },
        txtdireccion: {
          required: true,
        },
        txtuser: {
          required: true,
        },
        txtclave: {
          required: true,
        },
      },
      messages: {
        txtdocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px;'>Debe ingresar un documento</b>",
          number:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px;'>Debe ser solo numeros</b>",
        },
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px;'>Debe ingresar un nombre</b>",
        },
        txtapellido: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un apellido</b>",
        },
        txtfecha: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una fecha</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un telefono</b>",
          number:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ser solo numeros</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un correo electronico</b>",
          email:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>No es un email</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una direccion</b>",
        },
        txtuser: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre de usuario</b>",
        },
        txtclave: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una clave de acceso</b>",
        },
      },
      submitHandler: function (form) {
        guardar_usuario();
      },
    });
    $("#formeditarusuario").validate({
      rules: {
        txtdocumento: {
          required: true,
          number: true,
        },
        txtnombre: {
          required: true,
        },
        txtapellido: {
          required: true,
        },
        txtfecha: {
          required: true,
        },
        txttelefono: {
          required: true,
          number: true,
        },
        txtcorreo: {
          required: true,
          email: true,
        },
        txtdireccion: {
          required: true,
        },
        txtuser: {
          required: true,
        },
      },
      messages: {
        txtdocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un documento</b>",
          number:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ser solo numeros</b>",
        },
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre</b>",
        },
        txtapellido: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un apellido</b>",
        },
        txtfecha: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una fecha</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un telefono</b>",
          number:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ser solo numeros</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un correo electronico</b>",
          email:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>No es un email</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar una direccion</b>",
        },
        txtuser: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar un nombre de usuario</b>",
        },
      },
      submitHandler: function (form) {
        editar_usuario();
      },
    });
  
    $("#formucompania").validate({
      rules: {
        txtnombre: {
          required: true,
        },
        txtruc: {
          required: true,
        },
        txtcodigo: {
          required: true,
        },
        txtDV: {
          required: true,
        },
        txtlicencia: {
          required: true,
        },
        txttipo: {
          valueNotEquals: "0",
        },
        txtdireccion: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtcelular: {
          required: true,
        },
        txtcorreo: {
          required: true,
        },
        txtid_contacto: {
          required: true,
        },
        txtnombre_contacto: {
          required: true,
        },
        txtcelular_contacto: {
          required: true,
        },
        txtcorreo_contacto: {
          required: true,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar nombre CIA</b>",
        },
        txtruc: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar RUC</b>",
        },
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar codigo</b>",
        },
        txtDV: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar DV</b>",
        },
        txtlicencia: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar licencia</b>",
        },
        txttipo: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar tipo</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar direccion</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar telefono</b>",
        },
        txtcelular: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar celular</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar correo</b>",
        },
        txtid_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar id contacto</b>",
        },
        txtnombre_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar nombre contacto</b>",
        },
        txtcelular_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar teléfono contacto</b>",
        },
        txtcorreo_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar correo contacto</b>",
        },
      },
      submitHandler: function (form) {
        guardar_datos("guardar_empresa", "formucompania", "tb-compania", "nuevo");
        //alert("Validado");
      },
    });
  
    $("#formeditarcompania").validate({
      rules: {
        txtnombre: {
          required: true,
        },
        txtruc: {
          required: true,
        },
        txtcodigo: {
          required: true,
        },
        txtDV: {
          required: true,
        },
        txtlicencia: {
          required: true,
        },
        txttipo: {
          required: true,
        },
        txtdireccion: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtcelular: {
          required: true,
        },
        txtcorreo: {
          required: true,
        },
        txtnombre_contacto: {
          required: true,
        },
        txtid_contacto: {
          required: true,
        },
        txtcelular_contacto: {
          required: true,
        },
        txtcorreo_contacto: {
          required: true,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar nombre CIA</b>",
        },
        txtruc: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar RUC</b>",
        },
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar codigo</b>",
        },
        txtDV: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar DV</b>",
        },
        txtlicencia: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar licencia</b>",
        },
        txttipo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar tipo</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar direccion</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar telefono</b>",
        },
        txtcelular: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar celular</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar correo</b>",
        },
        txtid_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar id contacto</b>",
        },
        txtnombre_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar nombre contacto</b>",
        },
        txtcelular_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar teléfono contacto</b>",
        },
        txtcorreo_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar correo contacto</b>",
        },
      },
      submitHandler: function (form) {
        editar_datos(
          "editar_empresa",
          "formeditarcompania",
          "tb-compania",
          "editar"
        );
        //alert("Validado");
      },
    });
  
    $.validator.addMethod(
      "le",
      function (value, element, param) {
        return this.optional(element) || value >= $(param).val();
      },
      "Invalid value"
    );
  
    $("#formusolicitud").validate({
      rules: {
        txtcod_sol: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtnotas: {
          required: true,
        },
        txttipo: {
          valueNotEquals: "0",
        },
        txtcliente: {
          valueNotEquals: "0",
        },
        txtruc_contacto: {
          required: true,
        },
        txtlugar: {
          required: true,
        },
        txtfecha_inicio: {
          required: true,
        },
        txtfecha_fin: {
          required: true,
          le: "#txtfecha_inicio",
        },
        txthora_inicio: {
          required: true,
        },
        txthora_fin: {
          required: true,
        },
        txtduracion: {
          required: true,
        },
      },
      messages: {
        txtcod_sol: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar codigo solicitud</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -3px'>Debe ingresar descripción</b>",
        },
        txtnotas: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -3px;'>Debe ingresar notas</b>",
        },
        txttipo: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar tipo</b>",
        },
        txtcliente: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar cliente</b>",
        },
        txtruc_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar un cliente</b>",
        },
        txtlugar: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar lugar</b>",
        },
  
        txtfecha_inicio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha inicio</b>",
        },
        txtfecha_fin: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha fin</b>",
          le: "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha superior a la de inicio</b>",
        },
        txthora_inicio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar hora inicio</b>",
        },
        txthora_fin: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar hora fin</b>",
        },
        txtduracion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar duración</b>",
        },
      },
      submitHandler: function (form) {
        guardar_datos(
          "guardar_solicitud",
          "formusolicitud",
          "tb-solicitud",
          "nuevo"
        );
        //alert($('#txttipo').val());
      },
    });
  
    $("#formeditarsol").validate({
      rules: {
        txtcod_sol: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtnotas: {
          required: true,
        },
        txttipo: {
          valueNotEquals: "0",
        },
        txtcliente: {
          valueNotEquals: "0",
        },
        txtruc_contacto: {
          required: true,
        },
        txtlugar: {
          required: true,
        },
        txtfecha_inicio: {
          required: true,
        },
        txtfecha_fin: {
          required: true,
          le: "#txtfecha_inicioE",
        },
        txthora_inicio: {
          required: true,
        },
        txthora_fin: {
          required: true,
        },
        txtduracion: {
          required: true,
        },
      },
      messages: {
        txtcod_sol: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar codigo solicitud</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -3px'>Debe ingresar descripción</b>",
        },
        txtnotas: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -3px;'>Debe ingresar notas</b>",
        },
        txttipo: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar tipo</b>",
        },
        txtcliente: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar cliente</b>",
        },
        txtruc_contacto: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe seleccionar un cliente</b>",
        },
        txtlugar: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar lugar</b>",
        },
  
        txtfecha_inicio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha inicio</b>",
        },
        txtfecha_fin: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha fin</b>",
          le: "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar fecha superior a la de inicio</b>",
        },
        txthora_inicio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar hora inicio</b>",
        },
        txthora_fin: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar hora fin</b>",
        },
        txtduracion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -5px'>Debe ingresar duración</b>",
        },
      },
      submitHandler: function (form) {
        editar_datos(
          "editar_solicitud",
          "formeditarsol",
          "tb-solicitud",
          "nuevo"
        );
        //alert($('#txttipo').val());
      },
    });
  
  
    // CATEGORIA NOTICIAS
    $("#formCategoriaNoticias").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        }          
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarCategoriaNoticias();
      },
    });
  
    $("#formCategoriaNoticiasEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        }      
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarCategoriaNoticias();
      },
    });
    // CATEGORIA NOTICIAS
  
    // CATEGORIA EVENTOS
    $("#formCategoriaEventos").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        }          
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarCategoriaEventos();
      },
    });
  
    $("#formCategoriaEventosEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        }      
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarCategoriaEventos();
      },
    });
    // CATEGORIA EVENTOS
  
  
    // CATEGORIA TURISMO
    $("#formCategoriaConociendoCarirubana").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        },
        txtimagen: {
          required: true
        },
        txticono: {
          required: true,
          maxlength: 50,
        },
        txtunico: {
          required: true,
          maxlength: 50,
        },          
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        },
        txtunico: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un texto único</b>",
        },      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarCategoriaConociendoCarirubana();
      },
    });
  
    $("#formCategoriaConociendoCarirubanaEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 70,
        },
        txticono: {
          required: true,
          maxlength: 50,
        },    
        txtunico: {
          required: true,
          maxlength: 50,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        },
        txtunico: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un texto único</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarCategoriaConociendoCarirubana();
      },
    });
    // CATEGORIA TURISMO
  
  
  
    // BANNER PRINCIPAL
    $("#formBannerPrincipal").validate({
      rules: {
        txttitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcion: {
          required: true,
          minlength: 20,
          maxlength: 120,
        },
        txtcategoria: {
          required: true,
          minlength: 20,
          maxlength: 50,
        },
        txtimagen: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarBannerPrincipal();
      },
    });
  
    $("#formBannerEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcion: {
          required: true,
          minlength: 20,
          maxlength: 120,
        },
        txtcategoria: {
          required: true,
          minlength: 20,
          maxlength: 50,
        },
        // txtimagen: {
        //   required: true,
        // },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        // txtimagen: {
        //   required:
        //     "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        // },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarBannerPrincipal();
      },
    });
    // BANNER PRINCIPAL
  
    // SESION BIENVENIDO A CARIRUBANA
    $("#formSesionCarirubana").validate({
      rules: {
        txttitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtsubtitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcion: {
          required: true,
          minlength: 20,
          maxlength: 120,
        },
        txtcategoria: {
          required: true,
          minlength: 20,
          maxlength: 50,
        },
        txtetiqueta1: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtetiqueta2: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcionimg: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtimagen: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtsubtitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un subtítulo</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtetiqueta1: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtetiqueta2: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtdescripcionimg: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción de imagen</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionCariruba();
      },
    });
  
    $("#formSesionCarirubanaEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          minlength: 20,
          maxlength: 150,
        },
        txtsubtitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcion: {
          required: true,
          minlength: 20,
          maxlength: 320,
        },
        txtcategoria: {
          required: true,
          minlength: 20,
          maxlength: 50,
        },
        txtetiqueta1: {
          required: true,
          maxlength: 41,
        },
        txtetiqueta2: {
          required: true,
          maxlength: 41,
        },
        txtdescripcionimg: {
          required: true,
          minlength: 20,
          maxlength: 200,
        },
        // txtimagen: {
        //     required: true
        // }
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtsubtitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un subtítulo</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtetiqueta1: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtetiqueta2: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtdescripcionimg: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción de imagen</b>",
        },
        // 'txtimagen':{
        //     required:"<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>"
        // }
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionCarirubana();
      },
    });
    // SESION BIENVENIDO A CARIRUBANA
  
  
    // TRAMITES Y SERVICIOS
    $("#formSesionTramitesServicios").validate({
      rules: {
        txtcategoria: {
          required: true,
          maxlength: 60,
        },
        txttitulo: {
          required: true,
          maxlength: 80,
        },
        txtdescripcion: {
          required: true,
          maxlength: 10000,
        },
        txticono: {
          required: true,
          maxlength: 50,
        },
        txtimagen: {
          required: true,
        },
        txtimagendetalle: {
          required: true,
        }
      },
      messages: {
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoría</b>",
        },
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
        txtimagendetalle: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial para el detalle</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionTramitesServicios();
      },
    });
    $("#formSesionTramitesServiciosEditar").validate({
      rules: {
        txtcategoria: {
          required: true,
          maxlength: 60,
        },
        txttitulo: {
          required: true,
          maxlength: 80,
        },
        txtdescripcion: {
          required: true,
          maxlength: 10000,
        },
        txticono: {
          required: true,
          maxlength: 50,
        }
      },
      messages: {
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoría</b>",
        },
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        }
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionTramitesServicios();
      },
    });
    $("#formSesionTramitesServiciosDocuemento").validate({
      rules: {
        txttitulodocumento: {
          required: true,
          maxlength: 150,
        },
        documento: {
          required: true,        
        }        
      },
      messages: {
        txttitulodocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        documento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una documento pdf</b>",
        }      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionTramitesServiciosDocumentos();
      },
    });
    $("#formSesionTramitesServiciosDocuementoE").validate({
      rules: {
        txttitulodocumento: {
          required: true,
          maxlength: 150,
        }          
      },
      messages: {
        txttitulodocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }        
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionTramitesServiciosDocumentosE();
      },
    });
    // TRAMITES Y SERVICIOS
  
  
  
  
    // NOTICIAS
    $("#formNoticiasPrincipales").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        txtdescripcion: {
          required: true,
          maxlength: 5000,
        },
        txtcategoria: {
          required: true,
          maxlength: 100,
        },
        txtimagen: {
          required: true,
        },
        txtperiodista: {
          required: true,
          maxlength: 70,
        },
        txtfotografo: {
          required: true,
          maxlength: 70,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
        txtperiodista: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar nombre del periodista</b>",
        },
        txtfotografo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar nombre del fotografo</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionNotiticiasPrincipales();
      },
    });
    $("#formNoticiasPrincipalesEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        txtdescripcion: {
          required: true,
          maxlength: 5000,
        },
        txtcategoria: {
          required: true,
          maxlength: 100,
        },
        txtperiodista: {
          required: true,
          maxlength: 70,
        },
        txtfotografo: {
          required: true,
          maxlength: 70,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtperiodista: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar nombre periodista</b>",
        },
        txtfotografo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar nombre fotografo</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionNoticiasPrincipales();
      },
    });
    $("#formSesionNoticiasImagenesE").validate({
      rules: {
        txtimagen: {
          required: false,
        }          
      },
      messages: {
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen</b>",
        }        
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionNoticiasImagenesE();
      },
    });
    // NOTICIAS
  
  
    // TURISMO => CONOCIENDO CARIRUBANA
    $("#formSesionConociendoCarirubana").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 20,
        },
        txtdescripcion: {
          required: true,
          maxlength: 300,
        },
        txtdireccion: {
          required: true,
          maxlength: 150,
        },
        txthorario: {
          required: true,
          maxlength: 50,
        },
        txtentrada: {
          maxlength: 50,
        },
        txtcategoria: {
          required: true,
        },
        txtimagen: {
          required: true,
        },                
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una dirección</b>",
        },
        txthorario: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un horario</b>",
        },
        txtentrada: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar el costo de la entrada</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe selecionar una categoria</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar una imagen</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionConociendoCarirubana();
      },
    });
  
    $("#formSesionConociendoCarirubanaEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 20,
        },
        txtdescripcion: {
          required: true,
          maxlength: 300,
        },
        txtdireccion: {
          required: true,
          maxlength: 150,
        },
        txthorario: {
          required: true,
          maxlength: 50,
        },
        txtentrada: {
          maxlength: 50,
        },
        txtcategoria: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una direccion</b>",
        },
        txthorario: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un horario</b>",
        },
        txtentrada: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar el costo de la entrada</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe selecionar una categoria</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionConociendoCarirubana();
      },
    });
  
    $("#formSesionConociendoCarirubanaImagenesE").validate({
      rules: {
        txtimagen: {
          required: false,
        }          
      },
      messages: {
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen</b>",
        }        
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionConociendoCarirubanaImagenesE();
      },
    });
    // TURISMO => CONOCIENDO CARIRUBANA
  
  
    // ORDENANZAS
    $("#formMultimedia").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        documento: {
          required: true,
          maxlength: 800,        
        }        
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        documento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar un documento PDF</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionMuntimedia();
      },
    });
  
    $("#formMultimediaEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
  
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionMultimedia();
      },
    });
    // ORDENANZAS
  
  
  
    // SEMANARIO
    $("#formSemanario").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        documento: {
          required: true,        
        },       
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        documento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar un documento PDF</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSemanario();
      },
    });
  
    $("#formSemanarioEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSemanario();
      },
    });
    // SEMANARIO
  
  
  
    // LIBROS Y REVISTAS
    $("#formLibrosRevistas").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        documento: {
          required: true,
          maxlength: 800,        
        },
        txtimagen: {
          required: true,
        },                
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        documento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar un documento PDF</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar una imagen</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionLibrosRevistas();
      },
    });
  
    $("#formLibrosRevistasEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
  
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionLibrosRevistas();
      },
    });
    // LIBROS Y REVISTAS
  
    $("#formEfemerides").validate({
      rules: {
        txttitulo: { required: true, maxlength: 500 },
        txtdescripcion: { required: true, maxlength: 200 },
        txtimagen: { required: true },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe cargar una imagen</b>",
        },
      },
      errorPlacement: function (e, t) {
        $('<span class="error text-danger"></span>').insertAfter(t).append(e),
          $(t)
            .parent()
            .parent(".form-group")
            .removeClass("has-success")
            .addClass("has-error");
      },
      highlight: function (e) {
        $(e)
          .parent()
          .parent(".form-group")
          .removeClass("has-success")
          .addClass("has-error");
      },
      submitHandler: function (e) {
        guardarEfemeride();
      },
    }),
    $("#formEfemeridesEditar").validate({
      rules: { 
        txttitulo: { required: !0, maxlength: 500 }, 
        txtdescripcion: { required: true, maxlength: 200 },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
            required:
              "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
          },
      },
      errorPlacement: function (e, t) {
        $('<span class="error text-danger"></span>').insertAfter(t).append(e),
          $(t)
            .parent()
            .parent(".form-group")
            .removeClass("has-success")
            .addClass("has-error");
      },
      highlight: function (e) {
        $(e)
          .parent()
          .parent(".form-group")
          .removeClass("has-success")
          .addClass("has-error");
      },
      submitHandler: function (e) {
        editarEfemerides();
      },
    }),
  
    // EVENTOS
    $("#formEvetos").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 500,
        },
        txtcategoria: {
          required: true,
          maxlength: 800,
        },
        txtubicacion: {
          required: true,
          maxlength: 800,
        },
        txtorganizadortelefono: {
          required: true,
          maxlength: 800,
        },
        txtorganizadorcorreo: {
          required: true,
          maxlength: 800,
        },
        txtorganizadornombre: {
          required: true,
          maxlength: 800,
        },
        txtfecha: {
          required: true,
          maxlength: 800,
        },
        txthora: {
          required: true,
          maxlength: 800,
        },
        txtimagen: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtlatitud: {
          required: true,
          maxlength: 800,
        },
        txtlongitud: {
          required: true,
          maxlength: 800,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtubicacion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una ubicacion</b>",
        },
        txtorganizadortelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un telefono</b>",
        },
        txtorganizadorcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un correo</b>",
        },
        txtorganizadornombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un nombre</b>",
        },
        txtfecha: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una fecha</b>",
        },
        txthora: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una hora</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtlatitud: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una latitud</b>",
        },
        txtlongitud: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una longitud</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionEventos();
      },
    });
  
    $("#formEventosEditar").validate({
      rules: {
          txttitulo: {
              required: true,
              maxlength: 500,
            },
            txtcategoria: {
              required: true,
              maxlength: 800,
            },
            txtubicacion: {
              required: true,
              maxlength: 800,
            },
            txtorganizadortelefono: {
              required: true,
              maxlength: 800,
            },
            txtorganizadorcorreo: {
              required: true,
              maxlength: 800,
            },
            txtorganizadornombre: {
              required: true,
              maxlength: 800,
            },
            txtfecha: {
              required: true,
              maxlength: 800,
            },
            txthora: {
              required: true,
              maxlength: 800,
            },          
            txtdescripcion: {
              required: true,
            },
            txtlatitud: {
              required: true,
              maxlength: 800,
            },
            txtlongitud: {
              required: true,
              maxlength: 800,
            },
      },
      messages: {
          txttitulo: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
            },
            txtcategoria: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
            },
            txtubicacion: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una ubicacion</b>",
            },
            txtorganizadortelefono: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un telefono</b>",
            },
            txtorganizadorcorreo: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un correo</b>",
            },
            txtorganizadornombre: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un nombre</b>",
            },
            txtfecha: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una fecha</b>",
            },
            txthora: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una hora</b>",
            },          
            txtdescripcion: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
            },
            txtlatitud: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una latitud</b>",
            },
            txtlongitud: {
              required:
                "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una longitud</b>",
            },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionEventos();
      },
    });
    // EVENTOS
  
  
    // ENTES DESCENTRALIZADOS
    $("#formSesionEntesDescentralizados").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 80,
        },
        txtdescripcion: {
          required: true,
          maxlength: 10000,
        },
        txticono: {
          required: true,
          maxlength: 50,
        },
        txtcordinador: {
          maxlength: 70,
        },
        txtnumeroCordinador: {
          maxlength: 70,
        },
        txtcorreo: {
          maxlength: 90,
        },
        txtpaginaweb: {
          maxlength: 150,
        },
        txtdireccion: {
          maxlength: 150,
        },
        txthorarioAdmin: {
          maxlength: 100,
        },
        txthorarioPubli: {
          maxlength: 100,
        },
        txtnumeroEmergencia: {
          maxlength: 100,
        },
        txttwitter: {
          maxlength: 200,
        },
        txtfacebook: {
          maxlength: 200,
        },
        txtinstagram: {
          maxlength: 200,
        },
        txtimagen: {
          required: true,
        }      
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        }      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionEntesDescentralizados();
      },
    });
  
    $("#formSesionEnteDescentralizadosEditar").validate({
      rules: {
        txttitulo: {
          required: true,
          maxlength: 80,
        },
        txtdescripcion: {
          required: true,
          maxlength: 10000,
        },
        txticono: {
          required: true,
          maxlength: 50,
        },
            txtcordinador: {
          maxlength: 70,
        },
        txtnumeroCordinador: {
          maxlength: 70,
        },
        txtcorreo: {
          maxlength: 90,
        },
        txtpaginaweb: {
          maxlength: 150,
        },
        txtdireccion: {
          maxlength: 150,
        },
        txthorarioAdmin: {
          maxlength: 100,
        },
        txthorarioPubli: {
          maxlength: 100,
        },
        txtnumeroEmergencia: {
          maxlength: 100,
        },
        txttwitter: {
          maxlength: 200,
        },
        txtfacebook: {
          maxlength: 200,
        },
        txtinstagram: {
          maxlength: 200,
        },
        // txtimagen: {
        //     required: true
        // }
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txticono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un icono</b>",
        },
        // 'txtimagen':{
        //     required:"<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>"
        // }
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionEntesDescentralizados();
      },
    });
  
    $("#formSesionEnteDescentralizadosDocuemento").validate({
      rules: {
        txttitulodocumento: {
          required: true,
          maxlength: 150,
        },
        documento: {
          required: true,        
        }        
      },
      messages: {
        txttitulodocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        documento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una documento pdf</b>",
        }      
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionEntesDescentralizadosDocumentos();
      },
    });
  
    $("#formSesionEnteDescentralizadosDocuementoE").validate({
      rules: {
        txttitulodocumento: {
          required: true,
          maxlength: 150,
        }          
      },
      messages: {
        txttitulodocumento: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        }        
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        editarSesionEntesDescentralizadosDocumentosE();
      },
    });
    // ENTES DESCENTRALIZADOS
  
  
    // EFEMERIDES
    $("#formSesionCarirubana").validate({
      rules: {
        txttitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtsubtitulo: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcion: {
          required: true,
          minlength: 20,
          maxlength: 120,
        },
        txtcategoria: {
          required: true,
          minlength: 20,
          maxlength: 50,
        },
        txtetiqueta1: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtetiqueta2: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtdescripcionimg: {
          required: true,
          minlength: 20,
          maxlength: 41,
        },
        txtimagen: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtsubtitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un subtítulo</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtcategoria: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una categoria</b>",
        },
        txtetiqueta1: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtetiqueta2: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una etiqueta</b>",
        },
        txtdescripcionimg: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción de imagen</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
      },
      errorPlacement: function (label, element) {
        // render error placement for each input type
        $('<span class="error text-danger"></span>')
          .insertAfter(element)
          .append(label);
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
  
      highlight: function (element) {
        // hightlight error inputs
        var parent = $(element).parent().parent(".form-group");
        parent.removeClass("has-success").addClass("has-error");
      },
      submitHandler: function (form) {
        guardarSesionCariruba();
      },
    });
  
    // $("#formEfemeridesEditar").validate({
    //   rules: {
    //     txttitulo: {
    //       required: true,
    //       minlength: 70,
    //       maxlength: 150,
    //     },
    //     txtdescripcion: {
    //       required: true,
    //       minlength: 20,
    //       maxlength: 320,
    //     },
    //   },
    //   messages: {
    //     txttitulo: {
    //       required:
    //         "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
    //     },
    //     txtdescripcion: {
    //       required:
    //         "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
    //     },
    //   },
    //   errorPlacement: function (label, element) {
    //     // render error placement for each input type
    //     $('<span class="error text-danger"></span>')
    //       .insertAfter(element)
    //       .append(label);
    //     var parent = $(element).parent().parent(".form-group");
    //     parent.removeClass("has-success").addClass("has-error");
    //   },
  
    //   highlight: function (element) {
    //     // hightlight error inputs
    //     var parent = $(element).parent().parent(".form-group");
    //     parent.removeClass("has-success").addClass("has-error");
    //   },
    //   submitHandler: function (form) {
    //     editarEfemerides();
    //   },
    // });
    // EFEMERIDES
  
  
    $("#formpaquete").validate({
      rules: {
        txttitulo: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtprecio: {
          required: true,
        },
        txtimagen: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtprecio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar su precio</b>",
        },
        txtimagen: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una imagen referencial</b>",
        },
      },
      submitHandler: function (form) {
        guardarPaquete();
      },
    });
  
    $("#formpaqueteEditar").validate({
      rules: {
        txttitulo: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtprecio: {
          required: true,
        },
      },
      messages: {
        txttitulo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar un título</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
        txtprecio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar su precio</b>",
        },
      },
      submitHandler: function (form) {
        editarPaquete();
      },
    });
  
    $("#formcategoriaEditar").validate({
      rules: {
        txtdescripcion: {
          required: true,
        },
      },
      messages: {
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px'>Debe ingresar una descripción</b>",
        },
      },
      submitHandler: function (form) {
        editar_datos(
          "editar_tipoCompania",
          "formcategoriaEditar",
          "tb-categorias",
          "editar"
        );
        //alert("Validado");
      },
    });
  
    $("#formucliente").validate({
      rules: {
        txtnombre: {
          required: true,
        },
        txtruc: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtcorreo: {
          required: true,
          email: true,
        },
        txtdireccion: {
          required: true,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su nombre</b>",
        },
        txtruc: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su ruc</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su teléfono</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su correo</b>",
          email:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar un correo ej: correo@correo.com</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su dirección</b>",
        },
      },
      submitHandler: function (form) {
        guardar_datos("guardar_cliente", "formucliente", "tb-clientes", "nuevo");
      },
    });
  
    $("#formeditarcliente").validate({
      rules: {
        txtnombre: {
          required: true,
        },
        txtruc: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtcorreo: {
          required: true,
          email: true,
        },
        txtdireccion: {
          required: true,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su nombre</b>",
        },
        txtruc: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su ruc</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su teléfono</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su correo</b>",
          email:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar un correo ej: correo@correo.com</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su dirección</b>",
        },
      },
      submitHandler: function (form) {
        editar_datos(
          "editar_cliente",
          "formeditarcliente",
          "tb-clientes",
          "editar"
        );
        //alert("Validado");
      },
    });
  
    $("#formperfil").validate({
      rules: {
        txtnombre: {
          required: true,
        },
        txtapellido: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtcorreo: {
          required: true,
        },
        txtdireccion: {
          required: true,
        },
      },
      messages: {
        txtnombre: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su nombre</b>",
        },
        txtapellido: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su apellido</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su teléfono</b>",
        },
        txtcorreo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su correo</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su dirección</b>",
        },
      },
      submitHandler: function (form) {
        guardarperfil();
      },
    });
  
    $("#formproveedor").validate({
      rules: {
        txtempresa: {
          required: true,
        },
        txtcodigo: {
          required: true,
        },
        txtresponsable: {
          required: true,
        },
        txtrazon: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtdireccion: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
      },
      messages: {
        txtempresa: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su empresa</b>",
        },
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su código</b>",
        },
        txtresponsable: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar un responsable</b>",
        },
        txtrazon: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su razón social</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su teléfono</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su dirección</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su descripción</b>",
        },
      },
      submitHandler: function (form) {
        //alert("validado");
        guardar_datos(
          "guardar_proveedor",
          "formproveedor",
          "tb-proveedores",
          "nuevo"
        );
      },
    });
  
    $("#formproveedorEditar").validate({
      rules: {
        txtempresa: {
          required: true,
        },
        txtcodigo: {
          required: true,
        },
        txtresponsable: {
          required: true,
        },
        txtrazon: {
          required: true,
        },
        txttelefono: {
          required: true,
        },
        txtdireccion: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
      },
      messages: {
        txtempresa: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su empresa</b>",
        },
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su código</b>",
        },
        txtresponsable: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar un responsable</b>",
        },
        txtrazon: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su razón social</b>",
        },
        txttelefono: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su teléfono</b>",
        },
        txtdireccion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su dirección</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su descripción</b>",
        },
      },
      submitHandler: function (form) {
        //alert("validado");
        editar_datos(
          "editar_proveedor",
          "formproveedorEditar",
          "tb-proveedores",
          "editar"
        );
      },
    });
  
    jQuery.validator.addMethod(
      "notEqual",
      function (value, element, param) {
        return this.optional(element) || value != $(param).val();
      },
      "This has to be different..."
    );
  
    $("#formcontra").validate({
      rules: {
        txtcontra: {
          required: true,
          minlength: 6,
          maxlength: 20,
        },
        txtnueva1: {
          required: true,
          minlength: 6,
          maxlength: 20,
          notEqual: "#idtxtcontra",
        },
        txtnueva2: {
          required: true,
          equalTo: "#idtxtnueva1",
        },
      },
  
      messages: {
        txtcontra: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su contraseña actual</b>",
          minlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña debe contener al menos 6 digitos</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña no debe contener mas de 20 digitos<bv>",
        },
        txtnueva1: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar una nueva contraseña</b>",
          minlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña debe contener al menos 6 digitos</b>",
          notEqual:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña debe ser distinta a la actual</b>",
          maxlength:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña no debe contener mas de 20 digitos<bv>",
        },
        txtnueva2: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe repetir su contraseña</b>",
          equalTo:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Su contraseña es distinta de la anterior<bv>",
        },
      },
  
      submitHandler: function (form) {
        guardarContra();
      },
    });
  
    $("#formproducto").validate({
      rules: {
        txtcodigo: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtprecio: {
          required: true,
        },
        txtcategoria: {
          valueNotEquals: "0",
        },
        txttipo: {
          valueNotEquals: "0",
        },
      },
      messages: {
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su código</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su descripción</b>",
        },
        txtprecio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su precio</b>",
        },
        txtcategoria: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe seleccionar una categoría</b>",
        },
        txttipo: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe seleccionar un tipo de producto</b>",
        },
      },
      submitHandler: function (form) {
        guardar_producto();
      },
    });
  
    $("#formproductoEditar").validate({
      rules: {
        txtcodigo: {
          required: true,
        },
        txtdescripcion: {
          required: true,
        },
        txtprecio: {
          required: true,
        },
        txtcategoria: {
          valueNotEquals: "0",
        },
        txttipo: {
          valueNotEquals: "0",
        },
      },
      messages: {
        txtcodigo: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su código</b>",
        },
        txtdescripcion: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su descripción</b>",
        },
        txtprecio: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su precio</b>",
        },
        txtcategoria: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe seleccionar una categoría</b>",
        },
        txttipo: {
          valueNotEquals:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe seleccionar un tipo de producto</b>",
        },
      },
      submitHandler: function (form) {
        editar_producto();
      },
    });
  
    $("#formsearch").validate({
      rules: {
        txtdesde: {
          required: true,
        },
        txthasta: {
          required: true,
        },
      },
      messages: {
        txtdesde: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar la fecha de inicio</b>",
        },
        txthasta: {
          required:
            "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar la fecha final</b>",
        },
      },
      submitHandler: function (form) {
        var fechaInicial = $("#id_desde").val();
        var fechaFinal = $("#id_hasta").val();
        valuesStart = moment(fechaInicial).format("DD/MM/YYYY").split("/");
        valuesEnd = moment(fechaFinal).format("DD/MM/YYYY").split("/");
  
        // Verificamos que la fecha no sea posterior a la actual
        var dateStart = new Date(
          valuesStart[2],
          valuesStart[1] - 1,
          valuesStart[0]
        );
        var dateEnd = new Date(valuesEnd[2], valuesEnd[1] - 1, valuesEnd[0]);
        if (dateStart > dateEnd) {
          $("#msgfechaini").css("display", "block");
  
          setTimeout(() => {
            $("#msgfechaini").css("display", "none");
          }, 3000);
        } else {
          ConsultaMasVendidos();
        }
      },
    });
  });
  
  $("#formConfiguracion").validate({
    rules: {
      txtdescripcion: {
        required: true,
      },
      txtimagen: {
        required: true,
      },
    },
    messages: {
      txtdescripcion: {
        required:
          "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su código</b>",
      },
      txtimagen: {
        required:
          "<b style='color: #b648f4; font-size: 10px; position: relative; top: -4.5px;'>Debe ingresar su descripción</b>",
      },
    },
    submitHandler: function (form) {
      guardar_datos(
        "guardar_propiedad",
        "formConfiguracion",
        "tb-propiedades",
        "nuevo"
      );
    },
  });
  
  $("#formuinspeccion").validate({
    rules: {},
    messages: {},
    submitHandler: function (form) {
      guardar_datos(
        "guarda_inspeccion",
        "formuinspeccion",
        "tb-inspeccion",
        "nuevo"
      );
    },
  });
  