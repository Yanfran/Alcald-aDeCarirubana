// filter array 
let filterarray =[];

document.getElementById('spinner').style.display = 'block';
fetch('http://localhost:8080/Admin/api/libros_revistas.php', {
    method: "GET", // POST, PUT, DELETE, etc.
    headers: {
      "Content-Type": "text/plain;charset=UTF-8"
    }
})
.then(response => response.json())
.then(galleryarray => {
    // console.log(galleryarray.data)
    showgallery(galleryarray.data);

    
    let show = galleryarray.data;
    // For Live Searching Product
    document.getElementById("myinput").addEventListener("keyup",function(){
        let text = document.getElementById("myinput").value;

        filterarray= show.filter(function(a){

            if(a.titulo.toLowerCase().includes(text)){
                return a.titulo;
            } else if(a.titulo.includes(text)){
                return a.titulo;
            }

       });
       if(this.value==""){
           showgallery(show);
       }
       else{
           if(filterarray == ""){
               document.getElementById("para").style.display = 'block'
               document.getElementById("card").innerHTML = ""; 
           }
           else{

               showgallery(filterarray);
               document.getElementById("para").style.display = 'none'
           }
       }

    });

    document.getElementById('spinner').style.display = 'none';

});


// create function to show card
function showgallery(curarra){
   document.getElementById("card").innerText = "";
   for(var i=0;i<curarra.length;i++){
       document.getElementById("card").innerHTML += `

        <div class="col-lg-6 col-md-12 col-sm-12 inner-column mb-3">
            <div class="inner-content">
                <div class="download-block-one">
                    <div class="inner-box" style="padding: 50px 110px 50px 110px;">

                      <figure class="icon-box" style="line-height: 0px; background: none!important; top: 20px; left:15px; width:80px;">
                          <img src="./img/inicio/sesion_libros_revistas/caratula/${curarra[i].ruta}" alt="">
                      </figure>
                      <div class="box" style="height: 45px;">
                        <p data-toggle="tooltip" 
                              data-placement="top" 
                              title="${curarra[i].titulo}">
                              ${curarra[i].titulo}
                        </p>
                      </div>
                      <!--<p>Download the Challan Details file</p>-->
                      <div class="download-btn">
                          <a href="./img/inicio/sesion_libros_revistas/${curarra[i].documento}" target="_blank">
                              <i class="flaticon-download"></i>
                          </a>
                      </div>

                    </div>

                </div>
            </div>
        </div>

       `
   }

}




