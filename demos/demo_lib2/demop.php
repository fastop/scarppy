<?php

include('pharse/pharse.php');



    $PPP = new Pharse();


   //  $url = 'https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/';

    $url = "https://aristeguinoticias.com/1508/kiosko/barbie-rinde-tributo-a-maria-felix/";
    

    $html = $PPP->file_get_dom($url) or die("FALLO");

   // $html = Pharse::file_get_dom('https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/');

echo "<pre>";
    //print_r($html);

    $demo =  $html(".titulo-principal");

    
    //foreach($demo as $element) {
    //    print_r( $element );
    //}

//    try{

  
    echo $html('.titulo-principal', 0)->getPlainText();
    echo "<br>";
    echo $html('.wrappercont', 0)->getPlainText();
    echo "<br>";
    echo "<br> >> ";
    //echo $html('figure span span img');
    echo "*** ";
    echo $html('figure span span img[src]',0)->getPlainText();
    echo "*** ";
    echo "<br> >> ";
    //echo $html('img', 0)->getPlainText();
    
    
    // foreach($html('img[src] .full') as $element) {
    //     echo urldecode($element->src), "<br>"; 
    //   }
    

      // echo $html('img[src] .full', 0)->src;
      $image = urldecode($html('img .full', 0)->src);

      $image = explode("=", $image);
      $image = explode("&",$image[1]);
      
      echo $image[0];
  
 //  } catch(Exception $ex){
 //    echo "Algo trono por ahi, madale esto a tu dios: ";
 //    echo $ex->getMessage();
 //  }



      echo "<br> ----------------------------------------------";

 

      