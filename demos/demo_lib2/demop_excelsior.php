<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

    $URL =  "https://www.excelsior.com.mx/adrenalina/reloj-ricardo-ten-glasgow/1603401";   
      
    $html = $PPP->file_get_dom($URL);
    
echo "<pre>";


    echo "<br> --------------------------------------------------- <br>";      
          echo $html('.node-title', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";
        echo $html('.single-image', 0)->src;
    echo "<br> --------------------------------------------------- <br>";


    //BASURITA

    // block-dfp-300x250-adrenalina-tags-7
    $html('#block-dfp-300x250-adrenalina-tags-7', 0)->clear(); //Quitamos unos JS que se incrustaba

    foreach($html('.txt-copyright') as $element){ $element->clear(); }//Quitamos el copy :P
    foreach($html('.banner-content-ads') as $element){ $element->clear(); }//Quitamos el copy :P
    foreach($html('.dugout-video') as $element){ $element->clear(); }//Quitamos el copy :P




    echo $html('.node-body', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";    
    