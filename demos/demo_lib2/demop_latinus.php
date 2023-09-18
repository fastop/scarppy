<?php

include('pharse/pharse.php');

error_reporting(0);



    $PPP = new Pharse();


    $URL =  "https://latinus.us/2023/08/15/mancera-impugna-tribunal-electoral-exclusion-proceso-frente-amplio-candidatura/"; 
    $URL =  "https://latinus.us/2023/09/14/opinion-jesus-silva-herzog-marquez-ebrard-construido-irrelevancia-politica/"; 
   // $URL =  "https://latinus.us/2023/09/14/xochitl-galvez-llama-a-dirigentes-del-frente-amplio-a-evitar-confrontaciones-con-movimiento-ciudadano/"; 

    
          
    $html = $PPP->file_get_dom($URL);
    
echo "<pre>";


    echo "<br> --------------------------------------------------- <br>";      
      echo $html('.elementor-widget-container h1', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";

        $IMAGE = $html('.wp-caption img', 0)->src;

        if(is_null($IMAGE))
            echo "NO hay imagen perrro";
        else
            echo "Si hay imagen perrri";





        echo $html(".elementor-widget-container")->getPlainText();
        echo $html(".elementor-widget-container")->getPlainText();




    echo "<br> <strong> ======================================================== </strong> <br>";

    $TXT = "";
    $HTML = "";

    $PX = $html('.elementor-widget-container p');
    foreach($PX as $i=>$element) { 

        if($i>1 && $i<count($PX)-1){
            $TXT .= $element->getPlainText();
            $HTML .= $element->html();

            echo "<br>".$i." >> ".$element->getPlainText()."<br>";
        }

    }


    echo $TXT;
    echo "<br> --------------------------------------------------- <br>";
    echo $HTML;

    echo "<br> --------------------------------------------------- <br>";
    echo "<br> --------------------------------------------------- <br>";    

        //Eliminamos las sugerencias pedorras

        $TERMS = array("Puedes leer:", "Te sugerimos:","Te podría interesar:","Te recomendamos:","Lee también:");

        foreach($html('strong, b') as $element) {

            $tmp = trim($element->getPlainText());

            echo $tmp."<br>";

            if(in_array($tmp, $TERMS)){
                echo " >> Este perro se va a la ñonga ";
            }
        }


    echo "<br> --------------------------------------------------- <br>";


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

 