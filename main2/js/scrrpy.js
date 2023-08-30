!/*
   Title: scrrpy.js
   Funciones especificas para SCARPPY
  
   About:
        Author DRV
        version 1.0 [30 Agosot 2023]
*/


$(function(){ 
  
    $("#initialLoader").removeClass("is-active");      
    $("#btnProcLinks").click(function(){ toStep2Two(); });


    linkProcessor();

      
 });




 function toStep2Two(){

      if($("#links").val().length > 0){ //Validacion rapida pitera...

        //Primero Ocultamos el anterior
        $("#mainSection").hide();
        $("#secondSection").show();

      }
      else
          alert("No seas cabron y metele links");

 }


    /*
       Function: linkProcessor()
       Funcion para procesar los links que se envian
    
       Parameters:
           - Lista de links  (string)
    */
    function linkProcessor(){

            $.ajax({
                    url: "proc/Url.ajax.php",
                    type: "POST",
                    data: { opc: '' },
                    dataType: 'json',
                    success: function (RES) {
                        console.log(RES);                        
                        loadNews(RES);
                    },
                    error: function (jqXHR, status, error) {
                        console.log("ERROR: algo fallo por ahi... ");
                        console.log(jqXHR);
                    }
            });

    }


    /*
       Function: loadNews()
       Funcion para cargar los elementos de las noticias 
    
       Parameters:
          REX - Recursos de datos para cargar (JSON)
    */
    function loadNews(REX){


        REX.forEach(function(row){
            console.log(row);                
            $("#secondSection").append(addBox(row));
        });

        //addBox(REX)

    }


    /*
        Function: addBox()
        Funcion para agregar datos a una caja y mostrarla!!!

        Parameters:
              ELE - Elemento de datos para cargar (json)

        Returns:
              BOX - Caja con los datos completos (string)

    */
    function addBox(ELE){
        
         let BOX = ` <div class='box'> 
                            <div class='columns'>
                                <div class='column is-2 pointer'><img src='${ELE.IMG}'></div>
                                <div class='column is-8'>
                                    <div><span class='mTitle pointer'>${ELE.TITLE}</span>
                                        <button class='button is-small'> <span class='icon is-medium'> <i class='far fa-clipboard'></i></span></button></div>
                                    <div class='pointer'>${ELE.PLAIN}</div>
                                </div>
                                <div class='column is-2'>
                                    <div class='columns '>
                                        <div class='column'> 
                                            <button class='button is-info w100'><span>PLAIN</span><span class='icon'><i class='far fa-clipboard'></i></span></button> <p>&nbsp;</p>
                                            <button class='button is-info w100'><span>HTML</span> <span class='icon'><i class='far fa-clipboard'></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='columns'>
                                <div class='column is-12 linkz pointer'>${ELE.URL}</div>
                            </div>
                        </div> `;
        
        return BOX;
    }