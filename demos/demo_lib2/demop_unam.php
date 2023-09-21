<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

    $URL =  "https://www.dgcs.unam.mx/boletin/bdboletin/2023_622.html"; 
    $URL =  "https://www.dgcs.unam.mx/boletin/bdboletin/2023_594.html"; 
    $URL =  "https://www.dgcs.unam.mx/boletin/bdboletin/2023_483.html";     

    
      
    $html = $PPP->file_get_dom($URL);
    
echo "<pre>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('#content h2', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";

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



/*
    echo "<br> --------------------------------------------------- <br>"
    foreach($html('.block__title') as $element) { $element->clear(); }
    foreach($html('#mc_embed_signup') as $element) { $element->clear(); }
    foreach($html('p[data-mrf-recirculation="Te puede interesar - Entre párrafos"]') as $element) { $element->clear(); }
    foreach($html('.VideoVanguardiapro') as $element) { $element->clear(); }
    



    echo "<br> --------------------------------------------------- <br>";      
      echo $html('div[itemprop="articleBody"]', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('div[itemprop="articleBody"]', 0)->html();
    echo "<br> --------------------------------------------------- <br>";


    echo '<textarea id="w3review" name="w3review" rows="75" style="width:100%">';
    echo $html('div[itemprop="articleBody"]', 0)->html();
    echo "</textarea>";

 */