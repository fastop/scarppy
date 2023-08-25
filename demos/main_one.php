<?php
namespace Foobar;
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


include "Urls.class.php";


$SITES = new Urls();

echo "<pre>";

//Obtenemos las URLS a mogollon!
$urls = "www.escapadah.com
www.soynomada.news
www.mibolsillo.com
www.excelsior.com.mx
www.infobae.com
latinus.us
www.elfinanciero.com.mx
www.eluniversal.com.mx
www.dgcs.unam.mx
cnnespanol.cnn.com
vanguardia.com.mx";


    $URLX = explode(PHP_EOL, $urls); //Explotamos los END OF LINE

    foreach($URLX  as $url){

        $URL = $SITES->xplodeURL(trim($url));
        // echo $URL."<br>";

        $fURL = str_replace('.','_', str_replace('www.','',$URL.""));

        call_user_func_array(array(__NAMESPACE__ .'\Urls', 'escapadah_com'), array(trim($url)));
        
                   
        // echo $URL."<br>";
        echo "<br>";

    }


     //$SITES->procUniversal("KKKK");
     //__NAMESPACE__.Urls::procUniversal("AAAA");


?>