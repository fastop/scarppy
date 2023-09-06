<?php

include('pharse/pharse.php');



    $PPP = new Pharse();


    $html = $PPP->file_get_dom('https://www.elfinanciero.com.mx/estados/2023/08/15/jovenes-desaparecidos-en-jalisco-hallan-segundo-auto-en-el-que-iban-hay-presuntos-restos-humanos/');

   // $html = Pharse::file_get_dom('https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/');

echo "<pre>";
    // print_r($html);
    //$demo =  $html(".titulo");

 
    //foreach($demo as $element) {
    //    print_r( $element );
    //}


    echo $html('h1', 0)->getPlainText();

    echo "<br> --------------------------------------------------- <br>";
    echo $html('.article-body-wrapper', 0)->getPlainText();

    echo "<br> --------------------------------------------------- <br>";
    echo $html('.article-body-wrapper', 0)->html();

    echo "<br> --------------------------------------------------- <br>";


    echo $html('.iKCNis img[src]', 0)->src;

    echo "<br> --------------------------------------------------- <br>";



    // //Quitamos estos elementos de mierda xD
    // foreach($html('.container') as $element) {
    //     $element->setInnerText('');
    //   }
// 
// 
    // echo "<br>";
    // //echo $html('.article-content--cuerpo', 0)->getPlainText();
    // echo $html('.article-content--cuerpo', 0)->html();
    // echo "<br>";
    // echo "<br> >> ";
// 


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