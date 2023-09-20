<?php

include('pharse/pharse.php');


 //ini_set('user_agent', 'My-Application/2.5');

    $PPP = new Pharse();

    $URL =  "https://www.mibolsillo.com/tips/Promociones-y-descuentos-que-da-tu-tarjeta-de-Financiera-del-Bienestar-20230908-0005.html";
    $URL =  "https://www.mibolsillo.com/tips/Fiestas-patrias-CDMX-De-cuanto-es-la-multa-por-quemar-pirotecnia-sin-permiso-20230910-0010.html";
    $URL =  "https://www.mibolsillo.com/tips/Cuanto-cuesta-hacer-a-mano-las-tortillas-de-maiz-y-como-prepararlas-20230909-0013.html";
    //$URL =  "https://www.mibolsillo.com/retiro/IMSS-Cuantos-anos-debo-trabajar-para-pensionarme-por-la-Ley-del-97-20230817-0024.html";
    //$URL =  "https://www.mibolsillo.com/tips/Por-estas-4-causas-debes-cambiar-de-titular-tu-recibo-de-luz-CFE-20230807-0006.html"; 

    
    $context = stream_context_create(
                array("http" => array(
                      "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36" )));   
    
    
    //$EXT =file_get_contents($URL, false, $context);
    $html = $PPP->file_get_dom($URL, true, false, $context);
     


echo "<pre>";

    echo "<br> --------------------------------------------------- <br>";      
      echo $html('.newsfull__title', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";

    echo "https://www.mibolsillo.com".$html('.newsfull__media img', 0)->src;



    echo "<br> --------------------------------------------------- <br>";
    //Limpiamos la basuritaw

        foreach($html('.banner') as $element) { $element->clear(); }  // Algunos separadores con codigo
        foreach($html('ul') as $element) { $element->clear(); } //Lista interna pedorra  
        foreach($html('#relatedsearches1') as $element) { $element->clear(); } //Related Search 

  

    echo "<br> --------------------------------------------------- <br>";

    // foreach($html('.newsfull__body p') as $element) { 
    //     echo $element->getPlainText()."<br>"; 
    // } 
    echo $html('.newsfull__body',0)->getPlainText();

    echo "<br> --------------------------------------------------- <br>";

    echo $html('.newsfull__body',0)->html();

    // foreach($html('.paragraph') as $element) { 
 
    //         $TXT .= $element->getPlainText();
    //         $HTML .= $element->html();
    // }

/*
    echo $TXT;
    echo "<br> --------------------------------------------------- <br>";
    echo $HTML;

*/