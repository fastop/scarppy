<?php

 /** ****************************************************
 *  @file Urls.class.php 
 * 
 *  @brief Archivo principal para el manejo de las classe
 * 
 *  @author DRV
 *  @date Agosto 2022
 *
 *  @version 1.0 
 ****************************************************** */ 


class Urls {
 
         /** CONSTRUCTOR */
        function __construct() { //Inicializamos en el constructor...
        }

        /**
         *  Funciones (metodoss) para procesar lo de cada pagina
         */ 


        function aristeguinoticias_com($url, $PPP){

            $html = $PPP->file_get_dom($url);

            //Quitamos los link de "Te puede interesar"
            foreach($html('strong, b') as $element) {

                    $tmp = trim($element->getPlainText());

                    if (fnmatch("Te p* interesar*", $tmp)) {                    
                        $element->parent->setInnerText("");
                    }
            }
 
            $image = urldecode($html('img[src] .full', 0)->src);
            $image = explode("&", explode("=",$image)[1])[0];
           

            $REX["TITLE"] = $html('.titulo-principal', 0)->getPlainText();
            $REX["PLAIN"] = $html('.wrappercont', 0)->getPlainText();
            $REX["HTML"]  = $html('.wrappercont', 0)->html();
            $REX["IMG"] = $image;//[0];
            $REX["URL"] = $url;

            $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> Aristegui.com</a> </p>";

            //Recortamos por comodidad de todo tipo ...
            // $REX["PLAIN"] = substr($REX["PLAIN"], 0, 186)."...";

           return $REX; //Array
        }


//        function escapadah_com(string $url, $PPP){
            //echo $url;
            
             //  $DOM = $this->getMyDOM($url); 
             //   $anchorTags = $DOM->getElementsByTagName('H1');
//
             //   print_r($anchorTags);
//
             //   foreach($anchorTags as $AT){
             //            print_r($AT);
             //   }
//

//               // .titulo-principal
//
//               foreach($anchorTags as $i =>$anchorTag){
//
//                        echo $anchorTag."<br>";
//               }

              //  echo $data;
 
//        }

     //   function soynomada_news(string $url, $PPP){
     //       echo $url;
     //   }




       function mibolsillo_com(string $url, $PPP){
           // echo $url;

           $context = stream_context_create(
            array("http" => array(
                  "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36" )));   

            $html = $PPP->file_get_dom($url, true, false, $context);

                //Limpiamos las basurillas
                foreach($html('.banner') as $element) { $element->clear(); }  // Algunos separadores con codigo                
                foreach($html('#relatedsearches1') as $element) { $element->clear(); } //Related Search 
                foreach($html('.ck-youtube') as $element) { $element->clear(); } //Related Search 


                $TT = array("También te recomendamos*", "También recomendamos*", "También te puede interesar*","Recomendamos*","Lee también*");
                $TERMSX = array("Puede leer:", "Sigue leyendo:","Te sugerimos leer:","Otros temas de interés:","Además:","Notas relacionadas:","Si quieres ahorrar","Si lo que buscas es ahorrar");
            
            
                //Eliminamos los culeros
                foreach($html('.newsfull__body p,b') as $element) {
            
                    $tmp = $element->getPlainText();
            
                    if(fnmatch($TT[0], $tmp) || fnmatch($TT[1], $tmp) || fnmatch($TT[2], $tmp) || fnmatch($TT[3], $tmp)){                        
                      $element->clear();
                    }
            
                }

                    
                    $TXT = "";    
                    $HTML= "";
                    

                    //Quitamos las recomendaciones
                    foreach($html('.newsfull__body p, h1, h2, h3, ul, ol') as $element) {

                        $tmp = $element->getPlainText();

                        $rem = explode(",", $tmp); //Para los casos de amazon
                            if(in_array($rem[0], $TERMSX))                              
                                break;

                        $TXT .= $element->getPlainText();
                        $HTML .= $element->html();
                    }

            
                $REX["TITLE"] = $html('.newsfull__title', 0)->getPlainText();

                $REX["PLAIN"] = $TXT;
                $REX["HTML"]  = $HTML;
                $REX["IMG"] = "https://www.mibolsillo.com".$html('.newsfull__media img', 0)->src;;
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> mibolsillo.com</a> </p>";

            return $REX; 
        }


