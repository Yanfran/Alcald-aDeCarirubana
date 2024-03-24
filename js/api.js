// document.addEventListener("DOMContentLoaded", () => {  
//   fetchData();
// });

// const cards = document.querySelector("#card-dinamica");
// const templateCard = document.querySelector("#template-card").content;

// const fetchData = async () => {
//   try {
//       // loadingData(true);

//       const res = await fetch("../api/banner_principal.php");
//       const data = await res.json();

//       console.log(data);
//       pintarDatos(data);
//   } catch (error) {
//       console.log(error);
//   } finally {
//       // loadingData(false);
//   }
// };

// // setTimeout(fetchData, 3000);

// // const loadingData = (estado) => {
// //   const loading = document.querySelector("#loading");
// //   if (estado) {
// //       loading.classList.remove("d-none");
// //   } else {
// //       loading.classList.add("d-none");
// //   }
// // };

// const pintarDatos = (data) => {
//   const fragment = document.createDocumentFragment();

//   cards.textContent = "";

//   data.forEach((item) => {
//       const clone = templateCard.cloneNode(true);
//       clone.querySelector("h1").textContent = item.titulo;
//       clone.querySelector("p").textContent = item.descripcion;
//       clone.querySelector(".image-layer").style.backgroundImage = "url(../img/inicio/banner_principal/"+item.ruta+")";
//       // clone.querySelector("img").setAttribute("src", "../img/inicio/banner_principal/"+item.ruta);

//       fragment.appendChild(clone);
//   });
//   cards.appendChild(fragment);
// };



function BannerPrincipal(){
  // $.ajax({
  //   url: "../api/banner_principal.php",
  //   type: "post",
  //   dataType: "json",    
  //   cache: false,
  //   contentType: false,
  //   processData: false    
  // }).done(function(res){
  //     console.log(res)      

  //     var resultado = res;            
  //     var divResponse = $('#contenedor');
  //     var template = $('#template').html();
  //     console.log(template);
  //     var html = "";

  //     $(resultado).each(function(i, val) {
  //                 html += `
  //                   <section class="banner-section style-one">
  //                   <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
  //                       <div class="slide-item">
  //                           <div class="image-layer" style="background-image:url(assets/images/alcaldia/Banner/+${val.titulo}+)"></div>
  //                           <div class="auto-container">
  //                               <div class="content-box">
  //                                   <h6><i class="flaticon-star"></i>${val.categoria}</h6>
  //                                   <h1>${val.titulo}</h1>
  //                                   <p>${val.descripcion}</p>
  //                                   <div class="btn-box">
  //                                       <a href="index.html" class="theme-btn">Leer Más</a>
  //                                   </div>
  //                               </div> 
  //                           </div>
  //                       </div>                
  //                   </div>
  //               </section>
  //                 `
  //                 // html += val.titulo+"<br />";

  //               console.log(val.titulo);
  //     });
  //     divResponse.append(html);                              
  // });
}



// function tramitesServiciosApi(){
//     $.ajax({
//       url: "../api/tramites_y_servicios.php",
//       type: "post",
//       dataType: "json",    
//       cache: false,
//       contentType: false,
//       processData: false    
//     }).done(function(res){
//         // console.log(res)      
  
//         var resultado = res;            
//         var divResponse = $('#contenedor');
//         var html = "";
  
//         $(resultado).each(function(i, val) {
//           html += val.titulo+"<br />";
//           console.log(val.titulo);
//         });
//         divResponse.append(html);                              
//     });
//   }


