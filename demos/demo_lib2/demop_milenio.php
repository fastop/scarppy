<?php

include('pharse/pharse.php');



    $PPP = new Pharse();


     //$URL =  "https://www.milenio.com/politica/amlo-se-reunira-con-biden-en-noviembre-en-eu";
      $URL =  "https://www.milenio.com/espectaculos/famosos/benito-castro-muere-famoso-cantante-composito?utm_source=interno&utm_medium=mas_vistas&utm_campaign=recirculacion";
 

    $html = $PPP->file_get_dom($URL);
    

echo "<pre>";


//    echo "<br> --------------------------------------------------- <br>";
//    echo $html('.nd-title-headline-title-headline-base__title', 0)->getPlainText();


    // $html('.nd-related-news-detail-media-dual',0)->parent->clear(); //Removemos la shit

    //Removemos todas las shits       
    foreach($html('.nd-related-news-detail-media-dual') as $element) {        
        // echo $element.clear()"<br>"; //echo $element;
        $element->clear();
    }

    foreach($html('.nd-text-highlights-detail-bold') as $element) {        
        // echo $element.clear()"<br>"; //echo $element;
        $element->clear();
    }

    
    


    echo "<br> --------------------------------------------------- <br>";    
    echo $html('#content-body', 0)->getPlainText();    

    echo "<br> --------------------------------------------------- <br>";
    echo $html('#content-body', 0)->html();
 
    echo "<br> --------------------------------------------------- <br>";

      echo "<br> ----------------------------------------------";

      // .nd-related-news-detail-media-dual
      echo "<br>";
      
      $last = count($html(".nd-media-detail-base__img"));
      $html(".nd-media-detail-base__img", $last-1)->src;