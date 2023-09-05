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

                        $("#loadr").hide();
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
                                <div class='column is-2 pointer'><img src='${ELE.IMG}' onclick='setToClipboard(\"${ELE.IMG}\", \"Imagen\")'></div>
                                <div class='column is-8'>
                                    <div><span class='mTitle pointer' onclick='setToClipboard(\"${ELE.TITLE}\", \"Titulo\" )'>${ELE.TITLE}</span>
                                        <button class='button is-small' onclick='sendToMAXI(\"${ELE.TITLE}\",\`${ELE.HTML}\`,\"${ELE.URL}\")'> <span class='icon is-medium'> <i class='far fa-clipboard'></i></span></button></div>
                                    <div class='pointer'>${ELE.PLAIN.substr(0, 165)+"..."}</div>
                                </div>
                                <div class='column is-2'>
                                    <div class='columns '>
                                        <div class='column'> 
                                            <button class='button is-info w100' onclick='setToClipboard(\"${ELE.PLAIN}\", \"Texto Plano\")'><span>PLAIN</span><span class='icon'><i class='far fa-clipboard'></i></span></button><p>&nbsp;</p>
                                            <button class='button is-info w100' onclick='setToClipboard(\`${ELE.HTML}\`, \"HTML\")'><span>HTML</span> <span class='icon'><i class='far fa-clipboard'></i></span></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='columns'>
                                <div class='column is-12 linkz pointer ellipsis' onclick='setToClipboard(\"${ELE.URL}\",\"URL\")'>${ELE.URL}</div>
                            </div>
                        </div> `;
        
        return BOX;
    }

    /*
       Function: setToClipboard()
       Funcion para copiar un valor directamente al porta-papeles
    
       Parameters:
          UDATA - Datos a copiar (string)
          type - Tipo de elemento al que se le dio clic (string)
    */
    function setToClipboard(UDATA, type){

        $("#toasty").text(type+" copiad@");
        $("#toasty").show(150, function(){ 

                     setTimeout(function() { $("#toasty").hide(150) }, 400);
             });

        navigator.clipboard.writeText(UDATA);

        //$("#toasty").hide(150)

    }



    /*
       Function: sendToMAXI()
       Funcion para enviar la nota directamente al maxi!!!!
    
       Parameters:          
          TITULO - Titulo de la publicacion (string)
          CONTENIDO - Texto del articulo (string)
          URL - Direccion de la noticia [fuente] (string)
    
    */
    function sendToMAXI(TITULO, CONTENIDO, URL){

        const AMP ="%27";
              TITULO = AMP+TITULO+AMP;
              CONTENIDO = AMP+""+AMP; //AMP+CONTENIDO+AMP;
              URL = AMP+URL+AMP; // AMP+"Fuente: "+AMP; //AMP+"Fuente: "+URL+AMP;
 
          
          URI ="javascript:var TITULIN="+TITULO+",URL="+URL+", CONTENIDO="+CONTENIDO;
          URI +="d=document,w=window,e=w.get:OSelection,k=d.getSelection,x=d.selection,s=(e?e():(k)?k():(x?x.createRange().text:0)),f=%27https://www.feeling.com.mx/site/wp-admin/press-this.php%27,l=d.location,e=encodeURIComponent,u=f+%27?u=%27+e(URL)+%27&t=%27+TITULIN+%27&s=%27+e(CONTENIDO)+%27&v=4%27;a=function(){if(!w.open(u,%27t%27,%27toolbar=0,resizable=1,scrollbars=1,status=1,width=720,height=570%27))l.href=u;};if (/Firefox/.test(navigator.userAgent)) setTimeout(a, 0); else a();void(0)";

          location.href= URI.replace(/\n/g,'');

    } 