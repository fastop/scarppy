<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

    $URL =  "https://www.dgcs.unam.mx/boletin/bdboletin/2023_622.html"; 
    $URL =  "https://www.infobae.com/mexico/2023/09/12/cual-es-la-moneda-de-20-pesos-que-se-vende-hasta-en-2-millones-500-mil-pesos-tras-ser-galardonada/"; 
   // $URL =  "https://www.infobae.com/mexico/2023/08/15/amlo-reta-a-ministros-de-la-scjn-a-frenar-distribucion-de-libros-de-texto-a-ver-si-se-atreven/";     

          
    $html = $PPP->file_get_dom($URL);
    
echo "<pre>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('.article-headline', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";

    echo $html('.visual__image img', 0)->src;

    echo "<br> --------------------------------------------------- <br>";

    $TXT = "";
    $HTML = "";

    foreach($html('.paragraph') as $element) { 

            $TXT .= $element->getPlainText();
            $HTML .= $element->html();
    }


    echo $TXT;
    echo "<br> --------------------------------------------------- <br>";
    echo $HTML;


/*    
    $img = "https://www.dgcs.unam.mx/boletin/bdboletin/".$html('.featured img', 0)->src;

    echo $img;

    echo "<br> --------------------------------------------------- <br>";

    $TXT = "";
    $HTML = "";

    foreach($html('article p[align="justify"]') as $element) { 

            $TXT .= $element->getPlainText();
            $HTML .= $element->html();
    }

    echo $TXT;
    echo $HTML;
*/

 