       function debate_com_mx(string $url, $PPP){

                $context = stream_context_create(
                    array("http" => array(
                          "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36" )));   

                $html = $PPP->file_get_dom($url, true, false, $context);

                //Limpiamos la basuritaw

                foreach($html('.inlinearticle') as $element) { $element->clear(); }  // Eliminamos los articulos en el texto
                foreach($html('.body .list') as $element) { $element->clear(); } //Eliminamos las listas pedorras         
                foreach($html('.embed') as $element) { $element->clear(); } //Quitamos las alter noticias       
                foreach($html('.bannercover') as $element) { $element->clear(); } //Quitamos TODA las shits que digan publicidad :V      



                $REX["TITLE"] = $html('h1', 0)->getPlainText();
                $REX["PLAIN"] = $html('.body',1)->getPlainText();
                $REX["HTML"]  = $html('.body',1)->html();
                $REX["IMG"] = $html('.image img', 0)->src;
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> debate.com.mx</a> </p>";

            return $REX;  
       }



       function excelsior_com_mx(string $url, $PPP){
           // echo $url;

           $html = $PPP->file_get_dom(trim($url));

            //Primero tenemos que filtrar por que "ADRENALINA" funciona  completamente diferente :V
            if(strpos($url,"adrenalina"))
                $REX = $this->procAadrenalina($html);
            else
                $REX = $this->procExcelsiorNormie($html);

            $REX["URL"] = $url;
            $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> excelsior.com.mx/</a> </p>";

          return $REX;
       }


       function infobae_com(string $url, $PPP){
          // echo $url;

            $html = $PPP->file_get_dom(trim($url));
                
            $TXT = "";
            $HTML = "";

            foreach($html('.paragraph') as $element) { 
                        $TXT .= $element->getPlainText();
                        $HTML .= $element->html();
            }


            $REX["TITLE"] = $html('.article-headline', 0)->getPlainText();
            $REX["PLAIN"] = $TXT;
            $REX["HTML"]  = $HTML;
            $REX["IMG"] =  $html('.visual__image img', 0)->src;
            $REX["URL"] = $url;

            $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> infobae.com/</a> </p>";

            return $REX;
           
       } 

       function latinus_us(string $url, $PPP){
        //   echo $url;


             $html = $PPP->file_get_dom($url);

            //Primero quitamos la basurita sarrita (da igual si hay o no)

                    //Eliminamos las sugerencias pedorras

                    $TERMS = array("Puedes leer:", "Te sugerimos:","Te podría interesar:","Te recomendamos:","Lee también:");

                    foreach($html('strong, b') as $element) {

                        $tmp = trim($element->getPlainText());

                        if(in_array($tmp, $TERMS)){
                            $element->clear();
                        }
                    }


                    //Despues washamos si es video o no y le damos...

                    $IMAGE = $html('.wp-caption img', 0)->src;

                    $TXT = "";
                    $HTML = "";

                    if(is_null($IMAGE)){
                            // echo "NO hay imagen perrro";
                                $PX = $html(".at-above-post");
                                foreach($PX as $i=>$element) { 
                                    // echo $element->parent->getPlainText();

                                    $TXT .= $element->parent->getPlainText();
                                    $HTML .= $element->parent->html();
                                } 
                        $IMAGE ="imgs/latinusv_logo.png";
                    }
                    else{ 
                        // echo "Si hay imagen perrri";
                        $ele = '.elementor-widget-container p';
                        $PX = $html($ele);
                        foreach($PX as $i=>$element) { 

                            if($i>1 && $i<count($PX)-1){
                                $TXT .= $element->getPlainText();
                                $HTML .= $element->html();                    
                            }
                        }
                    }
 
                 $TITLE = $html('.elementor-widget-container h1', 0)->getPlainText();

 
                $REX["TITLE"] = $TITLE;
                $REX["PLAIN"] = $TXT;
                $REX["HTML"]  = $HTML;
                $REX["IMG"] = $IMAGE;
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> latinu.us</a> </p>";

            return $REX;
       }

       function elfinanciero_com_mx(string $url, $PPP){

            $html = $PPP->file_get_dom($url);

                $REX["TITLE"] = $html('h1', 0)->getPlainText();
                $REX["PLAIN"] =  $html('.article-body-wrapper', 0)->getPlainText();
                $REX["HTML"]  =  $html('.article-body-wrapper', 0)->html();
                $REX["IMG"] = $html('.iKCNis img[src]', 0)->src;
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> elfinanciero.com</a> </p>";

            return $REX;
       }

