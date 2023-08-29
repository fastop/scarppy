<?php

include('pharse/pharse.php');



    $PPP = new Pharse();


    $html = $PPP->file_get_dom('https://www.escapadah.com/destinos/2023/8/11/aguas-turquesa-arenas-doradas-asi-es-puertecitos-un-oasis-de-mar-desierto-en-bc-12620.html');

   // $html = Pharse::file_get_dom('https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/');

echo "<pre>";
    // print_r($html);
    //$demo =  $html(".titulo");

 
    //foreach($demo as $element) {
    //    print_r( $element );
    //}


    echo $html('.titulo', 0)->getPlainText();


    //Quitamos estos elementos de mierda xD
    foreach($html('.container') as $element) {
        $element->setInnerText('');
      }


    echo "<br>";
    //echo $html('.article-content--cuerpo', 0)->getPlainText();
    echo $html('.article-content--cuerpo', 0)->html();
    echo "<br>";
    echo "<br> >> ";
    //echo $html('figure span span img');
/*    echo $html('figure span span img[src]',1)->getPlainText();

    echo "<br> >> ";
    //echo $html('img', 0)->getPlainText();
    
    
    // foreach($html('img[src] .full') as $element) {
    //     echo urldecode($element->src), "<br>"; 
    //   }
    

      // echo $html('img[src] .full', 0)->src;
      $image = urldecode($html('img[src] .full', 0)->src);

      $image = explode("=", $image);
      $image = explode("&",$image[1]);
      
      echo $image[0];
      
*/


      echo "<br> ----------------------------------------------";