function salir(){
    location.href="../php/salir.php";
  }
  
  function getLogin(){
  
      var passwors = $('#idtxtpassword').val();
      var usuario = $('#idtxtusuario').val();
     if(passwors=="" || usuario==""){
         $('#msg').css('display','block');
         setTimeout(()=>{
            $('#msg').css('display','none');
         },3000);
     }else{
          
          var formData = new FormData(document.getElementById("loginForm"));
          $.ajax({
              url: "../acceso/entrar.php",
              type: "post",
              dataType: "html",
              data: formData,
              cache: false,
              contentType: false,
              processData: false
          })
          .done(function(res){
              //console.log(res);
              //$("#mensaje").html("" + res);
              if(res==0){
                  $('#msg2').css('display','block');
                   setTimeout(()=>{
                      $('#msg2').css('display','none');
                   },3000);
              }else if(res==1){
                  location.href="../menu/";
  
                  //location.href="../menu/";
              }else if(res==3){
                  $('#msg4').css('display','block');
                   setTimeout(()=>{
                      $('#msg4').css('display','none');
                   },3000);
              }else if(res==4){
                  $('#msg3').css('display','block');
                   setTimeout(()=>{
                      $('#msg3').css('display','none');
                   },3000);
              }
          });
      }
  }
  
  function ingresar(){
     var passwors = $('#pass').val();
     if(passwors==""){
         $('#msg').css('display','block');
         setTimeout(()=>{
            $('#msg').css('display','none');
         },3000);
     }else{
          var formData = new FormData();
          formData.append('txtcontra',passwors);
          $.ajax({
              url: "../acceso/ingreso.php",
              type: "post",
              dataType: "html",
              data: formData,
              cache: false,
              contentType: false,
              processData: false
          })
          .done(function(res){
              //$("#mensaje").html("" + res);
              if(res==0){
                  $('#msg2').css('display','block');
                   setTimeout(()=>{
                      $('#msg2').css('display','none');
                   },3000);
              }else if(res==1){
                  location.href="../menu/";
              }else if(res==3){
                  $('#msg4').css('display','block');
                   setTimeout(()=>{
                      $('#msg4').css('display','none');
                   },3000);
              }
          });
     }
  }
  
  
  
  