       function eluniversal_com_mx(string $url, $PPP){
           // echo $url;

           $html = $PPP->file_get_dom($url);


           $xHTML ="";
           $xPLAIN="";
           
           foreach($html('.sc__font-paragraph') as $element) {
               
               $tmp = $element->html();                             
       
                 if (!fnmatch("*Lee también:*", $tmp) && !fnmatch("*Suscríbete aquí*", $tmp)  ) {        
                   
                       $xHTML .= $element->html();
                       $xPLAIN.= $element->getPlainText();
                   // echo $tmp;
       
                 }
                  //else
                  //  echo "<strong>ELIMINAMOSM</strong>";
       
            }
 
           $REX["TITLE"] = $html('.title', 0)->getPlainText();
           $REX["PLAIN"] = $xPLAIN;
           $REX["HTML"]  = $xHTML;
           $REX["IMG"] = "imgs/universal_logo.png";
           $REX["URL"] = $url;

           $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> eluniversal.com.mx</a> </p>";

           return $REX;
 
       }

       function milenio_com(string $url, $PPP){
          // echo $url;
           $html = $PPP->file_get_dom(trim($url));

         foreach($html('.nd-related-news-detail-media-dual') as $element) { //Eliminamos la "shit"                      
             $element->clear();
         }
          
         foreach($html('.nd-text-highlights-detail-bold') as $element) {          
              $element->clear();
          }

          foreach($html('.instagram-media') as $element) {          
               $element->clear();
           }

           
           
           $last = count($html(".nd-media-detail-base__img"));
           

           $REX["TITLE"] = $html('.nd-title-headline-title-headline-base__title', 0)->getPlainText();
           $REX["PLAIN"] = $html('#content-body', 0)->getPlainText();
           $REX["HTML"]  = $html('#content-body', 0)->html();
           $REX["IMG"] = $html(".nd-media-detail-base__img", $last-1)->src; //"imgs/milenio_logo.png";
           $REX["URL"] = $url;


           
           $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> eluniversal.com.mx</a> </p>";

           return $REX;
       }

       function dgcs_unam_mx(string $url, $PPP){
           // echo $url;

           $html = $PPP->file_get_dom(trim($url));
               
               $TXT = "";
               $HTML = "";

               foreach($html('article p[align="justify"]') as $element) { 
                         $TXT .= $element->getPlainText();
                         $HTML .= $element->html();
               }


               $REX["TITLE"] = $html('#content h2', 0)->getPlainText();
               $REX["PLAIN"] = $TXT;
               $REX["HTML"]  = $HTML;
               $REX["IMG"] = "https://www.dgcs.unam.mx/boletin/bdboletin/".$html('.featured img', 0)->src;
               $REX["URL"] = $url;

               $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> dgcs.unam.mx</a> </p>";

          return $REX;

       }


       function cnnespanol_cnn_com(string $url, $PPP){

             $html = $PPP->file_get_dom(trim($url));

               $tray = "/video/";//Por si se viene por "error" algo que es video

               if(stripos($url, $tray)){

          
                    $REX["TITLE"] = $html('.news__title', 0)->getPlainText();
                    $REX["PLAIN"] = $html('.news__excerpt', 0)->getPlainText();
                    $REX["HTML"]  = $html('.news__excerpt', 0)->html();
                    $REX["IMG"] = "imgs/cnnes_logo.png"; //$html(".image", 0)->src; //Como tiene lazy taaardaaaa
                    $REX["URL"] = $url;


               }
               else //SI es normalito
               {
                    //Clean Shit!!
                    foreach($html('.storyfull__gallery') as $element) {     
                         $element->clear();
                    }
          
                    foreach($html('ul') as $element) {     
                         $element->clear();
                    }         
          
                    foreach($html('.tags') as $element) {     
                         $element->clear();
                    }         
          
                    $REX["TITLE"] = $html('.storyfull__title', 0)->getPlainText();
                    $REX["PLAIN"] = $html('.storyfull__body', 0)->getPlainText();
                    $REX["HTML"]  = $html('.storyfull__body', 0)->html();
                    $REX["IMG"] = "imgs/cnnes_logo.png"; //$html(".image", 0)->src; //Como tiene lazy taaardaaaa
                    $REX["URL"] = $url;

               }

               
               
               $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> cnnespanol.cnn.com</a> </p>";

          return $REX;

       }
 
