<?php
// namespace Foobar;
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

 

    $URLX = explode(PHP_EOL, $urls); //Explotamos los END OF LINE

    foreach($URLX  as $url){

        $URL = $SITES->xplodeURL(trim($url));
        // echo $URL."<br>";

        $fURL = str_replace('.','_', str_replace('www.','',$URL.""));

        
        //call_user_func_array(array(__NAMESPACE__ .'\Urls', 'escapadah_com'), array(trim($url)));
        //call_user_func_array(array($SITES, 'escapadah_com'), array(trim($url)));

           if(!call_user_func_array(array($SITES, $fURL), array(trim($url)))){
             //SI trono... nos vamos a una funcion manejadores de errores...
                 call_user_func_array(array($SITES, "error_handler"), array(trim($url)))
           }
        
        
        
                   
        // echo $URL."<br>";
        echo "<br>";

    }


     //$SITES->procUniversal("KKKK");
     //__NAMESPACE__.Urls::procUniversal("AAAA");


?>