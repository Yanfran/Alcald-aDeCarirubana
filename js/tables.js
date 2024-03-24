$(document).ready(function () {
    listarUsuarios("tb-usuarios");
    listarRoles("tb-roles");
    listarBannerPrincipal("tb-banner_principal");
    listarTramitesServicios("tb-tramites-servicios");
    listarCategoriaNoticias("tb-categoria_noticias");
    listarNoticiasPrincipales("tb-noticias-principales");
    listarConociendoCarirubana("tb-conociendo-carirubana");
    listarCategoriaConociendoCarirubana('tb-categoria_conociendo_carirubana');
    listarEntesDescentralizados("tb-entes-descentralizados");
    listarOrdenanzas("tb-multimedia");
    listarSemanario('tb-semanario');
    listarLibrosRevistas('tb-libros-revistas');
    listarEfemerides('tb-efemerides');
    listarCategoriaEventos("tb-categoria_eventos");
    listarEventos("tb-eventos");
  });
  
  
  // ROL
  function listarRoles(tabla) {
    var table = $("#tb-roles").DataTable({
      destroy: true,
      order: [[0, "asc"]],
      ajax: {
        method: "get",
        url: "../apirest/roles.php",
      },
      columns: [
        { data: "descripcion" },
  
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><span class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</span></center>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-danger btn-sm editar' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen' style=''></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableRoles("#tb-roles tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableRoles(tbody, table) {
    $(tbody).on("click", "button.editar", function () {
      $("#formeditarrol")[0].reset();
      var data = table.row($(this).parents("tr")).data();
      act_regs("tabla_vista", "editar_rol", "formrol");
      $("#tb-roles").data("id", data.id);
      $("#idtxtdescripcion").val(data.descripcion);
      $("#formrol").data("conteo", 0);
  
      var total = $("#formrol").data("total");
      for (i = 1; i <= total; i++) {
        $("#check_edit" + i).prop("checked", false);
      }
      var cont = 0;
      for (i = 0; i < data.permisos.length; i++) {
        $("#check_edit" + data.permisos[i].id_permisologia).prop("checked", true);
        //alert(data.permisos[i].C)
        if (data.permisos[i].C == 1) {
          $("#checkEditC" + data.permisos[i].id_permisologia).prop(
            "checked",
            true
          );
        }
        if (data.permisos[i].R == 1) {
          $("#checkEditR" + data.permisos[i].id_permisologia).prop(
            "checked",
            true
          );
        }
        if (data.permisos[i].U == 1) {
          $("#checkEditU" + data.permisos[i].id_permisologia).prop(
            "checked",
            true
          );
        }
        if (data.permisos[i].D == 1) {
          $("#checkEditD" + data.permisos[i].id_permisologia).prop(
            "checked",
            true
          );
        }
        cont = cont + 1;
      }
  
      $("#formrol").data("conteo", cont);
  
      //        $('#editar-rol').modal('show');
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "roles", "id", "tb-roles");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "roles", "id", "tb-roles");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "roles", "id", "tb-roles");
    });
  }
  // ROL
  
  
  // USUARIOS
  function listarUsuarios(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "asc"]],
      ajax: {
        method: "get",
        url: "../apirest/usuarios.php",
      },
      columns: [
        {
          data: null,
          render: function (data) {
            var texto =
              "<center><span class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>" +
              data.nacionalidad +
              "-" +
              data.documento +
              "</span></center>";
            return texto;
          },
        },
        {
          data: null,
          render: function (data) {
            var texto = data.nombre + " " + data.apellido;
            return texto;
          },
        },
        { data: "correo" },
        { data: "descripcion_rol" },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><span class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</span></center>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-danger btn-sm editar' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen' style=''></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableUsuario("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableUsuario(tbody, table) {
    $(tbody).on("click", "button.editar", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#tb-usuarios").data("id", data.id_usuario);
      $("#idtxtdocumento").val(data.documento);
      $("#idnacionalidad option[value=" + data.nacionalidad + "]").attr(
        "selected",
        true
      );
      $("#idtxtnombre").val(data.nombre);
      $("#idtxtapellido").val(data.apellido);
      $("#idtxtfecha").val(data.fecha_nac);
      $("#idtxttelefono").val(data.telefono);
      $("#idtxtcorreo").val(data.correo);
      $("#idtxtdireccion").val(data.direccion);
      $("#idtxtcompania").val(data.id_compania);
      $("#idtxtuser").val(data.usuario);
      $("#idtxtrol option[value=" + data.id_rol + "]").attr("selected", true);
      act_regs("tabla_vista", "editar_usuario", "formusuario");
      //$('#editar-usuario').modal('show');
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id_usuario, "usuario", "id", "tb-usuarios");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id_usuario, "usuario", "id", "tb-usuarios");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id_usuario, "usuario", "id", "tb-usuarios");
    });
  }
  // USUARIOS
  
  // CATEGORIA NOTICIAS
  function listarCategoriaNoticias(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/categoria_noticias.php",
      },
      columns: [
        { data: "id" },
        { data: "descripcion" },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableCategoriaNoticias("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableCategoriaNoticias(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formCategoriaNoticiasEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-categoria_noticias").data("id", data.id);
      $("#tb-categoria_noticias").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.descripcion);
      // $("#idtxtdescripcionE").html(data.descripcion);
      // $("#idtxtcategoriaE").val(data.categoria);
  
      // $("#preview_img").attr('src', '../img/inicio/sesion_noticias_principales/'+data.ruta);
      // $("#enlace_img").attr('href', '../img/inicio/sesion_noticias_principales/'+data.ruta);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "categoria_noticias", "id", "tb-categoria_noticias");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "categoria_noticias", "id", "tb-categoria_noticias");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "categoria_noticias", "id", "tb-categoria_noticias");
    });
  }
  // CATEGORIA NOTICIAS
  
  
  
  // CATEGORIA EVENTOS
  function listarCategoriaEventos(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/categoria_eventos.php",
      },
      columns: [
        { data: "id" },
        { data: "descripcion" },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableCategoriaEventos("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableCategoriaEventos(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formCategoriaEventosEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-categoria_eventos").data("id", data.id);
      $("#tb-categoria_eventos").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.descripcion);
      // $("#idtxtdescripcionE").html(data.descripcion);
      // $("#idtxtcategoriaE").val(data.categoria);
  
      // $("#preview_img").attr('src', '../img/inicio/sesion_noticias_principales/'+data.ruta);
      // $("#enlace_img").attr('href', '../img/inicio/sesion_noticias_principales/'+data.ruta);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "categoria_eventos", "id", "tb-categoria_eventos");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "categoria_eventos", "id", "tb-categoria_eventos");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "categoria_eventos", "id", "tb-categoria_eventos");
    });
  }
  // CATEGORIA EVENTOS
  
  
  
  // CATEGORIA TURISMO => CONOCIENDO CARIRUBANA
  function listarCategoriaConociendoCarirubana(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/categoria_conociendo_carirubana.php",
      },
      columns: [
        { data: "id" },
        { data: "descripcion" },
        {
          data: null,
          render: function (data) {
            var icono =
              "<div class'icon-box'><i style='font-size:40px;' class='" +
              data.icono +
              "'></i></div>";
            return icono;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableCategoriaConociendoCarirubana("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableCategoriaConociendoCarirubana(tbody, table) {
      $(tbody).on("click", "button.info", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#formCategoriaConociendoCarirubanaEditar")[0].reset();
          // console.log(data.descripcion);
  
          $("#tb-categoria_conociendo_carirubana").data("id", data.id);
          $("#tb-categoria_conociendo_carirubana").data("antigua", data.ruta);
  
          $("#idtxttituloE").val(data.descripcion);
          $("#idtxticonoE").val(data.icono);
          $("#idtxtunicoE").val(data.unico);
  
          $("#preview_img").attr('src', '../img/inicio/categoria_img/'+data.ruta);
          $("#enlace_img").attr('href', '../img/inicio/categoria_img/'+data.ruta);
  
          $("#tabla_vista").css("display", "none");
          $("#info_usuario").css("display", "block");
      });
      $(tbody).on("click", "button.activar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(1, data.id, "categoria_conociendo_carirubana", "id", "tb-categoria_conociendo_carirubana");
      });
      $(tbody).on("click", "button.desactivar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(0, data.id, "categoria_conociendo_carirubana", "id", "tb-categoria_conociendo_carirubana");
      });
      $(tbody).on("click", "button.eliminar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(2, data.id, "categoria_conociendo_carirubana", "id", "tb-categoria_conociendo_carirubana");
      });
  }
  // CATEGORIA TURISMO => CONOCIENDO CARIRUBANA
  
  
  
  
  
  // BANNER PRINCIPAL
  function listarBannerPrincipal(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/banner_principal.php",
      },
      columns: [
        { data: "id" },
        // {'data': 'titulo'},
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        // {'data': 'descripcion'},
        {
          data: null,
          render: function (data) {
            var descripcion = "";
            if (data.descripcion.length > 2) {
              return data.descripcion.substring(0, 20) + "...";
            }
            return descripcion;
          },
        },
        // {'data': 'categoria'},
        {
          data: null,
          render: function (data) {
            var categoria = "";
            if (data.categoria.length > 2) {
              return data.categoria.substring(0, 15) + "...";
            }
            return categoria;
          },
        },
        // {
        //   data: null,
        //   render: function (data) {
        //     var img =
        //       "<img src='../img/inicio/banner_principal/" +
        //       data.ruta +
        //       "' style='width: 100px; height: 100px; border-radius: 5px;'></img>";
        //     return img;
        //   },
        // },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableBannerPrincipal("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableBannerPrincipal(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formBannerEditar")[0].reset();
      console.log(data.descripcion);
  
      $("#tb-banner_principal").data("id", data.id);
      $("#tb-banner_principal").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.titulo);
      $("#idtxtdescripcionE").val(data.descripcion);
      $("#idtxtcategoriaE").val(data.categoria);
      $("#idtxturlE").val(data.url);
  
      $("#preview_img").attr(
        "src",
        "../img/inicio/banner_principal/" + data.ruta
      );
      $("#enlace_img").attr(
        "href",
        "../img/inicio/banner_principal/" + data.ruta
      );
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "banner", "id", "tb-banner_principal");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "banner", "id", "tb-banner_principal");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "banner", "id", "tb-banner_principal");
    });
  }
  // BANNER PRINCIPAL
  
  
  // TRAMITES
  function listarTramitesServicios(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/tramites_y_servicios.php",
      },
      columns: [
        { data: "id" },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var icono =
              "<div class'icon-box'><i style='font-size:40px;' class='" +
              data.icono +
              "'></i></div>";
            return icono;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
              var btnDocumento =
              " <button type='button' class='btn btn-secondary btn-sm documentoTramite' data-toggle='tooltip' data-placement='top' title='PDF'><i class='fas fa-file-pdf' style=''></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              btnDocumento +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableTramitesServicios("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableTramitesServicios(tbody, table) {
      $(tbody).on("click", "button.info", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#formSesionTramitesServiciosEditar")[0].reset();
          // console.log(data.descripcion);
  
          $("#tb-tramites-servicios").data("id", data.id);
          $("#tb-tramites-servicios").data("antigua", data.ruta);
  
          $("#idtxtcategoriaE").val(data.categoria);
          $("#idtxttituloE").val(data.titulo);
          // $("#idtxtdescripcionE").html(data.descripcion);
          tinymce.get("idtxtdescripcionE").setContent(data.descripcion);
          $("#idtxticonoE").val(data.icono);
          $("#idtxtcordinadorE").val(data.nombre_cordinador);
          $("#idtxtnumeroCordinadorE").val(data.telefono_cordinador);
          $("#idtxtcorreoE").val(data.correo_cordinador);
          $("#idtxtpaginawebE").val(data.pagina_web);
          $("#idtxtdireccionE").val(data.direccion_fisica);
          $("#idtxthorarioAdminE").val(data.horario_administrativo);
          $("#idtxthorarioPubliE").val(data.horario_publico);
          $("#idtxtnumeroEmergenciaE").val(data.numero_emergencia);
          $("#idtxttwitterE").val(data.twitter);
          $("#idtxtfacebookE").val(data.facebook);
          $("#idtxtinstagramE").val(data.instagram);
          $("#idtxtimaantigua").val(data.ruta_detalle);
  
          $("#preview_img").attr(
            "src",
            "../img/inicio/tramites_servicios/" + data.ruta
          );
          $("#enlace_img").attr(
            "href",
            "../img/inicio/tramites_servicios/" + data.ruta
          );
  
  
          $("#preview_img_detalle").attr(
            "src",
            "../img/inicio/tramites_servicios_img_detalle/" + data.ruta_detalle
          );
          $("#enlace_img_detalle").attr(
            "href",
            "../img/inicio/tramites_servicios_img_detalle/" + data.ruta_detalle
          );
  
          $("#tabla_vista").css("display", "none");
          $("#info_usuario").css("display", "block");
      });
      $(tbody).on("click", "button.activar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(1, data.id, "tramites", "id", "tb-tramites-servicios");
      });
      $(tbody).on("click", "button.desactivar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(0, data.id, "tramites", "id", "tb-tramites-servicios");
      });
      $(tbody).on("click", "button.eliminar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(2, data.id, "tramites", "id", "tb-tramites-servicios");
      });
      ///////////////////// DOCUMENTOS ////////////////////////////
      $(tbody).on("click", "button.documentoTramite", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#tb-tramites-servicios").data("id", data.id);
          $("#tb-tramites-documentos tbody").empty();
          // console.log(data.documentos);
          for (var i = 0; i < data.documentos.length; i++) {
            // console.log(data.documentos[i])
            if (data.documentos[i].status == 0) {
              var status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else {
              var status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
  
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm documentotramite' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminardocumentotramite' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
  
            if (data.documentos[i].status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivardocumentotramite' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.documentos[i].status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activardocumentotramite' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            jQuery("#documentos").append(
              '<tr taskId="' +
                data.documentos[i].id +
                '"><td>' +
                data.documentos[i].id +
                "</td><td>" +
                data.documentos[i].titulo +
                "</td>" +
                "</td><td>" +
                status +
                "</td>" +
                "<td>" +
                btnEditar +
                btnInactivo +
                btnActivo +
                btnEliminar +
                "</td></tr>"
            );
          }
          $("#textiddocumento").val(data.id);
          $("#tabla_vista").css("display", "none");
          $("#info_documento").css("display", "block");
          $("#info_documento_table").css("display", "block");
      });
      $("#documentos").on("click", "button.documentotramite", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          $.post(
            "../apirest/tramites_y_servicios_single.php",
            { id },
            function (response) {
              // console.log(response);
              const documentos = JSON.parse(response);
              $("#idtxttitulodocumentoE").val(documentos.titulo);
              $("#idtxtdocumentoA").val(documentos.ruta);
              $("#textiddocumentoE").val(documentos.id);
            }
          );
          $("#info_documento").css("display", "none");
          $("#info_documento_table").css("display", "none");
          $("#info_documento_editar").css("display", "block");
      });
      $("#documentos").on("click","button.desactivardocumentotramite",function () {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr("taskId");
            // console.log(id);
            status(
              0,
              id,
              "tramites_y_servicios_documentos",
              "id",
              "tb-tramites-servicios"
            );
            setTimeout(() => {
              $("#info_documento_table").css("display", "none");
              $("#info_documento_editar").css("display", "none");
              $("#info_documento").css("display", "none");
              $("#tabla_vista").css("display", "block");
              $("#formSesionTramitesServiciosDocuementoE")[0].reset();
            }, 2000);
      });
      $("#documentos").on("click", "button.activardocumentotramite", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            1,
            id,
            "tramites_y_servicios_documentos",
            "id",
            "tb-tramites-servicios"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServiciosDocuementoE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.eliminardocumentotramite", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            2,
            id,
            "tramites_y_servicios_documentos",
            "id",
            "tb-tramites-servicios"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServiciosDocuementoE")[0].reset();
          }, 2000);
      });
      ///////////////////// DOCUMENTOS ////////////////////////////
  }
  // TRAMITES
  
  
  
  // NOTICIAS PRINCIPALES
  function listarNoticiasPrincipales(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/noticias_principales.php",
      },
      columns: [
        { data: "id" },
        // {
        //   data: null,
        //   render: function (data) {
        //     var img =
        //       "<img src='../img/inicio/sesion_noticias_principales/" +
        //       data.ruta +
        //       "' style='width: 100px; height: 100px; border-radius: 5px;'></img>";
        //     return img;
        //   },
        // },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        // {'data': 'descripcion'},
        { data: "categoria" },
        { data: "fecha" },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            var btnImg =
              " <button type='button' class='btn btn-secondary btn-sm img' data-toggle='tooltip' data-placement='top' title='Galería de imágenes'><i class='fas fa-file-image' style=''></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              btnImg +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableNoticiasPrincipales("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableNoticiasPrincipales(tbody, table) {
      $(tbody).on("click", "button.info", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#formNoticiasPrincipalesEditar")[0].reset();
          // console.log(data.descripcion);
          // console.log(data.id_categoria);
  
          $("#tb-noticias-principales").data("id", data.id);
          $("#tb-noticias-principales").data("antigua", data.ruta);
  
          $("#idtxttituloE").val(data.titulo);
          // $("#idtxtdescripcionE").html(data.descripcion);
          tinymce.get("idtxtdescripcionE").setContent(data.descripcion);;
          // $("#idtxtcategoriaE").val(data.categoria);
          $("#idtxtcategoriaE option[value=" + data.id_categoria + "]").attr(
            "selected",
            true
          );
          $("#idtxtperiodistaE").val(data.periodista);
          $("#idtxtfotografoE").val(data.fotografo);
  
          $("#preview_img").attr(
            "src",
            "../img/inicio/sesion_noticias_principales/" + data.ruta
          );
          $("#enlace_img").attr(
            "href",
            "../img/inicio/sesion_noticias_principales/" + data.ruta
          );
  
          $("#tabla_vista").css("display", "none");
          $("#info_usuario").css("display", "block");
      });
      $(tbody).on("click", "button.activar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(1, data.id, "noticias", "id", "tb-noticias-principales");
      });
      $(tbody).on("click", "button.desactivar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(0, data.id, "noticias", "id", "tb-noticias-principales");
      });
      $(tbody).on("click", "button.eliminar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(2, data.id, "noticias", "id", "tb-noticias-principales");
      });
        ///////// DETALLE IMAGENES ////////////
      $(tbody).on("click", "button.img", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#tb-noticias-principales").data("id", data.id);
          $("#tb-noticias_img tbody").empty();
          console.log(data.id);
          for (var i = 0; i < data.imagenes.length; i++) {
            // console.log(data.imagenes[i])
            if (data.imagenes[i].status == 0) {
              var status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else {
              var status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
  
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm imgdetallenoticiaimg' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminarnoticiaimg' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            if (data.imagenes[i].status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivarnoticiaimg' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.imagenes[i].status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activardonoticiaimg' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            jQuery("#documentos").append(
              '<tr taskId="' +
                data.imagenes[i].id +
                '"><td>' +
                data.imagenes[i].id +
                '</td><td><img src="../img/inicio/sesion_noticias_principales_img/' +
                data.imagenes[i].ruta +
                '" style="width: 100px; height: 100px; border-radius: 5px;"></img></td>' +
                "</td><td>" +
                status +
                "</td>" +
                "<td>" +
                btnEditar +
                btnInactivo +
                btnActivo +
                btnEliminar +
                "</td></tr>"
            );
          }
          $("#textiddocumento").val(data.id);
          $("#tabla_vista").css("display", "none");
          $("#info_documento").css("display", "block");
          $("#info_documento_table").css("display", "block");
      });
      $("#documentos").on("click", "button.imgdetallenoticiaimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          $.post(
            "../apirest/noticias_principales_single.php",
            { id },
            function (response) {
              // console.log(response);
              const documentos = JSON.parse(response);
              $("#idtxtdocumentoI").val(documentos.ruta);
              $("#textiddocumentoI").val(documentos.id);
              $("#preview_img").attr(
                "src",
                "../img/inicio/sesion_noticias_principales_img/" + documentos.ruta
              );
              $("#enlace_img").attr(
                "href",
                "../img/inicio/sesion_noticias_principales_img/" + documentos.ruta
              );
            }
          );
          $("#info_documento").css("display", "none");
          $("#info_documento_table").css("display", "none");
          $("#info_documento_editar").css("display", "block");
      });
      $("#documentos").on("click", "button.desactivarnoticiaimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            0,
            id,
            "noticias_principales_imagenes",
            "id",
            "tb-noticias-principales"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionNoticiasImagenesE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.activardonoticiaimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            1,
            id,
            "noticias_principales_imagenes",
            "id",
            "tb-noticias-principales"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionNoticiasImagenesE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.eliminarnoticiaimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            2,
            id,
            "noticias_principales_imagenes",
            "id",
            "tb-noticias-principales"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionNoticiasImagenesE")[0].reset();
          }, 2000);
      });
      ///////// DETALLE IMAGENES ////////////
  }
  // NOTICIAS PRINCIPALES
  
  
  
  // TURISMO => CONOCIENDO CARIRUBANA
  function listarConociendoCarirubana(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/conociendo_carirubana.php",
      },
      columns: [
        { data: 'id' },
        { data: "titulo" },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
              var btnImg =
              " <button type='button' class='btn btn-secondary btn-sm img' data-toggle='tooltip' data-placement='top' title='Galería de imágenes'><i class='fas fa-file-image' style=''></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              btnImg +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosTableConociendoCarirubana("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableConociendoCarirubana(tbody, table) {
      $(tbody).on("click", "button.info", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#formSesionConociendoCarirubanaEditar")[0].reset();
          console.log(data.descripcion);
  
          $("#tb-conociendo-carirubana").data("id", data.id);
          $("#tb-conociendo-carirubana").data("antigua", data.ruta);
  
          $("#idtxttituloE").val(data.titulo);
          $("#idtxtdescripcionE").val(data.descripcion);
          $("#idtxtdireccionE").val(data.direccion);
          $("#idtxthorarioE").val(data.horario);
          $("#idtxtentradaE").val(data.entrada);
          // $("#idtxticonoE").val(data.icono);
          $("#idtxtcategoriaE option[value=" + data.id_categoria + "]").attr(
            "selected",
            true
          );
  
          $("#preview_img").attr(
            "src",
            "../img/inicio/turismo/" + data.ruta
          );
          $("#enlace_img").attr(
            "href",
            "../img/inicio/turismo/" + data.ruta
          );
  
          $("#tabla_vista").css("display", "none");
          $("#info_usuario").css("display", "block");
      });
      $(tbody).on("click", "button.activar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            1,
            data.id,
            "turismo",
            "id",
            "tb-conociendo-carirubana"
          );
      });
      $(tbody).on("click", "button.desactivar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            0,
            data.id,
            "turismo",
            "id",
            "tb-conociendo-carirubana"
          );
      });
      $(tbody).on("click", "button.eliminar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            2,
            data.id,
            "turismo",
            "id",
            "tb-conociendo-carirubana"
          );
      });
      ///////// DETALLE IMAGENES ////////////
      $(tbody).on("click", "button.img", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#tb-conociendo-carirubana").data("id", data.id);
          $("#myTableId tbody").empty();
          console.log(data.id);
          for (var i = 0; i < data.imagenes.length; i++) {
            // console.log(data.imagenes[i])
            if (data.imagenes[i].status == 0) {
              var status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else {
              var status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
  
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm imgdetalle' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminarimg' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            if (data.imagenes[i].status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivarimg' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.imagenes[i].status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activardoimg' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            jQuery("#documentos").append(
              '<tr taskId="' +
                data.imagenes[i].id +
                '"><td>' +
                data.imagenes[i].id +
                '</td><td><img src="../img/inicio/turismo_img/' +
                data.imagenes[i].ruta +
                '" style="width: 100px; height: 100px; border-radius: 5px;"></img></td>' +
                "</td><td>" +
                status +
                "</td>" +
                "<td>" +
                btnEditar +
                btnInactivo +
                btnActivo +
                btnEliminar +
                "</td></tr>"
            );
          }
          $("#textiddocumento").val(data.id);
          $("#tabla_vista").css("display", "none");
          $("#info_documento").css("display", "block");
          $("#info_documento_table").css("display", "block");
      });
      $("#documentos").on("click", "button.imgdetalle", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          $.post(
            "../apirest/conociendo_carirubana_single.php",
            { id },
            function (response) {
              // console.log(response);
              const documentos = JSON.parse(response);
              $("#idtxtdocumentoI").val(documentos.ruta);
              $("#textiddocumentoI").val(documentos.id);
              $("#preview_img").attr(
                "src",
                "../img/inicio/turismo_img/" + documentos.ruta
              );
              $("#enlace_img").attr(
                "href",
                "../img/inicio/turismo_img/" + documentos.ruta
              );
            }
          );
          $("#info_documento").css("display", "none");
          $("#info_documento_table").css("display", "none");
          $("#info_documento_editar").css("display", "block");
      });
      $("#documentos").on("click", "button.desactivarimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            0,
            id,
            "conociendo_carirubana_imagenes",
            "id",
            "tb-conociendo-carirubana"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubanaImagenesE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.activardoimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            1,
            id,
            "conociendo_carirubana_imagenes",
            "id",
            "tb-conociendo-carirubana"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubanaImagenesE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.eliminarimg", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            2,
            id,
            "conociendo_carirubana_imagenes",
            "id",
            "tb-conociendo-carirubana"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubanaImagenesE")[0].reset();
          }, 2000);
      });
      ///////// DETALLE IMAGENES ////////////
  }
  // TURISMO => CONOCIENDO CARIRUBANA
  
  
  // ORDENANZAS
  function listarOrdenanzas(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/ordenanzas.php",
      },
      columns: [
        { data: "id" },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosOrdenanzas("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosOrdenanzas(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formMultimediaEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-multimedia").data("id", data.id);
      $("#tb-multimedia").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.titulo);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "ordenanzas", "id", "tb-multimedia");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "ordenanzas", "id", "tb-multimedia");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "ordenanzas", "id", "tb-multimedia");
    });
  }
  // ORDENANZAS
  
  
  // SEMANARIO
  function listarSemanario(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/semanario.php",
      },
      columns: [
        { data: "id" },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosSemanario("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosSemanario(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formSemanarioEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-semanario").data("id", data.id);
      $("#tb-semanario").data("antigua", data.ruta);
      $("#idtxttituloE").val(data.titulo);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "semanario", "id", "tb-semanario");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "semanario", "id", "tb-semanario");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "semanario", "id", "tb-semanario");
    });
  }
  // SEMANARIO
  
  
  
  // LIBROS Y REVISTAS
  function listarLibrosRevistas(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/libros_revistas.php",
      },
      columns: [
        { data: "id" },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosLibrosRevistas("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosLibrosRevistas(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formLibrosRevistasEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-libros-revistas").data("id", data.id);
      $("#tb-libros-revistas").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.titulo);
      $("#txtdocumentoA").val(data.documento);
  
      $("#preview_img").attr("src", "../img/inicio/sesion_libros_revistas/caratula/" + data.ruta);
      $("#enlace_img").attr("href", "../img/inicio/sesion_libros_revistas/caratula/" + data.ruta);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "libros", "id", "tb-libros-revistas");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "libros", "id", "tb-libros-revistas");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "libros", "id", "tb-libros-revistas");
    });
  }
  // LIBROS Y REVISTAS
  
  // EFEMERIDES
  function listarEfemerides(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/efemerides.php",
      },
      columns: [
        { data: "id" },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var descripcion = "";
            if (data.descripcion.length > 2) {
              return data.descripcion.substring(0, 20) + "...";
            }
            return descripcion;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosEfemerides("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosEfemerides(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formEfemeridesEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-efemerides").data("id", data.id);
      $("#tb-efemerides").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.titulo);
      $("#idtxtdescripcionE").val(data.descripcion);
      $("#idtxturlE").val(data.url);
  
      $("#preview_img").attr("src", "../img/inicio/efemerides/" + data.ruta);
      $("#enlace_img").attr("href", "../img/inicio/efemerides/" + data.ruta);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "efemerides", "id", "tb-efemerides");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "efemerides", "id", "tb-efemerides");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "efemerides", "id", "tb-efemerides");
    });
  }
  // EFEMERIDES
  
  // EVENTOS
  function listarEventos(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/eventos.php",
      },
      columns: [
        { data: "id" },
        // {
        //   data: null,
        //   render: function (data) {
        //     var img =
        //       "<img src='../img/inicio/sesion_eventos/" +
        //       data.ruta +
        //       "' style='width: 100px; height: 100px; border-radius: 5px;'></img>";
        //     return img;
        //   },
        // },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 2) {
              return data.titulo.substring(0, 20) + "...";
            }
            return titulo;
          },
        },
        {data: "categoria"},
        // {
        //   data: null,
        //   render: function (data) {
        //     var ubicacion = "";
        //     if (data.ubicacion.length > 5) {
        //       return data.ubicacion.substring(0, 20) + "...";
        //     }
        //     return ubicacion;
        //   },
        // },
        { data: "fecha" },
        {
          data: null,
          render: function (data) {
            var nombre_organizador = "";
            if (data.nombre_organizador.length > 2) {
              return data.nombre_organizador.substring(0, 20) + "...";
            }
            return nombre_organizador;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
    obtenerDatosEventos("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosEventos(tbody, table) {
    $(tbody).on("click", "button.info", function () {
      var data = table.row($(this).parents("tr")).data();
      $("#formEventosEditar")[0].reset();
      // console.log(data.descripcion);
  
      $("#tb-eventos").data("id", data.id);
      $("#tb-eventos").data("antigua", data.ruta);
  
      $("#idtxttituloE").val(data.titulo);
      // $("#idtxtcategoriaE").val(data.categoria);
      $("#idtxtcategoriaE option[value=" + data.id_categoria + "]").attr(
            "selected",
            true
      );
      $("#idtxtubicacionE").val(data.ubicacion);
      $("#idtxtorganizadortelefonoE").val(data.telefono_organizador);
      $("#idtxtorganizadorcorreoE").val(data.correo_organizador);
      $("#idtxtorganizadornombreE").val(data.nombre_organizador);
      $("#fp-defaultE").val(data.fecha);
      $("#fp-timeE").val(data.hora);
      // $("#idtxtdescripcionE").val(data.descripcion);
      tinymce.get("idtxtdescripcionE").setContent(data.descripcion);;
      $("#idtxtlatitudE").val(data.latitud);
      $("#idtxtlongitudE").val(data.longitud);
  
      $("#preview_img").attr("src", "../img/inicio/sesion_eventos/" + data.ruta);
      $("#enlace_img").attr("href", "../img/inicio/sesion_eventos/" + data.ruta);
  
      $("#tabla_vista").css("display", "none");
      $("#info_usuario").css("display", "block");
    });
    $(tbody).on("click", "button.activar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(1, data.id, "eventos", "id", "tb-eventos");
    });
    $(tbody).on("click", "button.desactivar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(0, data.id, "eventos", "id", "tb-eventos");
    });
    $(tbody).on("click", "button.eliminar", function () {
      var data = table.row($(this).parents("tr")).data();
      status(2, data.id, "eventos", "id", "tb-eventos");
    });
  }
  // EVENTOS
  
  
  // ENTES DESCENTRALIZADOS
  function listarEntesDescentralizados(tabla) {
    var table = $("#" + tabla).DataTable({
      destroy: true,
      order: [[0, "desc"]],
      ajax: {
        method: "get",
        url: "../apirest/entes_descentralizados.php",
      },
      columns: [
        { data: "id" },
        // {
        //   data: null,
        //   render: function (data) {
        //     var img =
        //       "<img src='../img/inicio/sesion_entes_descentralizados/" +
        //       data.ruta +
        //       "' style='width: 100px; height: 100px; border-radius: 5px;'></img>";
        //     return img;
        //   },
        // },
        {
          data: null,
          render: function (data) {
            var titulo = "";
            if (data.titulo.length > 0) {
              return data.titulo.substring(0, 40) + "...";
            }
            return titulo;
          },
        },
        {
          data: null,
          render: function (data) {
            var icono =
              "<div class'icon-box'><i style='font-size:40px;' class='" +
              data.icono +
              "'></i></div>";
            return icono;
          },
        },
        {
          data: null,
          render: function (data) {
            var status = "";
            if (data.status == 0) {
              status =
                "<div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else if (data.status == 1) {
              status =
                "<span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span>";
            }
            return status;
          },
        },
        {
          data: null,
          render: function (data) {
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm info' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnActivo = "",
              btnInactivo = "";
            if (data.status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivar' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activar' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminar' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            var btnDocumento =
              " <button type='button' class='btn btn-secondary btn-sm documento' data-toggle='tooltip' data-placement='top' title='Documentos'><i class='fas fa-file-pdf' style=''></i></button>";
            return (
              "<center>" +
              btnEditar +
              btnActivo +
              btnInactivo +
              btnEliminar +
              btnDocumento +
              "</center>"
            );
          },
        },
      ],
      responsive: true,
      language: idioma,
    });
  
    obtenerDatosTableEntesDescentralizados("#" + tabla + " tbody", table);
    $("#" + tabla + "_filter").css("float", "right");
    $("#" + tabla + "_paginate").css("float", "right");
    $("#" + tabla + "_paginate").css("margin-bottom", "10px");
  }
  function obtenerDatosTableEntesDescentralizados(tbody, table) {
      $(tbody).on("click", "button.info", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#formSesionEnteDescentralizadosEditar")[0].reset();
          // console.log(data.descripcion);
  
          $("#tb-entes-descentralizados").data("id", data.id);
          $("#tb-entes-descentralizados").data("antigua", data.ruta);
  
          $("#idtxttituloE").val(data.titulo);
          tinymce.get("idtxtdescripcionE").setContent(data.descripcion);
          // console.log(data.descripcion);
          // $("#idtxtdescripcionE").html(data.descripcion);
  
          $("#idtxtcategoriaE").val(data.categoria);
          $("#idtxticonoE").val(data.icono);
          $("#idtxtcordinadorE").val(data.nombre_cordinador);
          $("#idtxtnumeroCordinadorE").val(data.telefono_cordinador);
          $("#idtxtcorreoE").val(data.correo_cordinador);
          $("#idtxtpaginawebE").val(data.pagina_web);
          $("#idtxtdireccionE").val(data.direccion_fisica);
          $("#idtxthorarioAdminE").val(data.horario_administrativo);
          $("#idtxthorarioPubliE").val(data.horario_publico);
          $("#idtxtnumeroEmergenciaE").val(data.numero_emergencia);
          $("#idtxttwitterE").val(data.twitter);
          $("#idtxtfacebookE").val(data.facebook);
          $("#idtxtinstagramE").val(data.instagram);
  
  
          $("#preview_img").attr(
            "src",
            "../img/inicio/sesion_entes_descentralizados/" + data.ruta
          );
          $("#enlace_img").attr(
            "href",
            "../img/inicio/sesion_entes_descentralizados/" + data.ruta
          );
  
          $("#tabla_vista").css("display", "none");
          $("#info_usuario").css("display", "block");
      });
      $(tbody).on("click", "button.activar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            1,
            data.id,
            "entes",
            "id",
            "tb-entes-descentralizados"
          );
      });
      $(tbody).on("click", "button.desactivar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            0,
            data.id,
            "entes",
            "id",
            "tb-entes-descentralizados"
          );
      });
      $(tbody).on("click", "button.eliminar", function () {
          var data = table.row($(this).parents("tr")).data();
          status(
            2,
            data.id,
            "entes",
            "id",
            "tb-entes-descentralizados"
          );
      });
      ///////////////////// DOCUMENTOS ////////////////////////////
      $(tbody).on("click", "button.documento", function () {
          var data = table.row($(this).parents("tr")).data();
          $("#tb-entes-descentralizados").data("id", data.id);
          $("#myTableId tbody").empty();
          // console.log(data.documentos);
          for (var i = 0; i < data.documentos.length; i++) {
            // console.log(data.documentos[i])
            if (data.documentos[i].status == 0) {
              var status =
                "<center><div class='badge badge-pill badge-dark' style='border-radius:3px;cursor:default;'>Inactivo</div>";
            } else {
              var status =
                "<center><span class='badge badge-pill badge-primary' style='border-radius:3px;cursor:default;'>Activo</span></center>";
            }
  
            var btnEditar =
              "<button type='button' class='btn btn-warning btn-sm documentodetalle' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fas fa-pen'></i></button>";
            var btnEliminar =
              " <button type='button' class='btn btn-dark btn-sm eliminardocumentodetalle' data-toggle='tooltip' data-placement='top' title='Eliminar'><i class='fas fa-trash-alt'></i></button>";
            if (data.documentos[i].status == 1) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm' style='cursor:not-allowed;'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm desactivardocumentodetalle' data-toggle='tooltip' data-placement='top' title='Desactivar'><i class='fas fa-times'></i></button>";
            }
  
            if (data.documentos[i].status == 0) {
              var btnActivo =
                " <button type='button' class='btn btn-primary btn-sm activardocumentodetalle' data-toggle='tooltip' data-placement='top' title='Activar'><i class='fas fa-check'></i></button>";
              var btnInactivo =
                " <button type='button' class='btn btn-secondary btn-sm' style='cursor:not-allowed;'><i class='fas fa-times'></i></button>";
            }
  
            jQuery("#documentos").append(
              '<tr taskId="' +
                data.documentos[i].id +
                '"><td>' +
                data.documentos[i].id +
                "</td><td>" +
                data.documentos[i].titulo +
                "</td>" +
                "</td><td>" +
                status +
                "</td>" +
                "<td>" +
                btnEditar +
                btnInactivo +
                btnActivo +
                btnEliminar +
                "</td></tr>"
            );
          }
          $("#textiddocumento").val(data.id);
          $("#tabla_vista").css("display", "none");
          $("#info_documento").css("display", "block");
          $("#info_documento_table").css("display", "block");
      });
      $("#documentos").on("click", "button.documentodetalle", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          $.post(
            "../apirest/entes_descentralizados_single.php",
            { id },
            function (response) {
              // console.log(response);
              const documentos = JSON.parse(response);
              $("#idtxttitulodocumentoE").val(documentos.titulo);
              $("#idtxtdocumentoA").val(documentos.ruta);
              $("#textiddocumentoE").val(documentos.id);
            }
          );
          $("#info_documento").css("display", "none");
          $("#info_documento_table").css('display', 'none');
          $("#info_documento_editar").css("display", "block");
      });
      $("#documentos").on("click","button.desactivardocumentodetalle",function () {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr("taskId");
            // console.log(id);
            status(
              0,
              id,
              "entes_descentralizados_documentos",
              "id",
              "tb-entes-descentralizados"
            );
            setTimeout(() => {
              $("#info_documento_table").css("display", "none");
              $("#info_documento_editar").css("display", "none");
              $("#info_documento").css("display", "none");
              $("#tabla_vista").css("display", "block");
              $("#formSesionEnteDescentralizadosDocuementoE")[0].reset();
            }, 2000);
      });
      $("#documentos").on("click", "button.activardocumentodetalle", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            1,
            id,
            "entes_descentralizados_documentos",
            "id",
            "tb-entes-descentralizados"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionEnteDescentralizadosDocuementoE")[0].reset();
          }, 2000);
      });
      $("#documentos").on("click", "button.eliminardocumentodetalle", function () {
          let element = $(this)[0].parentElement.parentElement;
          let id = $(element).attr("taskId");
          // console.log(id);
          status(
            2,
            id,
            "entes_descentralizados_documentos",
            "id",
            "tb-entes-descentralizados"
          );
          setTimeout(() => {
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionEnteDescentralizadosDocuementoE")[0].reset();
          }, 2000);
      });
      ///////////////////// DOCUMENTOS ////////////////////////////
  }
  // ENTES DESCENTRALIZADOS
  
  
  
  function consultarIP(ip) {
    $("#tabla_vista").css("display", "none");
    $("#nuevo_paquete").css("display", "block");
    //alert(ip);
    $.ajax({
      url: "../php/obtener_coordenadas.php?ip=" + ip,
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      var resp = JSON.parse(res);
      console.log(resp);
      var ubicacion =
        resp.geoplugin_city +
        ", " +
        resp.geoplugin_region +
        ", " +
        resp.geoplugin_countryName;
      var latitud = resp.geoplugin_latitude;
      var longitud = resp.geoplugin_longitude;
      $("#idtxtdireccion").val(ubicacion);
      coords = {
        lng: longitud,
        lat: latitud,
      };
      setMapa(coords);
      setTimeout(() => {
        //$(".dismissButton").click();
      }, 500);
    });
  
    /*$.ajax({
                      url: "http://www.geoplugin.net/php.gp?ip='"+ip+"'",
                      type: "post",
                      dataType: "html",
                      cache: false,
                      contentType: false,
             processData: false
                  })
                      .done(function(res){
                          console.log(res);
                          console.log(res[20]);
                      });*/
  }
  
  function status(valor, id_t, tabla, campoid, tb) {
    var valor = valor;
  
    var id_t = id_t;
    var tabla = tabla;
    var campoid = campoid;
  
    var tb = tb;
  
    var msj_sup = "¿Está seguro?";
  
    if (valor == 1) {
      var msj_inf = "¡El registro seleccionado sera activado!";
      var msj_final = "¡El registro seleccionado ha sido activado con éxito!";
      btnmsj = "Si, activar";
  
      swal({
        title: msj_sup,
        text: msj_inf,
        icon: "warning",
        buttons: {
          cancel: "Cancelar",
          confirm: {
            text: btnmsj,
            className: "btn-primary",
          },
        },
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:
              "../php/status.php?tabla=" +
              tabla +
              "&valor=" +
              valor +
              "&campoid=" +
              campoid +
              "&id_t=" +
              id_t,
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
            $.notify({
              icon: 'la flaticon-success',
              title: 'Activado con éxito!',
              message: msj_final,
            },{
              type: 'info',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#" + tb)
              .DataTable()
              .ajax.reload();
            setTimeout(() => {
              $('[data-toggle="tooltip"]').tooltip();
            }, 1000);
          });
        } else {
        }
      });
    } else if (valor == 0) {
      var msj_inf = "¡El registro seleccionado sera desactivado!";
      var msj_final = "¡El registro seleccionado ha sido desactivado con éxito!";
      btnmsj = "Si, desactivar";
  
      swal({
        title: msj_sup,
        text: msj_inf,
        icon: "warning",
        buttons: {
          cancel: "Cancelar",
          confirm: {
            text: btnmsj,
            className: "btn-secondary",
          },
        },
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:
              "../php/status.php?tabla=" +
              tabla +
              "&valor=" +
              valor +
              "&campoid=" +
              campoid +
              "&id_t=" +
              id_t,
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
  
            $.notify({
              icon: 'la flaticon-success',
              title: 'Desactivado con éxito!',
              message: msj_final,
            },{
              type: 'success',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
  
            $("#" + tb)
              .DataTable()
              .ajax.reload();
            setTimeout(() => {
              $('[data-toggle="tooltip"]').tooltip();
            }, 1000);
          });
        } else {
        }
      });
    } else if (valor == 2) {
      var msj_inf = "¡El registro seleccionado sera eliminado!";
      var msj_final = "¡El registro seleccionado ha sido eliminado con éxito!";
      btnmsj = "Si, eliminar";
  
      swal({
        title: msj_sup,
        text: msj_inf,
        icon: "warning",
        buttons: {
          cancel: "Cancelar",
          confirm: {
            text: btnmsj,
            className: "sweet-eliminar",
          },
        },
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url:
              "../php/status.php?tabla=" +
              tabla +
              "&valor=" +
              valor +
              "&campoid=" +
              campoid +
              "&id_t=" +
              id_t,
            type: "post",
            dataType: "html",
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
  
            $.notify({
              icon: 'la flaticon-success',
              title: 'Eliminado con éxito!',
              message: msj_final,
            },{
              type: 'warning',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#" + tb)
              .DataTable()
              .ajax.reload();
            setTimeout(() => {
              $('[data-toggle="tooltip"]').tooltip();
            }, 1000);
          });
        } else {
        }
      });
    }
  }
  
  var idioma = {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo:
      "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending: ": Activar para ordenar la columna de manera descendente",
    },
  };
  
  function MaysPrimera(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
  