<?php

include('pharse/pharse.php');



    $PPP = new Pharse();


     $URL =  "https://www.eluniversal.com.mx/elecciones/enrique-de-la-madrid-queda-fuera-de-la-contienda-interna-del-frente-amplio-por-mexico/";
  // $URL =  "https://sanluis.eluniversal.com.mx/seguridad/fiscalia-de-slp-sin-indicios-o-movil-sobre-la-desaparicion-de-directivo-de-la-empresa-valeo/";

    $html = $PPP->file_get_dom($URL);
    

   // $html = Pharse::file_get_dom('https://aristeguinoticias.com/2808/kiosko/elton-john-pasa-la-noche-en-el-hospital-tras-sufrir-caida/');

echo "<pre>";
    // print_r($html);
    //$demo =  $html(".titulo");

 
    //foreach($demo as $element) {
    //    print_r( $element );
    //}


    echo $html('.title', 0)->getPlainText();

    echo "<br> --------------------------------------------------- <br>";
    echo $html('.story__pic img' , 0)->src ;
    echo "<br>";
    
    //$(".story__pic img").src
    

     foreach($html('img[data-src]') as $element) {
        echo $element->getPlainText();
         // echo . "<br>"; 
     }

        

    echo "<br> --------------------------------------------------- <br>";

   // foreach($html('.sc__font-paragraph') as $element) {
   //     
   //     $tmp = $element->getPlainText();
   //   
   //       echo "<br>---------- ------- ------- <br>"; 
//
   //       if (fnmatch("Lee también:*", $tmp)) {        
   //         echo "<strong>ELIMINAMOSM</strong>";          
   //         //$element->parent->parent->setInnerText("");
   //         //$element->parent->clear();
   //     }
   //     else
   //      echo $tmp;
   //     
   //  }
    

      // echo $html('.sc', 0)->html();
 
    echo "<br> --------------------------------------------------- <br>";



    echo "<br> --------------------------------------------------- <br>";

    $xHTML ="";
    $xPLAIN="";
    
    foreach($html('.sc__font-paragraph') as $element) {
        
        $tmp = $element->html();
      
         

          if (!fnmatch("*Lee también:*", $tmp) && !fnmatch("*Suscríbete aquí*", $tmp)  ) {        
            
                $xHTML .= $element->html();
                $xPLAIN.= $element->getPlainText();
            echo $tmp;

          }
           else
            echo "<strong>ELIMINAMOSM</strong>";

     }

     echo "<h1> PLANO PLANOPLANO</h1>";
     echo $xPLAIN;
     echo "<h1> HTML HTML HTML</h1>";
     echo $xHTML;


    



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