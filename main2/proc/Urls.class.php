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


        function escapadah_com(string $url, $PPP){

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
 
        }

        function soynomada_news(string $url, $PPP){
            echo $url;
        }

        function mibolsillo_com(string $url, $PPP){
            echo $url;
        }

        function excelsior_com_mx(string $url, $PPP){
            echo $url;
        }

        function infobae_com(string $url, $PPP){
            echo $url;
        }

        function latinus_us(string $url, $PPP){
            echo $url;
        }

        function elfinanciero_com_mx(string $url, $PPP){
            echo $url;
        }

        function eluniversal_com_mx(string $url, $PPP){
            echo $url;
        }

        function dgcs_unam_mx(string $url, $PPP){
            echo $url;
        }

        function cnnespanol_cnn_com(string $url, $PPP){
            echo $url;
        }

        function vanguardia_com_mx(string $url, $PPP){
            echo $url;
        }


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