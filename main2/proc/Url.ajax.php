<?php

 /** ****************************************************
 *  @file main_one.php 
 * 
 *  @brief Archivo principal para probar las cargas de URL 
 * 
 *  @author DRV
 *  @date Agosto 2023
 *
 *  @version 1.0 
 ****************************************************** */ 

 require "../libs/pharse/pharse.php";
 require "Urls.class.php"; 

 error_reporting(0);
 
$PPP = new Pharse();//Pharser
$SITES = new Urls();
 

       $urls =  $_POST["links"]; //Lista de links 
 

    // $URLX = explode(PHP_EOL, $urls); //Explotamos los END OF LINE
    $URLX = explode("\n", $urls); //Explotamos los enters al final de cada url


    $REX = [];


    foreach($URLX  as $url){

        $URL = $SITES->xplodeURL(trim($url));
        $fURL = str_replace('.','_', str_replace('www.','',$URL.""));

 
            if(is_callable(array($SITES, $fURL))){
                
                $TMP = call_user_func_array(array($SITES, $fURL), array(trim($url), $PPP));
                array_push($REX, $TMP);

            }
            else{
                
                $TMP["TITLE"] = "❗❗❗ADVERTENCIA❗❗❗";
                $TMP["PLAIN"] = "No se puede acceder a esta URL!!! ☠️<br/> 👺Por favor acuda con el master de master para solucionar esto :3 ";
                $TMP["HTML"]  = "No se puede acceder a esta URL!!! ☠️<br/> 👺por favor acuda con el master de master para solucionar esto :3 ";
                $TMP["IMG"] = "imgs/not_found.jpg";
                $TMP["URL"] = $url;
                
                array_push($REX, $TMP);
            }
  
    }


    // print_r($REX);

        echo json_encode($REX,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

 

?>