<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

    $URL =  "https://vanguardia.com.mx/noticias/en-pleno-verano-frente-frio-se-acerca-a-mexico-golpeara-con-descenso-en-las-temperaturas-fuertes-vientos-y-granizadas-LI8903148"; 
  //  $URL =  "https://vanguardia.com.mx/noticias/la-ruta-de-emma-coronel-esposa-de-el-chapo-guzman-a-la-libertad-ND9234807";
      
    $html = $PPP->file_get_dom($URL);
    
echo "<pre>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('.headline', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('.cutlineShow img', 0)->attributes["data-srcset"];
      $tmp =  $html('.cutlineShow img', 0)->attributes["data-srcset"];

      $SS =  explode(" ",$tmp);
      print_r($SS);

      $image = "https:".$SS[0];

    echo "<br> --------------------------------------------------- <br>";



    
    echo "<br> --------------------------------------------------- <br>";
    echo ">>>>>> <br>"; 
    foreach($html('p b') as $element) { 


        $SS = $element->getPlainText(); 
        echo $SS;

        if(trim($element->getPlainText()) == "TE PUEDE INTERESAR:"){
            echo "<h1>ME PUEDE INTERESAAARTTT</h1>";
           $element->parent->clear(); 
        }

        echo "<br>";
    }

    echo ">>>>>> <br>"; 
    echo "<br> --------------------------------------------------- <br>";

    // foreach($html("b") as $element) { 
    //     $element->getPlainText(); 
    // }
 
      foreach($html('script') as $element) { 
        echo $element->getPlainText(); 
       // $element->clear();
      } 



    //Eliminamos shit!!!
    echo "<h1> ELIMINAMOS SHITZTIA </h1>";
    echo "<br> --------------------------------------------------- <br>";

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



/*
     echo $html('.image', 0)->src;
     echo "<br> --------------------------------------------------- <br>";
     echo "<br> OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  <br>";
     echo "<br> --------------------------------------------------- <br>";


     echo $html('.storyfull__body', 0)->html();
     echo "<br> --------------------------------------------------- <br>";
 */