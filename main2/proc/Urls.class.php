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

            $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> Aristegui.com</a> </p>";

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
//
     //   function mibolsillo_com(string $url, $PPP){
     //       echo $url;
     //   }
//
     //   function excelsior_com_mx(string $url, $PPP){
     //       echo $url;
     //   }



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

            $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> https://www.infobae.com/</a> </p>";

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

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> latinu.us</a> </p>";

            return $REX;
       }

       function elfinanciero_com_mx(string $url, $PPP){

            $html = $PPP->file_get_dom($url);

                $REX["TITLE"] = $html('h1', 0)->getPlainText();
                $REX["PLAIN"] =  $html('.article-body-wrapper', 0)->getPlainText();
                $REX["HTML"]  =  $html('.article-body-wrapper', 0)->html();
                $REX["IMG"] = $html('.iKCNis img[src]', 0)->src;
                $REX["URL"] = $url;

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> elfinanciero.com</a> </p>";

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

           $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> eluniversal.com.mx</a> </p>";

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


           
           $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> eluniversal.com.mx</a> </p>";

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

               $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> dgcs.unam.mx</a> </p>";

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

               
               
               $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> cnnespanol.cnn.com</a> </p>";

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

                $REX["HTML"]  .= "<p><br/>Fuente: <a href=&quot;T".$url."&quot;T> vanguardia.com.mx</a> </p>";

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