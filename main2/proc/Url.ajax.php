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

$PPP = new Pharse();//Pharser
$SITES = new Urls();
 

$urls = "https://aristeguinoticias.com/1108/mundo/nino-encuentra-en-alemania-moneda-romana-con-1800-anos-de-antiguedad/
https://www.escapadah.com/destinos/2023/8/11/aguas-turquesa-arenas-doradas-asi-es-puertecitos-un-oasis-de-mar-desierto-en-bc-12620.html
https://www.soynomada.news/viajes/Donde-venden-la-mejor-comida-china-en-Mexicali-y-cual-es-su-costo-aproximado-20230807-0004.html
https://www.mibolsillo.com/tips/Por-estas-4-causas-debes-cambiar-de-titular-tu-recibo-de-luz-CFE-20230807-0006.html
https://www.excelsior.com.mx/adrenalina/reloj-ricardo-ten-glasgow/1603401
https://www.infobae.com/mexico/2023/08/15/amlo-reta-a-ministros-de-la-scjn-a-frenar-distribucion-de-libros-de-texto-a-ver-si-se-atreven/
https://latinus.us/2023/08/15/mancera-impugna-tribunal-electoral-exclusion-proceso-frente-amplio-candidatura/
https://latinus.us/politica/amlo-se-reunira-con-biden-en-noviembre-en-eu
https://aristeguinoticias.com/1508/kiosko/barbie-rinde-tributo-a-maria-felix/
https://www.elfinanciero.com.mx/nacional/2023/08/15/perfil-adela-ramos-la-diputada-de-morena-que-esta-en-contra-de-los-libros-de-texto-de-la-sep/
https://www.elfinanciero.com.mx/nacional/2023/08/15/tormenta-tropical-hilary-con-posibilidad-de-huracan-lluvias-en-vivo/
https://www.eluniversal.com.mx/elecciones/enrique-de-la-madrid-queda-fuera-de-la-contienda-interna-del-frente-amplio-por-mexico/
https://www.elfinanciero.com.mx/mis-finanzas/2023/08/15/buen-fin-rifa-sat-de-500-millones-de-pesos-como-participar/
https://www.dgcs.unam.mx/boletin/bdboletin/2023_622.html
https://cnnespanol.cnn.com/2023/08/15/autoridades-migratorias-mexico-rescatan-231-migrantes-trailer-puebla-trax/
https://vanguardia.com.mx/noticias/en-pleno-verano-frente-frio-se-acerca-a-mexico-golpeara-con-descenso-en-las-temperaturas-fuertes-vientos-y-granizadas-LI8903148
https://aristeguinoticias.com/1508/mexico/unam-se-coloca-en-ranking-de-mejores-universidades-a-nivel-mundial/\
https://www.elfinanciero.com.mx/nacional/2023/08/15/perfil-adela-ramos-la-diputada-de-morena-que-esta-en-contra-de-los-libros-de-texto-de-la-sep/
https://www.elfinanciero.com.mx/estados/2023/08/15/jovenes-desaparecidos-en-jalisco-hallan-segundo-auto-en-el-que-iban-hay-presuntos-restos-humanos/
www.putasyputos.com";


 $urls = "https://aristeguinoticias.com/1508/kiosko/barbie-rinde-tributo-a-maria-felix/
 https://aristeguinoticias.com/1108/mundo/nino-encuentra-en-alemania-moneda-romana-con-1800-anos-de-antiguedad/
 https://aristeguinoticias.com/1508/mexico/unam-se-coloca-en-ranking-de-mejores-universidades-a-nivel-mundial/
 https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/";
 

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