       function vanguardia_com_mx(string $url, $PPP){
          ///     echo $url;

           $html = $PPP->file_get_dom(trim($url));


           //Clean before the action ...
               foreach($html('.block__title') as $element) { $element->clear(); }
               foreach($html('#mc_embed_signup') as $element) { $element->clear(); }               
               foreach($html('.VideoVanguardiapro') as $element) { $element->clear(); }
               foreach($html('.twitter_text') as $element) { $element->clear(); }

               foreach($html('#leer') as $element) { $element->clear(); }
               foreach($html('script') as $element) { $element->clear(); }
               foreach($html('p[data-mrf-recirculation="Te puede interesar - Entre párrafos"]') as $element) { $element->clear(); }
  
               foreach($html('p b') as $element) {             
                    if(trim($element->getPlainText()) == "TE PUEDE INTERESAR:"){
                       $element->parent->clear(); 
                    }
                }
        
                //Images
                    $tmp =  $html('.cutlineShow img', 0)->attributes["data-srcset"];
                    $SS =  explode(" ",$tmp);
                    $image = "https:".$SS[0];


                $REX["TITLE"] = $html('.headline', 0)->getPlainText();
                $REX["PLAIN"] = $html('div[itemprop="articleBody"]', 0)->getPlainText();
                $REX["HTML"]  = $html('div[itemprop="articleBody"]', 0)->html();
                $REX["IMG"] =  $image; //$html(".cutlineShow img", 0)->src; //Como tiene lazy taaardaaaa
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;".$url."&quot;> vanguardia.com.mx</a> </p>";

                return $REX;
       }



       //================================================================================================
       // FUNCIONES DE SOPORTE
       //================================================================================================


            /** 
             *   @brief Metodo de ayuda para excelsior!
             *   SOLO procesa la seccion "ADRENALINA", ya que es totalmente diferente
             *   al resto.
             *     
             *   @param html    Objeto HTML para procesar (obj)
             *   @return REX	Recursos necesarios (array)
             */            
            function procAadrenalina($html){

                $REX["TITLE"] = $html('.node-title', 0)->getPlainText();
                $REX["IMG"] =  $html('.single-image', 0)->src;

                    //BASURITA 
                    $html('#block-dfp-300x250-adrenalina-tags-7', 0)->clear(); //Quitamos unos JS que se incrustaba

                    foreach($html('.txt-copyright') as $element){ $element->clear(); }//Quitamos el copy :P
                    foreach($html('.banner-content-ads') as $element){ $element->clear(); }//Quitamos anuncios :P


                    foreach($html('.node-body p a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
                    foreach($html('.node-body div a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
                            
                    foreach($html('.node-body .dugout-video') as $element){ $element->clear(); }//Quitamos el video
                    foreach($html('.node-body #dugout-video-0') as $element){ $element->clear(); }//Quitamos el video
                    
                    //El problema es el video ...
                    foreach($html('.dugout-title-bar__title') as $element){ $element->clear(); }//Quitamos el video
                    foreach($html('#player-1') as $element){ $element->clear(); }


                    $REX["PLAIN"] = $html('.node-body', 0)->getPlainText();
                    $REX["HTML"]  = $html('.node-body', 0)->html();

            
                return $REX;

            }
 

            /** 
             *   @brief Metodo de ayuda para excelsior!
             *     
             *   @param html    Objeto HTML para procesar (obj)
             *   @return REX	Recursos necesarios (array)
             */
            function procExcelsiorNormie($html){

                $REX["TITLE"] = $html(".title",0)->getPlainText();

                //Limpiamos el contenido antes de la accion                
                foreach($html('.body-node p strong') as $element){ 
                    
                    $tmp = trim($element->getPlainText());
                    //Limpiamos las recomendaciones
                    if(fnmatch("Te recomen*", $tmp ))
                        $element->clear();
                }

                $REX["PLAIN"] = $html(".body-node",0)->getPlainText();
                $REX["HTML"]  = $html(".body-node",0)->html();
                $REX["IMG"] = $html(".main-image img[src]",0)->src; 
        
                return $REX;
            }



       //================================================================================================

        function error_handler(string $url){

        }


        /**
         * 
         */


         /** 
          *   @brief Metodo para splitear url segun dominio
          *     
          *   @param url    URL completo del sitio (string)
          *   @return spell   Dominio (string)
          */
         function xplodeURL(string $url){

            $spell = parse_url($url, PHP_URL_HOST);

            if(is_null($spell))
                $spell = parse_url("https://".$url, PHP_URL_HOST);            
            

            return $spell;
         }


         /** 
          *   @brief Metodo para crear un objeto DOM segun la URL dada
          *     
          *   @param url		    Url del sitio a escarvar (string)
          *   @return htmlDOM		Retrono x (Objeto DOMDocument)
          */
         static function getMyDOM($url){            
            
            //Contexto
            $context = stream_context_create(array("http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36")));

            $data = file_get_contents($url, false, $context);

                $htmlDOM = new DOMDocument; //Creamos un nuevo DOMDocument        
                 @$htmlDOM->loadHTML($data); //Cargamos el HTML en String

            return $htmlDOM;
         }
 


}