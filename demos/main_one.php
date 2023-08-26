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
/*$urls = "www.escapadah.com
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
*/

$urls = "https://aristeguinoticias.com/1108/mundo/nino-encuentra-en-alemania-moneda-romana-con-1800-anos-de-antiguedad/
https://www.escapadah.com/destinos/2023/8/11/aguas-turquesa-arenas-doradas-asi-es-puertecitos-un-oasis-de-mar-desierto-en-bc-12620.html
https://www.soynomada.news/viajes/Donde-venden-la-mejor-comida-china-en-Mexicali-y-cual-es-su-costo-aproximado-20230807-0004.html
https://www.mibolsillo.com/tips/Por-estas-4-causas-debes-cambiar-de-titular-tu-recibo-de-luz-CFE-20230807-0006.html
https://www.excelsior.com.mx/adrenalina/reloj-ricardo-ten-glasgow/1603401
https://www.infobae.com/mexico/2023/08/15/amlo-reta-a-ministros-de-la-scjn-a-frenar-distribucion-de-libros-de-texto-a-ver-si-se-atreven/
https://latinus.us/2023/08/15/mancera-impugna-tribunal-electoral-exclusion-proceso-frente-amplio-candidatura/
https://latinus.us/politica/amlo-se-reunira-con-biden-en-noviembre-en-eu";

 

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