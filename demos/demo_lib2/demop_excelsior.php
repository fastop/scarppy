<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

    $URL = "https://www.excelsior.com.mx/adrenalina/reloj-ricardo-ten-glasgow/1603401";
    $URL =  "https://www.excelsior.com.mx/funcion/ricky-martin-y-christian-nodal-lanzaran-version-fuego-de-noche-nieve-de-dia/1609615";   
    $URL = "https://www.excelsior.com.mx/hacker/xiaomi-anima-a-sus-usuarios-a-celebrar-septiembre-con-su-serie-redmi-note-12/1609612";
    $URL = "https://www.excelsior.com.mx/global/espana-investiga-desnudos-adolescentes-inteligencia-artificial/1609643";
        
      
    $html = $PPP->file_get_dom($URL);


    echo "<pre>";

    //Primero tenemos que filtrar por que "ADRENALINA" funciona  completamente diferente :V

        if(strpos($URL,"adrenalina"))
            $REX = procAadrenalina($html);
        else
            $REX = procExcelsiorNormie($html);

        $REX["URL"] = $URL;
    
    
    print_r($REX);
    


    //El problema es el puto video 
    function procAadrenalina($html){

        $REX["TITLE"] = $html('.node-title', 0)->getPlainText();
        $REX["IMG"] =  $html('.single-image', 0)->src;

            //BASURITA 
            $html('#block-dfp-300x250-adrenalina-tags-7', 0)->clear(); //Quitamos unos JS que se incrustaba

            foreach($html('.txt-copyright') as $element){ $element->clear(); }//Quitamos el copy :P
            foreach($html('.banner-content-ads') as $element){ $element->clear(); }//Quitamos anuncios :P


            foreach($html('.node-body p a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
            foreach($html('.node-body div a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
                    
            foreach($html('.node-body .dugout-video') as $element){ $element->clear(); }//Quitamos el video
            foreach($html('.node-body #dugout-video-0') as $element){ $element->clear(); }//Quitamos el video

            foreach($html('.dugout-title-bar__title') as $element){ $element->clear(); }//Quitamos el video
            foreach($html('#player-1') as $element){ $element->clear(); }


            $REX["PLAIN"] = $html('.node-body', 0)->getPlainText();
            $REX["HTML"]  = $html('.node-body', 0)->html();

    
         return $REX;

    }


    function procExcelsiorNormie($html){

        $REX["TITLE"] = $html(".title",0)->getPlainText();

        //Limpiamos el contenido antes de la accion
        
        foreach($html('.body-node p strong') as $element){ 
            //$element->clear(); 
            $tmp = trim($element->getPlainText());
 

            if(fnmatch("Te recomen*", $tmp )){
                $element->clear();
                echo "<b>ESTE SE VA</b>";
            }
            else
               echo "<b>NANAIS</b>";

               
            echo ">> ".$tmp."<br>";

        }//Quitamos el video

        $REX["PLAIN"] = $html(".body-node",0)->getPlainText();
        $REX["HTML"]  = $html(".body-node",0)->html();
        $REX["IMG"] = $html(".main-image img[src]",0)->src; 
 
        return $REX;
    }


     


 /*


    echo "<br> --------------------------------------------------- <br>";      
          //echo $html('.node-title', 0)->getPlainText();
          echo $html('.title', 0)->getPlainText();
          
    echo "<br> --------------------------------------------------- <br>";
        echo $html('.single-image', 0)->src;
    echo "<br> --------------------------------------------------- <br>";


    //BASURITA

    // block-dfp-300x250-adrenalina-tags-7
    $html('#block-dfp-300x250-adrenalina-tags-7', 0)->clear(); //Quitamos unos JS que se incrustaba

    foreach($html('.txt-copyright') as $element){ $element->clear(); }//Quitamos el copy :P
    foreach($html('.banner-content-ads') as $element){ $element->clear(); }//Quitamos anuncios :P


    foreach($html('.node-body p a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
    foreach($html('.node-body div a') as $element){ $element->clear(); }//Quitamos las sugerencias en rojo
            
    foreach($html('.node-body .dugout-video') as $element){ $element->clear(); }//Quitamos el video
    foreach($html('.node-body #dugout-video-0') as $element){ $element->clear(); }//Quitamos el video

    foreach($html('.dugout-title-bar__title') as $element){ $element->clear(); }//Quitamos el video
    foreach($html('#player-1') as $element){ $element->clear(); }
   


    echo "<br> --------------------------------------------------- <br>";    
    echo $html('.node-body', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";    

    echo $html('.node-body', 0)->html();
    */