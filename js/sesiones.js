function listarSesionCarirubana2(){
    $.ajax({
        url: "../apirest/alcalde.php",
        type: "post",
        dataType: "json",
      //   data: formData,
      cache: false,
      contentType: false,
      processData: false
    }).done(function(res){
        // console.log(res.data[0])        
        $("#id").val(res.data[0].id);
        $("#titulo").val(res.data[0].titulo);
        $("#subtitulo").val(res.data[0].subtitulo);
        $("#descripcion").val(res.data[0].descripcion);
        $("#categoriaR").val(res.data[0].categoria);
        $("#etiqueta1").val(res.data[0].etiqueta1);
        $("#etiqueta2").val(res.data[0].etiqueta2);
        $("#descripcion_ruta").val(res.data[0].descripcion_ruta);
        $("#preview_img").attr('src', '../img/inicio/sesion_carirubana/'+res.data[0].ruta);
        $("#enlace_img").attr('href', '../img/inicio/sesion_carirubana/'+res.data[0].ruta);                      
        
        console.log(res.data[0].categoria);
        obtenerDatos(res.data);
    });
}

function obtenerDatos(data){
    $(".info").click(function(){
            // let element = $(this)[0].parents('tr').data();
            // console.log(element)
            // $("#formSesionCarirubanaEditar2")[0].reset();
            // $("#dataInput")[0].reset();
            // console.log(data[0].ruta);

            // $("#tb-sesion-carirubana").data('id',data.id);
            // $("#tb-sesion-carirubana").data('antigua',data.ruta);
            $("#txtidE").val(data[0].id);
            $("#idtxttituloE").val(data[0].titulo);
            $("#idtxtsubtituloE").val(data[0].subtitulo);
            $("#idtxtdescripcionE").val(data[0].descripcion);
            $("#idtxtcategoriaE").val(data[0].categoria);
            $("#idtxtetiqueta1E").val(data[0].etiqueta1);
            $("#idtxtetiqueta2E").val(data[0].etiqueta2);
            $("#idtxtdescripcionimgE").val(data[0].descripcion_ruta);

            $("#idAntiguo").val(data[0].ruta);
            $("#preview_imgE").attr('src', '../img/inicio/sesion_carirubana/'+data[0].ruta);
            $("#enlace_imgE").attr('href', '../img/inicio/sesion_carirubana/'+data[0].ruta);

            
            $("#tabla_vista").css('display','none');
            $("#info_usuario").css('display','block');    

        
        
        
    });
}


function tramitesServicios(){
    $.ajax({
        url: "../apirest/tramites_y_servicios.php",
        type: "post",
        dataType: "json",
      //   data: formData,
      cache: false,
      contentType: false,
      processData: false
    }).done(function(res){
        // console.log(res)        
        $("#id").val(res.data[0].id);
        $("#titulo").val(res.data[0].titulo);        
        $("#descripcion").val(res.data[0].descripcion);
        $("#categoria").val(res.data[0].categoria);
        $("#categoria_carousel").val(res.data[0].categoria_carousel);
        $("#titulo_carousel").val(res.data[0].titulo_carousel);
        $("#icono").val(res.data[0].icono);        
        $("#preview_img").attr('src', '../img/inicio/sesion_tramites_servicios/'+res.data[0].ruta);
        $("#enlace_img").attr('href', '../img/inicio/sesion_tramites_servicios/'+res.data[0].ruta);
       
        
        obtenerDatos(res.data);
    });
}









