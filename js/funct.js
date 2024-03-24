function linked(ctrl) {

    $("#loading").css("display","block");
  
    var url = "../" + $("#" + ctrl.attr("id")).data("url");
    var li = $("#" + ctrl.attr("id")).data("li");
    $.ajax({
      url: url,
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      $("li").removeClass("active");
      $("#" + li).addClass("active");
      $("#dash").html("" + res);
  
      $("#userSettings").data("id", 0);
      if (li == "li_pedidos") {
        $("#userSettings").data("id", 1);
      }
  
      $("#loading").css("display","none");
      
    });
  
  }
  
  function linked2(url) {
    $.ajax({
      url: url,
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      $("#dash").html("" + res);
      $("#userSettings").data("id", 0);
    });
  }
  
  function datas() {
    /*if($('#dash_empresa').length>0){
          $('#dash_empresa').data('url','vistas/empresa.php');
          $('#menu_empresa').data('url','vistas/empresa.php');
      }
      */
  
    $("#menu_inicio").data("url", "vistas/dash.php");
    $("#menu_inicio").data("li", "li_dash");
  
    if ($("#menu_usuarios").length > 0) {
      $("#menu_usuarios").data("url", "vistas/usuarios.php");
      $("#menu_usuarios").data("li", "li_configuracion");
    }
  
    if ($("#menu_banner").length > 0) {
      $("#menu_banner").data("url", "vistas/banner_principal.php");
      $("#menu_banner").data("li", "li_banner");
    }
  
    if ($("#menu_alcalde").length > 0) {
      $("#menu_alcalde").data("url", "vistas/alcalde.php" );
      $("#menu_alcalde").data("li", "li_alcalde");
    }
  
    if ($("#menu_tramites").length > 0) {
      $("#menu_tramites").data("url", "vistas/tramites_y_servicios.php");
      $("#menu_tramites").data("li", "li_tramites");
    }
  
    if ($("#menu_noticias").length > 0) {
      $("#menu_noticias").data("url", "vistas/noticias_principales.php");
      $("#menu_noticias").data("li", "li_noticias");
    }
  
    if ($("#menu_turismo").length > 0) {
      $("#menu_turismo").data("url", "vistas/conociendo_carirubana.php");
      $("#menu_turismo").data("li", "li_turismo");
    }
  
    if ($("#menu_ordenanzas").length > 0) {
      $("#menu_ordenanzas").data("url", "vistas/ordenanzas.php");
      $("#menu_ordenanzas").data("li", "li_ordenanzas");
    }
  
    if ($("#menu_semanario").length > 0) {
      $("#menu_semanario").data("url", "vistas/semanario.php");
      $("#menu_semanario").data("li", "li_semanario");
    }
  
    if ($("#menu_libros").length > 0) {
      $("#menu_libros").data("url", "vistas/libros_revistas.php");
      $("#menu_libros").data("li", "li_libros");
    }
  
    if ($("#menu_eventos").length > 0) {
      $("#menu_eventos").data("url", "vistas/eventos.php");
      $("#menu_eventos").data("li", "li_eventos");
    }
  
    if ($("#menu_entes").length > 0) {
      $("#menu_entes").data("url", "vistas/entes_descentralizados.php");
      $("#menu_entes").data("li", "li_entes");
    }
  
    if ($("#menu_efemerides").length > 0) {
      $("#menu_efemerides").data("url", "vistas/efemerides.php");
      $("#menu_efemerides").data("li", "li_efemerides");
    }
  
    if ($("#menu_categoria_noticias").length > 0) {
      $("#menu_categoria_noticias").data("url", "vistas/categoria_noticias.php");
      $("#menu_categoria_noticias").data("li", "li_categorias");
    }
  
    if ($("#menu_categoria_eventos").length > 0) {
      $("#menu_categoria_eventos").data("url", "vistas/categoria_eventos.php");
      $("#menu_categoria_eventos").data("li", "li_categorias");
    }
  
    if ($("#menu_categoria_conociendo_carirubana").length > 0) {
      $("#menu_categoria_conociendo_carirubana").data("url", "vistas/categoria_conociendo_carirubana.php");
      $("#menu_categoria_conociendo_carirubana").data("li", "li_categorias");
    }
  
    if ($("#menu_roles").length > 0) {
      $("#menu_roles").data("url", "vistas/roles.php");
      $("#menu_roles").data("li", "li_configuracion");
    }
  }
  
  function guardarperfil(){
  
    swal({
        title: "¿Está seguro?",
        text: "¡Los datos ingresados seran editados!",
        icon: "warning",
        buttons: {
          cancel: "Cancelar",
          confirm: {
            text: "Si, Editar",
            className:'btn-primary',
          },
        },
      })
      .then((willDelete) => {
          if (willDelete) {
              var formData = new FormData(document.getElementById("formeditarperfil"));
              $.ajax({
                url: "../php/guardar_perfil.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res){
            if(res==1){
              $.notify({
                icon: 'flaticon-alarm-1',
                title: 'Guardado exitosamente',
                message: 'Sus datos han sido registrado exitosamente!',
              },{
                type: 'secondary',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
            }else if(res==2){
            alert("Ha ocurrido un error, intente de nuevo");
  
            }
        });
  
      }
    });
  }
  
  function guardarContra() {
    swal({
      title: "¿Está seguro?",
      text: "¡Los datos ingresados seran editados!",
      icon: "warning",
      buttons: {
        cancel: "Cancelar",
        confirm: {
          text: "Si, Editar",
          className: "btn-primary",
        },
      },
    }).then((willDelete) => {
      if (willDelete) {
        var formData = new FormData(document.getElementById("formcontra"));
        $.ajax({
          url: "../php/editar_contra.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        })
        .done(function (res) {
          if (res == 1) {
  
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Guardado exitosamente',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#formcontra")[0].reset();
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          } else if (res == 0) {
            alert("Las contraseñas ingresadas no son iguales");
          }
        });
      }
    });
  }
  
  
  
  
  function cancelarperfil() {
    swal({
      title: "¿Está seguro?",
      text: "¡La operación será cancelada!",
      icon: "warning",
      buttons: {
        cancel: "No",
        danger: "Si",
      },
    }).then((willDelete) => {
      if (willDelete) {
        //showErrorMessage("Su operación ha sido cancelada");
        $("#menu_inicio").click();
      } else {
      }
    });
  }
  
  function CancelarCambiarContraseña() {
    swal({
      title: "¿Está seguro?",
      text: "¡La operación será cancelada!",
      icon: "warning",
      buttons: {
        cancel: "No",
        danger: "Si",
      },
    }).then((willDelete) => {
      if (willDelete) {
        //showErrorMessage("Su operación ha sido cancelada");
        $("#menu_inicio").click();
      } else {
      }
    });
  }
  
  function mensaje(mensaje, titulo, tipo, icono) {
    var notes = $("#mensaje2").notify({
      removeIcon: '<i class="icon-times"></i>',
    });
    if (tipo == "sticky") {
      notes.show(mensaje, {
        title: titulo,
        sticky: true,
        icon: icono,
      });
    } else {
      notes.show(mensaje, {
        type: tipo,
        title: titulo,
        icon: icono,
      });
    }
  }
  
  function status_sol(valor, id_t, tabla, campoid, tb) {
    var valor = valor;
  
    var id_t = id_t;
    var tabla = tabla;
    var campoid = campoid;
  
    var tb = tb;
  
    var msj_sup = "¿Está seguro?";
  
    if (valor != 10 && valor != 0) {
      var msj_inf = "¡El registro seleccionado sera aprobado!";
      var msj_final = "¡El registro seleccionado ha sido aprobado con éxito!";
      btnmsj = "Si, aprobar";
  
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
            //$("#mensaje").html("" + res);
  
            /*swal(msj_final, {
                                     icon: "success",
                                 });*/
            mensaje(
              msj_final,
              "Aprobado con éxito",
              "success",
              "<i class='icon-tick-outline'></i>"
            );
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
          danger: btnmsj,
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
            //$("#mensaje").html("" + res);
  
            mensaje(
              msj_final,
              "Desactivado con éxito",
              "danger",
              "<i class='icon-times'></i>"
            );
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
    } else if (valor == 10) {
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
            //$("#mensaje").html("" + res);
  
            mensaje(
              msj_final,
              "Eliminado con éxito",
              "sticky",
              "<i class='icon-trash'></i>"
            );
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
  
  
  function buscarCategoria(id) {
    $.ajax({
      url: "../tablas/categorias.php",
      type: "get",
      dataType: "json",
    }).done(function (res) {
      var response = res.data;
  
      $("#" + id + " option").remove();
  
      let $option = $("<option />", {
        text: "Seleccione",
        value: "0",
      });
      $("#" + id).append($option);
  
      for (var i = 0; i < response.length; i++) {
        if (response[i].status == 1) {
          let $option = $("<option />", {
            text: response[i].descripcion,
            value: response[i].id,
          });
          $("#" + id).append($option);
        }
      }
    });
  }
  
  function cancelar() {
    swal({
      title: "¿Está seguro?",
      text: "¡La operación será cancelada!",
      icon: "warning",
      buttons: {
        cancel: "No",
        danger: "Si",
      },
    }).then((willDelete) => {
      if (willDelete) {
        showErrorMessage("Su operación ha sido cancelada");
        limpiar();
      } else {
      }
    });
  }
  
  function cargar() {
    $.ajax({
      url: "../vistas/vista_menu.php",
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      $("#contenedor_j").html("" + res);
    });
  }
  function contar(ctrl) {
    var contar = $("#formrol").data("conteo");
    if ($("#" + ctrl.attr("id")).prop("checked")) {
      contar = contar + 1;
    } else {
      contar = contar - 1;
    }
    $("#formrol").data("conteo", contar);
    //alert($("#formrol").data('conteo'));
  }
  
  function guardar_datos(url, formulario, tabla, modal) {
    var valida = 0;
    var formData = new FormData(document.getElementById(formulario));
    if (formulario == "formuinspeccion") {
      formData.append("id_solicitud", $("#tb-inspeccion").data("id"));
    }
    if (formulario == "formucompania" || formulario == "formusolicitud") {
      formData.append("txttipo2", "," + $("#txttipo").val());
    }
  
    if (formulario == "formusolicitud") {
      if ($("#txtlugar").val() == "") {
        //valida=1;
        $("#id_msj_ubicacion").css("display", "block");
      } else {
        $("#id_msj_ubicacion").css("display", "none");
      }
    }
  
    if (formulario == "formConfiguracion") {
      var cantidad = $("#tb-propiedades tr").length;
      var tabla = document.getElementById("tb-propiedades");
      var concatena = "";
  
      if (cantidad < 2) {
        valida = 1;
        $("#id_msj_propiedad").css("display", "block");
      } else {
        for (var i = 1; i < cantidad; i++) {
          concatena =
            concatena +
            "%" +
            tabla.rows[i].cells[0].innerHTML +
            "_" +
            tabla.rows[i].cells[1].innerHTML +
            "_" +
            tabla.rows[i].cells[2].innerHTML +
            "_" +
            tabla.rows[i].cells[3].innerHTML +
            "_" +
            tabla.rows[i].cells[4].innerHTML +
            "_" +
            tabla.rows[i].cells[5].innerHTML;
        }
        formData.append("id", $("#tb-categorias").data("id"));
        formData.append("propiedades", concatena);
        $("#id_msj_propiedad").css("display", "none");
      }
    }
  
    if (valida == 0) {
      var msj_sup = "¿Está seguro?";
      var msj_inf = "";
      btnmsj = "Si, guardar!";
  
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
            url: "../php/" + url + ".php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
            //$("#mensaje2").html("" + res);
            console.log(res);
            if (res == 1) {
              //alert("Usuario registrado con exito");
              mensaje(
                "Sus datos han sido registrados",
                "Guardado exitosamente",
                "success",
                "<i class='icon-tick-outline'></i>"
              );
              if (formulario == "formConfiguracion") {
                act_regs("configuracion_inspeccion", "tabla_vista", formulario);
              } else {
                if (formulario == "formuinspeccion") {
                  act_regs("aprobacion_seccion", "tabla_vista", formulario);
                } else {
                  act_regs("nuevo_usuario", "tabla_vista", formulario);
                }
              }
  
              //                $('#'+modal).modal('hide');
              $("#" + tabla)
                .DataTable()
                .ajax.reload();
              $("#" + formulario)[0].reset();
              setTimeout(() => {
                //                     alert("Registrado exitosamente")
              }, 500);
            } else {
              //Corregir esta guardando usuarios existentes
              $("#msg").css("display", "block");
              $("#msg").html(res);
              setTimeout(() => {
                $("#msg").css("display", "none");
              }, 3000);
            }
          });
        }
      });
    }
  }
  function editar_datos(url, formulario, tabla, modal) {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData(document.getElementById(formulario));
        if (formulario == "formeditarcompania") {
          formData.append("txttipo2", "," + $("#txttipoE").val());
        }
        if (formulario == "formeditarsol" || formulario == "formeditarsol") {
          formData.append("txttipo2", "," + $("#txttipoE").val());
        }
  
        formData.append("idtxt", $("#" + tabla).data("id"));
        $.ajax({
          url: "../php/" + url + ".php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
  
          if (res == 1) {
            //alert("Usuario editado con exito");
            mensaje(
              "Sus datos han sido editados",
              "Editado exitosamente",
              "success",
              "<i class='icon-tick-outline'></i>"
            );
            //                $('#'+modal).modal('hide');
  
            $("#" + tabla)
              .DataTable()
              .ajax.reload();
            $("#" + formulario)[0].reset();
            act_regs("editar_usuario", "tabla_vista", formulario);
            setTimeout(() => {
              $('[data-toggle="tooltip"]').tooltip();
            }, 1000);
          } else {
            //Corregir esta editando usuarios existentes
            $("#msgE").css("display", "block");
            $("#msgE").html(res);
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          }
        });
      }
    });
  }
  
  function salir() {
    location.href = "../php/salir.php";
  }
  
  function lock() {
    location.href = "../php/lock.php";
  }
  
  function perfil() {
    linked2("../vistas/perfil.php");
  }
  
  function contra() {
    linked2("../vistas/cambiar_contra.php");
  }
  function act_regs(div1, div2, formulario) {
    $("#" + div1).css("display", "none");
    $("#" + div2).css("display", "block");
    $("#" + formulario)[0].reset();
  }
  
  function act_regs2(div1, div2, formulario) {
    $("#" + div1).css("display", "none");
    $("#" + div2).css("display", "block");
    $("#" + formulario)[0].reset();
  
    if (div2 == "info_panico") {
      clearInterval(myVar);
      myVar = setInterval(function () {
        /*console.log("ejecutado2");*/ buscarUbicacion();
      }, 3000);
    }
  
    if (div2 == "tabla_vista") {
      clearInterval(myVar);
      myVar = setInterval(function () {
        listarPanico("tb-panico"); /*console.log("ejecutado");*/
      }, 7000);
    }
  }
  
  function buscarUbicacion() {
    var id = $("#idtxtid").val();
  
    $.ajax({
      url: "../apirest/buscarUbicacion.php?id=" + id,
      type: "post",
      dataType: "json",
    }).done(function (res) {
      //console.log(res);
      $("#idtxtlatitud").val(res[0].lat);
      $("#idtxtlongitud").val(res[0].lng);
      $("#idtxtfecha").val(res[0].fecha_hora);
  
      var coords2 = 0;
      coords2 = {
        lng: res[0].lng,
        lat: res[0].lat,
      };
      setMarker(coords2);
    });
  }
  
  function buscarSelect(select, tabla, campo, valores) {
    $.ajax({
      url: "../selects/select_catalogo.php?tabla=" + tabla + "&campo=" + campo,
      type: "post",
      dataType: "json",
    }).done(function (res) {
      var response = res.data;
  
      $("#" + select + " option").remove();
      var porciones = valores.split(",");
      var ck = 0;
  
      for (var i = 0; i < response.length; i++) {
        ck = 0;
        let $option;
  
        for (var j = 0; j < porciones.length; j++) {
          if (porciones[j] == response[i].id) {
            ck = 1;
          }
        }
        if (ck == 1) {
          $option = $("<option />", {
            text: response[i].descripcion,
            value: response[i].id,
            selected: true,
          });
        } else {
          $option = $("<option />", {
            text: response[i].descripcion,
            value: response[i].id,
          });
        }
        $("#" + select).append($option);
        $("#" + select).trigger("chosen:updated");
      }
    });
  }
  
  function codigo_sol() {
    $.ajax({
      url: "../php/codigo_sol.php",
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      $("#txtcod_sol").val(res);
    });
  }
  function cambio_cliente(val) {
    $.ajax({
      url: "../php/datos_cliente.php?valor=" + val,
      type: "get",
      dataType: "json",
    }).done(function (res) {
      var response = res.data;
  
      $("#txtruc_contacto").val(response[0].ruc);
      $("#txtdireccion_contacto").val(response[0].direccion);
      $("#txtcelular_contacto").val(response[0].telefono);
      $("#txtcorreo_contacto").val(response[0].correo);
    });
  }
  
  function ListarSelects(select, seleccionado, controlador) {
    $.ajax({
      url: "../selects/" + controlador,
      type: "get",
      dataType: "json",
    }).done(function (res) {
      $("#" + select + " option").remove();
      if (select == "txtcliente" || select == "txtclienteE") {
        let $option = $("<option />", {
          text: "Seleccione",
          value: 0,
        });
        $("#" + select).append($option);
      }
      var response = res.data;
      var valida = 0;
      for (var i = 0; i < response.length; i++) {
        valida = 0;
        for (var j = 0; j < seleccionado.length; j++) {
          if (seleccionado[j].id == response[i].id) {
            valida = 1;
          }
        }
  
        if (valida == 1) {
          let $option = $("<option />", {
            text: response[i].descripcion,
            value: response[i].id,
            selected: true,
          });
          $("#" + select).append($option);
        } else {
          let $option = $("<option />", {
            text: response[i].descripcion,
            value: response[i].id,
          });
          $("#" + select).append($option);
        }
        $("#" + select).trigger("chosen:updated");
      }
    });
  }
  
  function calcula_duracion() {
    if (
      $("#txtfecha_inicio").val() != "" &&
      $("#txtfecha_fin").val() != "" &&
      $("#txthora_inicio").val() != "" &&
      $("#txthora_fin").val() != ""
    ) {
      var fini = $("#txtfecha_inicio").val();
      var ffin = $("#txtfecha_fin").val();
      var hini = $("#txthora_inicio").val();
      var hfin = $("#txthora_fin").val();
      var ini = fini + " " + hini;
      var fin = ffin + " " + hfin;
      var fecha1 = moment(ini, "YYYY-MM-DD HH:mm");
      var fecha2 = moment(fin, "YYYY-MM-DD HH:mm");
      var diff0 = fecha2.diff(fecha1, "d"); // Diff in days
      var horr = diff0 * 24;
      var diff = fecha2.diff(fecha1, "h") - horr; // Diff in days
      $("#txtduracion").val(diff0 + " Dias, " + diff + " Horas");
    }
  }
  
  function calcula_duracion2() {
    if (
      $("#txtfecha_inicioE").val() != "" &&
      $("#txtfecha_finE").val() != "" &&
      $("#txthora_inicioE").val() != "" &&
      $("#txthora_finE").val() != ""
    ) {
      var fini = $("#txtfecha_inicioE").val();
      var ffin = $("#txtfecha_finE").val();
      var hini = $("#txthora_inicioE").val();
      var hfin = $("#txthora_finE").val();
      var ini = fini + " " + hini;
      var fin = ffin + " " + hfin;
      var fecha1 = moment(ini, "YYYY-MM-DD HH:mm");
      var fecha2 = moment(fin, "YYYY-MM-DD HH:mm");
      var diff0 = fecha2.diff(fecha1, "d"); // Diff in days
      var horr = diff0 * 24;
      var diff = fecha2.diff(fecha1, "h") - horr; // Diff in days
      $("#txtduracionE").val(diff0 + " Dias, " + diff + " Horas");
    }
  }
  
  function readURL2(input) {
    if (
      input.files[0].type == "image/jpeg" ||
      input.files[0].type == "image/png"
    ) {
      $.each(jQuery(input)[0].files, function (i, file) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(".box").removeAttr("src");
          $(".overlay_uploader").hide();
          $(".spinnerx").hide();
          $(".box").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      });
    } else {
      $(".overlay_uploader").hide();
      $(".spinnerx").hide();
      alert("Solo se permiten archivos .jpg y .png");
    }
  }
  function agregar_tabla() {
    var campo = $("#idtxtcampo_propiedades").val();
    var tipocampo = $("#idtxttipocampo_propiedades").val();
    var codigo = $("#idtxtcodigo_propiedades").val();
    var descripcion = $("#idtxtdescripcion_propiedades").val();
    var label = $("#idtxtlabel_propiedades").val();
    if ($("#txtfoto_inspeccionA").prop("checked")) {
      var foto1 = $("#txtfoto_inspeccionA").val();
    } else {
      var foto1 = $("#txtfoto_inspeccionB").val();
    }
    var valida = 1;
  
    if (campo == "") {
      $("#id_msj_campo_p").css("display", "block");
      valida = 0;
    } else {
      $("#id_msj_campo_p").css("display", "none");
    }
  
    if (label == "") {
      $("#id_msj_label_p").css("display", "block");
      valida = 0;
    } else {
      $("#id_msj_label_p").css("display", "none");
    }
  
    if (codigo == "") {
      $("#id_msj_codigo_p").css("display", "block");
      valida = 0;
    } else {
      $("#id_msj_codigo_p").css("display", "none");
    }
  
    if (descripcion == "") {
      $("#id_msj_descripcion_p").css("display", "block");
      valida = 0;
    } else {
      $("#id_msj_descripcion_p").css("display", "none");
    }
  
    if (valida == 1) {
      $("#tb-propiedades").append(
        "<tr id='rowPropiedad" +
          $("#tb-propiedades tr").length +
          "'><td>" +
          campo +
          "</td><td>" +
          tipocampo +
          "</td><td>" +
          codigo +
          "</td><td>" +
          descripcion +
          "</td><td>" +
          foto1 +
          "</td><td>" +
          label +
          "</td><td><button class='btn btn-danger' type='button' onclick='ElimPropiedad(" +
          $("#tb-propiedades tr").length +
          ")'><i class='icon-trash'></i></button></td></tr>"
      );
      $("#idtxtcampo_propiedades").val("");
      $("#idtxttipocampo_propiedades").val("text");
      $("#idtxtcodigo_propiedades").val("");
      $("#idtxtdescripcion_propiedades").val("");
      $("#idtxtlabel_propiedades").val("");
    }
  }
  
  function ElimPropiedad(coor) {
    $("#rowPropiedad" + coor).remove();
  }
  function CargarPropiedad(id) {
    $.ajax({
      url: "../selects/cargaPropiedad.php?id=" + id,
      type: "get",
      dataType: "json",
    }).done(function (res) {
      console.log(res);
      var response = res[0].data;
      var valida = 0;
      var valores_select = 0;
      var valores_select2 = 0;
  
      var concatena =
        "<div class='row'><input type='hidden' name='id_configuracion_form' value='" +
        res[0].id +
        "'>";
      var concatena_option = "";
      for (var i = 0; i < response.length; i++) {
        if (response[i].tipo == "select") {
          valores_select = response[i].codigo;
          var ddd = valores_select.split(",");
  
          valores_select2 = response[i].descripcion;
          var ddd2 = valores_select2.split(",");
  
          for (var j = 0; j < ddd.length; j++) {
            concatena_option =
              concatena_option +
              "<option value='" +
              ddd[j] +
              "'>" +
              ddd2[j] +
              "</option>";
          }
          concatena =
            concatena +
            "<div class='col-md-7 col-lg-7'><div class='form-group'><label class='form-label' style='position: relative;top: 10px;'>" +
            response[i].label +
            "</label><div style='min-height: 40px;'><select name='" +
            response[i].campo +
            "' id='id" +
            response[i].campo +
            "' class='form-control form-control-chosen' data-placeholder='Por favor seleccione' style='width:100%'>" +
            concatena_option +
            "</select></div></div></div>";
        } else {
          concatena =
            concatena +
            "<div class='col-md-7 col-lg-7'><div class='form-group'><label class='form-label' style='position: relative;top: 10px;'>" +
            response[i].label +
            "</label><div style='height: 40px;'><input type='" +
            response[i].tipo +
            "' class='form-control' name='" +
            response[i].campo +
            "' id='id" +
            response[i].campo +
            "' placeholder='Ingrese " +
            response[i].label +
            "' style='width:100%' required></div></div></div>";
        }
        if (response[i].foto == "Si") {
          concatena =
            concatena +
            "<div class='col-md-5 col-lg-5'><div class='form-group'><label class='form-label' style='position: relative;top: 10px;'>Foto " +
            response[i].label +
            "</label><div style='height: 40px;'><input type='file' class='form-control' name='foto" +
            response[i].campo +
            "' id='idfoto" +
            response[i].campo +
            "' placeholder='seleccione foto' style='width:100%' required></div></div></div>";
        } else {
          concatena =
            concatena +
            "<div class='col-md-5 col-lg-5'><div class='form-group'></div></div>";
        }
      }
  
      $("#titulo_form").html(res[0].titulo);
  
      $("#foto_app").html(
        "<div class='form-group'><label class='form-label' style='position: relative;top: 2px;'>Diagrama</label><img src='../img/imagenes/" +
          res[0].imagen +
          "' width='100%' height = '400px'></div>"
      );
      $("#div_constructorr").html(concatena + "</div>");
    });
  }
  
  function foto(ctrl) {
    var sizeByte = ctrl.files[0].size;
    var siezekiloByte = parseInt(sizeByte / 1024);
  
    //console.log(siezekiloByte);
    var foto = $("#" + ctrl.id).val();
  
    if (foto != "") {
      extensiones_permitidas = new Array(".jpeg", ".jpg", ".png");
  
      //recupero la extensión de este nombre de archivo
      extension = foto.substring(foto.lastIndexOf(".")).toLowerCase();
      //alert (extension);
      //compruebo si la extensión está entre las permitidas
      permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
        if (extensiones_permitidas[i] == extension) {
          permitida = true;
          break;
        }
      }
      if (!permitida) {
        $("#" + ctrl.id).val("");
        alert(
          "Comprueba la extensión de los archivos a subir. \nSólo se pueden subir archivos con extensiones: " +
            extensiones_permitidas.join()
        );
      } else {
        //correcto!
        generateFromImage(
          ctrl,
          1000,
          1000,
          0.6,
          (data) => {
            getImageSize(data);
  
            //añadiendo la imagen a un input hidden
            $("#h" + ctrl.id).val(data);
            //console.log($("#h"+ctrl.id).val());
          },
          (err) => console.log(err)
        );
      }
    }
  }
  
  function generateFromImage(
    img,
    MAX_WIDTH = 700,
    MAX_HEIGHT = 700,
    quality = 1,
    callback
  ) {
    let reader = new FileReader();
  
    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
    reader.readAsDataURL(img.files[0]);
  
    // Le decimos que cuando este listo ejecute el código interno
    reader.onload = function () {
      var canvas = document.createElement("canvas");
      var image = new Image();
      image.src = reader.result;
      image.onload = () => {
        getImageSize(reader.result);
        //console.log(image);
        var width = image.width;
        var height = image.height;
  
        if (width > height) {
          if (width > MAX_WIDTH) {
            height *= MAX_WIDTH / width;
            width = MAX_WIDTH;
          }
        } else {
          if (height > MAX_HEIGHT) {
            width *= MAX_HEIGHT / height;
            height = MAX_HEIGHT;
          }
        }
        canvas.width = width;
        canvas.height = height;
        var ctx = canvas.getContext("2d");
        //ctx.fillStyle = "white";
        ctx.drawImage(image, 0, 0, width, height);
  
        // IMPORTANT: 'jpeg' NOT 'jpg'
        var dataUrl = canvas.toDataURL("image/jpeg", quality);
  
        callback(dataUrl);
      };
    };
  }
  
  function getImageSize(data_url) {
    var head = "data:image/jpeg;base64,";
    var size = (
      ((data_url.length - head.length) * 3) /
      4 /
      (1024 * 1024)
    ).toFixed(4);
    //alert(size);
    //console.log(size);
  
    return (((data_url.length - head.length) * 3) / 4 / (1024 * 1024)).toFixed(4);
  }
  
  
  
  
  // ROL
  function guardar_rol() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        if ($("#formrol").data("conteo") == 0) {
          $("#msgP").css("display", "block");
  
          setTimeout(() => {
            $("#msgP").css("display", "none");
          }, 3000);
        } else {
          var formData = new FormData(document.getElementById("formrol"));
          $.ajax({
            url: "../php/guardar_rol.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
            if (res == 1) {
              $.notify({
                icon: 'flaticon-alarm-1',
                title: 'Agregado',
                message: 'Sus datos han sido registrado exitosamente!',
              },{
                type: 'secondary',
                placement: {
                  from: "top",
                  align: "right"
                },
                time: 1000,
              });
              $("#tb-roles").DataTable().ajax.reload();
              $("#formrol")[0].reset();
              $("#formrol").data("conteo", 0);
              setTimeout(() => {
                $('[data-toggle="tooltip"]').tooltip();
              }, 1000);
              act_regs("nuevo_rol", "tabla_vista", "formrol");
            } else if (res == 0) {
              $("#msg").css("display", "block");
  
              setTimeout(() => {
                $("#msg").css("display", "none");
              }, 3000);
            } else if (res == 2) {
              alert("Ha ocurrido un error, intente de nuevo");
            }
          });
        }
      }
    });
  }
  
  function editar_rol() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        if ($("#formeditarrol").data("conteo") == 0) {
          $("#msgPE").css("display", "block");
  
          setTimeout(() => {
            $("#msgPE").css("display", "none");
          }, 3000);
        } else {
          var formData = new FormData(document.getElementById("formeditarrol"));
          formData.append("idtxt", $("#tb-roles").data("id"));
          $.ajax({
            url: "../php/editar_rol.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
          }).done(function (res) {
            if (res == 1) {
              $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
              $("#tb-roles").DataTable().ajax.reload();
              $("#formeditarrol")[0].reset();
              $(".colorinput-input").val("");
              $("#formeditarrol").data("conteo", 0);
              setTimeout(() => {
                $('[data-toggle="tooltip"]').tooltip();
              }, 1000);
              act_regs("editar_rol", "tabla_vista", "formrol");
            } else if (res == 0) {
              $("#msgE").css("display", "block");
              setTimeout(() => {
                $("#msgE").css("display", "none");
              }, 3000);
            } else if (res == 2) {
              alert("Ha ocurrido un error, intente de nuevo");
            }
          });
        }
      }
    });
  }
  // ROL
  
  
  // USUARIO
  function guardar_usuario() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData(document.getElementById("formusuario"));
        $.ajax({
          url: "../php/guardar_usuario.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //console.log(res);
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            act_regs("nuevo_usuario", "tabla_vista", "formusuario");
            $("#tb-usuarios").DataTable().ajax.reload();
            $("#formusuario")[0].reset();
            setTimeout(() => {
              //                     alert("Registrado exitosamente")
            }, 500);
          } else if (res == 0) {
            //Corregir esta guardando usuarios existentes
            $("#msg").css("display", "block");
  
            setTimeout(() => {
              $("#msg").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  
  function editar_usuario() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData(document.getElementById("formeditarusuario"));
        formData.append("idtxt", $("#tb-usuarios").data("id"));
        $.ajax({
          url: "../php/editar_usuario.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            //$('#editar-usuario').modal('hide');
            $("#tb-usuarios").DataTable().ajax.reload();
            $("#formeditarusuario")[0].reset();
            act_regs("editar_usuario", "tabla_vista", "formusuario");
            setTimeout(() => {
              $('[data-toggle="tooltip"]').tooltip();
            }, 1000);
          } else if (res == 0) {
            //Corregir esta editando usuarios existentes
            $("#msgE").css("display", "block");
  
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // USUARIO
  
  
  
  
  
  // CATEGORIA NOTICIAS
  function guardarCategoriaNoticias() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("descripcion", $("#idtxttitulo").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        // for (var pair of formData.entries()) {
        //         console.log(pair[0]+ ' - ' + pair[1]);
        // }
  
        $.ajax({
          url: "../php/guardar_categoria_noticias.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_noticias").DataTable().ajax.reload();
            $("#nueva_categoria_noticias").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaNoticias")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarCategoriaNoticias() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-categoria_noticias").data("id"));
        formData.append("descripcion", $("#idtxttituloE").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //             console.log(pair[0]+ ' - ' + pair[1]);
        //     }
        $.ajax({
          url: "../php/editar_categoria_noticias.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_noticias").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaNoticiasEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // CATEGORIA NOTICIAS
  
  
  // CATEGORIA EVENTOS
  function guardarCategoriaEventos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
  
        // for (var pair of formData.entries()) {
        //         console.log(pair[0]+ ' - ' + pair[1]);
        // }
  
        $.ajax({
          url: "../php/guardar_categoria_eventos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_eventos").DataTable().ajax.reload();
            $("#nueva_categoria_eventos").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaEventos")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarCategoriaEventos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-categoria_eventos").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //             console.log(pair[0]+ ' - ' + pair[1]);
        //     }
        $.ajax({
          url: "../php/editar_categoria_eventos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_eventos").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaEventosEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // CATEGORIA EVENTOS
  
  
  // CATEGORIA TURISMO => CONOCIENDO CARIRUBANA 
  function guardarCategoriaConociendoCarirubana() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        formData.append("icono", $("#idtxticono").val());
        formData.append("unico", $("#idtxtunico").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
  
        // for (var pair of formData.entries()) {
        //         console.log(pair[0]+ ' - ' + pair[1]);
        // }
  
        $.ajax({
          url: "../php/guardar_categoria_conociendo_carirubana.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_conociendo_carirubana").DataTable().ajax.reload();
            $("#nueva_categoria_conociendo_carirubana").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaConociendoCarirubana")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarCategoriaConociendoCarirubana() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-categoria_conociendo_carirubana").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("icono", $("#idtxticonoE").val());
        formData.append("unico", $("#idtxtunicoE").val());
        formData.append("antigua", $("#tb-categoria_conociendo_carirubana").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //             console.log(pair[0]+ ' - ' + pair[1]);
        //     }
        $.ajax({
          url: "../php/editar_categoria_conociendo_carirubana.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-categoria_conociendo_carirubana").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formCategoriaConociendoCarirubanaEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // CATEGORIA TURISMO => CONOCIENDO CARIRUBANA 
  
  
  
  
  
  
  
  // BANNER PRINCIPAL
  function guardarBannerPrincipal() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("descripcion", $("#idtxtdescripcion").val());
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        formData.append("url", $("#idtxturl").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_banner_principal.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-banner_principal").DataTable().ajax.reload();
            $("#nuevo_banner_principal").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formBannerPrincipal")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarBannerPrincipal() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-banner_principal").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("descripcion", $("#idtxtdescripcionE").val());
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("url", $("#idtxturlE").val());
        formData.append("antigua", $("#tb-banner_principal").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_banner_principal.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-banner_principal").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formBannerEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // BANNER PRINCIPAL
  
  
  // ALCALDE BIENVENIDO A CARIRUBANA 
  function guardarSesionCariruba() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("subtitulo", $("#idtxtsubtitulo").val());
        formData.append("descripcion", $("#idtxtdescripcion").val());
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("etiqueta1", $("#idtxtetiqueta1").val());
        formData.append("etiqueta2", $("#idtxtetiqueta2").val());
        formData.append("descripcionimg", $("#idtxtdescripcionimg").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/alcalde.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-banner_principal").DataTable().ajax.reload();
            $("#nuevo_banner_principal").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formBannerPrincipal")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            toastr["error"]("😞 Solo se permite un modulo!", "Error!", {
              closeButton: true,
              tapToDismiss: false,
              progressBar: true,
            });
            // $('#msgN').css('display','block');
            // setTimeout(()=>{
            //   $('#msgN').css('display','none');
            // },3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionCarirubana() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#txtidE").val());
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("subtitulo", $("#idtxtsubtituloE").val());
        formData.append("descripcion", $("#idtxtdescripcionE").val());
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("etiqueta1", $("#idtxtetiqueta1E").val());
        formData.append("etiqueta2", $("#idtxtetiqueta2E").val());
        formData.append("descripcionimg", $("#idtxtdescripcionimgE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("antigua", $("#idAntiguo").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //   console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_alcalde.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          listarSesionCarirubana2();
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-sesion-carirubana").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionCarirubanaEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // ALCALDE BIENVENIDO A CARIRUBANA
  
  
  // TRAMITES Y SERVICIOS
  function guardarSesionTramitesServicios() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("titulo", $("#idtxttitulo").val());
        var descripcion = tinymce.get("idtxtdescripcion").getContent();
        formData.append("descripcion", descripcion);
        // formData.append("descripcion", $("#idtxtdescripcion").html());
        formData.append("icono", $("#idtxticono").val());
        formData.append("cordinador", $("#idtxtcordinador").val());
        formData.append("telefono_cordinador", $("#idtxtnumeroCordinador").val());
        formData.append("correo_cordinador", $("#idtxtcorreo").val());
        formData.append("pagina_web", $("#idtxtpaginaweb").val());
        formData.append("direccion_fisica", $("#idtxtdireccion").val());
        formData.append("horario_admin", $("#idtxthorarioAdmin").val());
        formData.append("horario_publi", $("#idtxthorarioPubli").val());
        formData.append("numero_emergencia", $("#idtxtnumeroEmergencia").val());
        formData.append("twitter", $("#idtxttwitter").val());
        formData.append("facebook", $("#idtxtfacebook").val());
        formData.append("instagram", $("#idtxtinstagram").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        formData.append("imagen_detalle", $("#hidtxtimagenD").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_tramites_y_servicios.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-tramites-servicios").DataTable().ajax.reload();
            $("#nuevo_tramite").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServicios")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionTramitesServicios() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-tramites-servicios").data("id"));
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("titulo", $("#idtxttituloE").val());
  
        var descripcion = tinymce.get("idtxtdescripcionE").getContent();
        formData.append("descripcion", descripcion);
  
        formData.append("icono", $("#idtxticonoE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("imagen_detalle", $("#hidtxtimagenED").val());
        formData.append("cordinador", $("#idtxtcordinadorE").val());
        formData.append("telefono_cordinador", $("#idtxtnumeroCordinadorE").val());
        formData.append("correo_cordinador", $("#idtxtcorreoE").val());
        formData.append("pagina_web", $("#idtxtpaginawebE").val());
        formData.append("direccion_fisica", $("#idtxtdireccionE").val());
        formData.append("horario_admin", $("#idtxthorarioAdminE").val());
        formData.append("horario_publi", $("#idtxthorarioPubliE").val());
        formData.append("numero_emergencia", $("#idtxtnumeroEmergenciaE").val());
        formData.append("twitter", $("#idtxttwitterE").val());
        formData.append("facebook", $("#idtxtfacebookE").val());
        formData.append("instagram", $("#idtxtinstagramE").val());
        formData.append("antigua", $("#tb-tramites-servicios").data("antigua"));
        formData.append("antigua_detalle", $("#idtxtimaantigua").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_tramites_y_servicios.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-tramites-servicios").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServiciosEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function guardarSesionTramitesServiciosDocumentos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulodocumento").val());
        var archivoPDF = $("#idtxtdocumento")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("id", $("#textiddocumento").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        // for (var pair of formData.entries()) {
        //       console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/guardar_tramites_y_servicios_documentos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Su documento han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-tramites-servicios").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServicios")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionTramitesServiciosDocumentosE() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulodocumentoE").val());
        var archivoPDF = $("#idtxtdocumentoE")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("antigua", $("#idtxtdocumentoA").val());
        formData.append("id", $("#textiddocumentoE").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //       console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_tramites_y_servicios_documentos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-tramites-servicios").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionTramitesServiciosDocuementoE")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // TRAMITES Y SERVICIOS
  
  
  // NOTICIAS
  function guardarSesionNotiticiasPrincipales() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        var descripcion = tinymce.get("idtxtdescripcion").getContent();
        formData.append("descripcion", descripcion);
        // formData.append("descripcion", $("#idtxtdescripcion").html());
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        formData.append("periodista", $("#idtxtperiodista").val());
        formData.append("fotografo", $("#idtxtfotografo").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
  
        // for (var pair of formData.entries()) {
        //         console.log(pair[0]+ ' - ' + pair[1]);
        // }
  
        $.ajax({
          url: "../php/guardar_noticias_principales.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-noticias-principales").DataTable().ajax.reload();
            $("#nuevas_noticias").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formNoticiasPrincipales")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionNoticiasPrincipales() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-noticias-principales").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        var descripcion = tinymce.get("idtxtdescripcionE").getContent();
        formData.append("descripcion", descripcion);
  
        // formData.append("descripcion", $("#idtxtdescripcionE").html());
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("periodista", $("#idtxtperiodistaE").val());
        formData.append("fotografo", $("#idtxtfotografoE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("antigua", $("#tb-noticias-principales").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //             console.log(pair[0]+ ' - ' + pair[1]);
        //     }
        $.ajax({
          url: "../php/editar_noticias_principales.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-noticias-principales").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formNoticiasPrincipalesEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionNoticiasImagenesE() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("imagen", $("#hidtxtimagenID").val());
        formData.append("antigua", $("#idtxtdocumentoI").val());
        formData.append("id", $("#textiddocumentoI").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //   console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_noticias_principales_img.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Su imagenen han sido editada exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
    
            $("#tb-noticias-principales").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionNoticiasImagenesE")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // NOTICIAS
  
  
  
  // TURISMO  => CONOCIENDO CARIRUBANA
  function guardarSesionConociendoCarirubana() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("descripcion", $("#idtxtdescripcion").val());
        formData.append("direccion", $("#idtxtdireccion").val());
        formData.append("horario", $("#idtxthorario").val());
        formData.append("entrada", $("#idtxtentrada").val());
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        // for (var pair of formData.entries()) {
        //   console.log(pair[0] + " - " + pair[1]);
        // }
        $.ajax({
          url: "../php/guardar_conociendo_carirubana.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            //alert("Usuario registrado con exito");
           $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-conociendo-carirubana").DataTable().ajax.reload();
            $("#nuevo_conociendo_carirubana").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubana")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionConociendoCarirubana() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-conociendo-carirubana").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("descripcion", $("#idtxtdescripcionE").val());
        formData.append("direccion", $("#idtxtdireccionE").val());
        formData.append("horario", $("#idtxthorarioE").val());
        formData.append("entrada", $("#idtxtentradaE").val());
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append(
          "antigua",
          $("#tb-conociendo-carirubana").data("antigua")
        );
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_conociendo_carirubana.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-conociendo-carirubana").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubanaEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionConociendoCarirubanaImagenesE() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("imagen", $("#hidtxtimagenID").val());
        formData.append("antigua", $("#idtxtdocumentoI").val());
        formData.append("id", $("#textiddocumentoI").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //   console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_conociendo_carirubana_img.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Su imagenen han sido editada exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-conociendo-carirubana").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionConociendoCarirubanaImagenesE")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // TURISMO  => CONOCIENDO CARIRUBANA
  
  
  // ORDENANZAS
  function guardarSesionMuntimedia() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        var archivoPDF = $("#idtxtdocumento")[0].files;
        formData.append("documento", archivoPDF[0]);
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_ordenanzas.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {          
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-multimedia").DataTable().ajax.reload();
            $("#nuevo_multimedia").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formMultimedia")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionMultimedia() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-multimedia").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        var archivoPDF = $("#idtxtdocumentoE")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("antigua", $("#tb-multimedia").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_ordenanzas.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-multimedia").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formMultimediaEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // ORDENANZAS
  
  
  // SEMANARIO
  function guardarSemanario() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        var archivoPDF = $("#idtxtdocumento")[0].files;
        formData.append("documento", archivoPDF[0]);
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_semanario.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-semanario").DataTable().ajax.reload();
            $("#nuevo_semanario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSemanario")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSemanario() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-semanario").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        var archivoPDF = $("#idtxtdocumentoE")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("antigua", $("#tb-semanario").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //     console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_semanario.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-semanario").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSemanarioEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
  
      }
    });
  }
  // SEMANARIO
  
  
  // LIBROS Y REVISTAS
  function guardarSesionLibrosRevistas() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        var archivoPDF = $("#idtxtdocumento")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("imagen", $("#hidtxtimagen").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_libros_revistas.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-libros-revistas").DataTable().ajax.reload();
            $("#nuevo_libro_revista").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formLibrosRevistas")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionLibrosRevistas() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-libros-revistas").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        var archivoPDF = $("#idtxtdocumentoE")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("antigua_documento", $("#txtdocumentoA").val());
        formData.append("antigua", $("#tb-libros-revistas").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_libros_revistas.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-libros-revistas").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formLibrosRevistasEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // LIBROS Y REVISTAS
  
  // EFEMERIDES
  function guardarEfemeride() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("descripcion", $("#idtxtdescripcion").val());
        formData.append("url", $("#idtxturl").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_efemerides.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-efemerides").DataTable().ajax.reload();
            $("#nueva_efemeride").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formEfemerides")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarEfemerides() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-efemerides").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("descripcion", $("#idtxtdescripcionE").val());
        formData.append("url", $("#idtxturlE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("antigua", $("#tb-efemerides").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        $.ajax({
          url: "../php/editar_efemerides.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-efemerides").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formEfemeridesEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // EFEMERIDES
  
  // EVENTOS
  function guardarSesionEventos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
        formData.append("categoria", $("#idtxtcategoria").val());
        formData.append("ubicacion", $("#idtxtubicacion").val());
        formData.append(
          "telefono_organizador",
          $("#idtxtorganizadortelefono").val()
        );
        formData.append("correo_organizador", $("#idtxtorganizadorcorreo").val());
        formData.append("nombre_organizador", $("#idtxtorganizadornombre").val());
        formData.append("fecha", $("#fp-default").val());
        formData.append("hora", $("#fp-time").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        var descripcion = tinymce.get("idtxtdescripcion").getContent();
        formData.append("descripcion", descripcion);
        formData.append("latitud", $("#idtxtlatitud").val());
        formData.append("longitud", $("#idtxtlongitud").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ' - ' + pair[1]);
        }
        $.ajax({
          url: "../php/guardar_eventos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          console.log(res);
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-eventos").DataTable().ajax.reload();
            $("#nuevo_eventos").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formEvetos")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionEventos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
  
        formData.append("id", $("#tb-eventos").data("id"));
  
        formData.append("titulo", $("#idtxttituloE").val());
        formData.append("categoria", $("#idtxtcategoriaE").val());
        formData.append("ubicacion", $("#idtxtubicacionE").val());
        formData.append(
          "telefono_organizador",
          $("#idtxtorganizadortelefonoE").val()
        );
        formData.append(
          "correo_organizador",
          $("#idtxtorganizadorcorreoE").val()
        );
        formData.append(
          "nombre_organizador",
          $("#idtxtorganizadornombreE").val()
        );
        formData.append("fecha", $("#fp-defaultE").val());
        formData.append("hora", $("#fp-timeE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        var descripcion = tinymce.get("idtxtdescripcionE").getContent();
        formData.append("descripcion", descripcion);
        formData.append("latitud", $("#idtxtlatitudE").val());
        formData.append("longitud", $("#idtxtlongitudE").val());
        formData.append("antigua", $("#tb-eventos").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //       console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_eventos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-eventos").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formEventosEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // EVENTOS
  
  
  // ENTES DESCENTRALIZADOS
  function guardarSesionEntesDescentralizados() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulo").val());
  
        // formData.append("descripcion", $("#idtxtdescripcion").html());
        var descripcion = tinymce.get("idtxtdescripcion").getContent();
        formData.append("descripcion", descripcion);
  
        formData.append("icono", $("#idtxticono").val());
        formData.append("cordinador", $("#idtxtcordinador").val());
        formData.append("telefono_cordinador", $("#idtxtnumeroCordinador").val());
        formData.append("correo_cordinador", $("#idtxtcorreo").val());
        formData.append("pagina_web", $("#idtxtpaginaweb").val());
        formData.append("direccion_fisica", $("#idtxtdireccion").val());
        formData.append("horario_admin", $("#idtxthorarioAdmin").val());
        formData.append("horario_publi", $("#idtxthorarioPubli").val());
        formData.append("numero_emergencia", $("#idtxtnumeroEmergencia").val());
        formData.append("twitter", $("#idtxttwitter").val());
        formData.append("facebook", $("#idtxtfacebook").val());
        formData.append("instagram", $("#idtxtinstagram").val());
        formData.append("imagen", $("#hidtxtimagen").val());
        // formData.append("titulo_documento", $("#idtxttitulodocumento").val());
        // formData.append("pdf", $("#idtxtpdf").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        $.ajax({
          url: "../php/guardar_entes_descentralizados.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Sus datos han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-entes-descentralizados").DataTable().ajax.reload();
            $("#nuevo_entes_descentralizados").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#idtxtdescripcion").html("");
            $("#formSesionEntesDescentralizados")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionEntesDescentralizados() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("id", $("#tb-entes-descentralizados").data("id"));
        formData.append("titulo", $("#idtxttituloE").val());
  
        // formData.append("descripcion", $("#idtxtdescripcionE").html());
        var descripcion = tinymce.get("idtxtdescripcionE").getContent();
        formData.append("descripcion", descripcion);
  
        formData.append("icono", $("#idtxticonoE").val());
        formData.append("imagen", $("#hidtxtimagenE").val());
        formData.append("cordinador", $("#idtxtcordinadorE").val());
        formData.append("telefono_cordinador", $("#idtxtnumeroCordinadorE").val());
        formData.append("correo_cordinador", $("#idtxtcorreoE").val());
        formData.append("pagina_web", $("#idtxtpaginawebE").val());
        formData.append("direccion_fisica", $("#idtxtdireccionE").val());
        formData.append("horario_admin", $("#idtxthorarioAdminE").val());
        formData.append("horario_publi", $("#idtxthorarioPubliE").val());
        formData.append("numero_emergencia", $("#idtxtnumeroEmergenciaE").val());
        formData.append("twitter", $("#idtxttwitterE").val());
        formData.append("facebook", $("#idtxtfacebookE").val());
        formData.append("instagram", $("#idtxtinstagramE").val());
  
        formData.append("antigua", $("#tb-entes-descentralizados").data("antigua"));
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
          // for (var pair of formData.entries()) {
          //     console.log(pair[0]+ ' - ' + pair[1]);
          // }
        $.ajax({
          url: "../php/editar_entes_descentralizados.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-entes-descentralizados").DataTable().ajax.reload();
            $("#info_usuario").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionEnteDescentralizadosEditar")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function guardarSesionEntesDescentralizadosDocumentos() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulodocumento").val());
        var archivoPDF = $("#idtxtdocumento")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("id", $("#textiddocumento").val());
        $("#btnGP").css("display", "none");
        $("#loading").css("display", "block");
        // for (var pair of formData.entries()) {
        //       console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/guardar_entes_descentralizados_documentos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loading").css("display", "none");
          $("#btnGP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Agregado',
              message: 'Su documento han sido registrado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-entes-descentralizados").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionEnteDescentralizadosDocuemento")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgN").css("display", "block");
            setTimeout(() => {
              $("#msgN").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  function editarSesionEntesDescentralizadosDocumentosE() {
    var msj_sup = "¿Está seguro?";
    var msj_inf = "";
    btnmsj = "Si, guardar!";
  
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
        var formData = new FormData();
        formData.append("titulo", $("#idtxttitulodocumentoE").val());
        var archivoPDF = $("#idtxtdocumentoE")[0].files;
        formData.append("documento", archivoPDF[0]);
        formData.append("antigua", $("#idtxtdocumentoA").val());
        formData.append("id", $("#textiddocumentoE").val());
        $("#btnEP").css("display", "none");
        $("#loadingE").css("display", "block");
        // for (var pair of formData.entries()) {
        //       console.log(pair[0]+ ' - ' + pair[1]);
        // }
        $.ajax({
          url: "../php/editar_entes_descentralizados_documentos.php",
          type: "post",
          dataType: "html",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
        }).done(function (res) {
          //$("#mensaje2").html("" + res);
          // console.log(res);
          $("#loadingE").css("display", "none");
          $("#btnEP").css("display", "block");
          if (res == 1) {
            $.notify({
              icon: 'flaticon-alarm-1',
              title: 'Editado',
              message: 'Sus datos han sido editado exitosamente!',
            },{
              type: 'secondary',
              placement: {
                from: "top",
                align: "right"
              },
              time: 1000,
            });
            $("#tb-entes-descentralizados").DataTable().ajax.reload();
            $("#info_documento_table").css("display", "none");
            $("#info_documento_editar").css("display", "none");
            $("#info_documento").css("display", "none");
            $("#tabla_vista").css("display", "block");
            $("#formSesionEnteDescentralizadosDocuementoE")[0].reset();
            setTimeout(() => {}, 500);
          } else if (res == 0) {
            $("#msgE").css("display", "block");
            setTimeout(() => {
              $("#msgE").css("display", "none");
            }, 3000);
          } else if (res == 2) {
            alert("Ha ocurrido un error, intente de nuevo");
          }
        });
      }
    });
  }
  // ENTES DESCENTRALIZADOS
    
  
  function rechazar() {
    var id = $("#tb-pedidos").data("id");
    var valor = "2";
    var tabla = "pedido";
    var campoid = "id";
    $.ajax({
      url:
        "../php/status.php?tabla=" +
        tabla +
        "&valor=" +
        valor +
        "&campoid=" +
        campoid +
        "&id_t=" +
        id,
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      //$("#mensaje").html("" + res);
  
      mensaje(
        "Su pedido ha sido rechazado",
        "Rechazado con éxito",
        "secondary",
        "<i class='icon-times'></i>"
      );
      $("#tb-pedidos").DataTable().ajax.reload();
      setTimeout(() => {
        $('[data-toggle="tooltip"]').tooltip();
      }, 1000);
      $("#info_usuario").css("display", "none");
      $("#tabla_vista").css("display", "block");
    });
  }
  
  function entregar() {
    var id = $("#tb-confirmados").data("id");
    var valor = "3";
    var tabla = "pedido";
    var campoid = "id";
    $.ajax({
      url:
        "../php/status.php?tabla=" +
        tabla +
        "&valor=" +
        valor +
        "&campoid=" +
        campoid +
        "&id_t=" +
        id,
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      //$("#mensaje").html("" + res);
  
      mensaje(
        "Su pedido ha sido entregado",
        "Entregado con éxito",
        "success",
        "<i class='icon-tick-outline'></i>"
      );
      $("#tb-confirmados").DataTable().ajax.reload();
      setTimeout(() => {
        $('[data-toggle="tooltip"]').tooltip();
      }, 1000);
      $("#info_usuario").css("display", "none");
      $("#tabla_vista").css("display", "block");
    });
  }
  
  function confirmar2(metodo) {
    var id = $("#tb-rechazados").data("id");
    var valor = "1";
    var tabla = "pedido";
    var campoid = "id";
    var formData = new FormData(document.getElementById("formconfirmarpedido2"));
    formData.append("id", id);
    formData.append("metodo", metodo);
    $.ajax({
      url: "../php/confirmar_pedido.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      if (res == 1) {
        //$("#mensaje").html("" + res);
        mensaje(
          "Su pedido ha sido confirmado",
          "Confirmado con éxito",
          "success",
          "<i class='icon-tick-outline'></i>"
        );
        $("#tb-rechazados").DataTable().ajax.reload();
        setTimeout(() => {
          $('[data-toggle="tooltip"]').tooltip();
        }, 1000);
        $("#info_usuario").css("display", "none");
        $("#tabla_vista").css("display", "block");
      } else if (res == 2) {
        alert("Ha ocurrido un error, intente de nuevo");
      }
    });
  }
  
  function ConsultaMasVendidos() {
    var formData = new FormData(document.getElementById("formsearch"));
    $.ajax({
      url: "../apirest/consulta_mas.php",
      type: "post",
      dataType: "html",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      var resp = JSON.parse(res);
      //console.log(resp);
      if (resp.data == "") {
        $("#msg").css("display", "block");
  
        setTimeout(() => {
          $("#msg").css("display", "none");
        }, 3000);
  
        $("#graph").css("display", "none");
      } else {
        $("#graph").css("display", "block");
  
        var dataPoints = [];
  
        var options = {
          animationEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "Más vendidos",
          },
          axisY: {
            title: "Unidades pedidas",
            //interval: 1,
            //valueFormatString: "#####"
          },
          data: [
            {
              type: "column",
              showInLegend: false,
              legendMarkerColor: "grey",
              legendText: "MMbbl = one million barrels",
              dataPoints: dataPoints,
            },
          ],
        };
  
        for (var i = 0; i < resp.data.length; i++) {
          dataPoints.push({
            label: resp.data[i].producto,
            y: parseInt(resp.data[i].cantidad),
          });
        }
  
        $("#chartContainer").CanvasJSChart(options);
      }
    });
  }
  
  function Nuevos_pedidos() {
    $.ajax({
      url: "../apirest/nuevos_pedidos.php",
      type: "post",
      dataType: "html",
      cache: false,
      contentType: false,
      processData: false,
    }).done(function (res) {
      //alert(res);
      if (res == "") {
      } else {
        ion.sound({
          sounds: [{ name: "glass" }],
          path: "../vendor/ion.sound/sounds/",
          preload: true,
          volume: 1.0,
        });
  
        ion.sound.play("glass", {
          loop: parseInt(res),
        });
      }
    });
  }
  