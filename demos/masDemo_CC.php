<?php  
 

 

         $htmlURL = "https://www.milenio.com/virales/humor/video-viral-madre-distraida-biberon-bebe-oreja";
        // $htmlURL = "https://www.milenio.com/virales/eu-hombre-gana-100-mil-pesos-2-dias-vendiendo-agua-central-park-viral";

        $data = file_get_contents($htmlURL);
        
        $htmlString= $data;

        $htmlDom = new DOMDocument; //Creamos un nuevo DOMDocument        
        @$htmlDom->loadHTML($htmlString); //Cargamos el HTML en String


          $CC =  $htmlDom->getElementById('content-body')->getElementsByTagName('p');
  
        
          $TITULO = $htmlDom->getElementsByTagName('h1')[0]->textContent;
          $subTitulo = $htmlDom->getElementsByTagName('h2')[0]->textContent;




          
          echo "<h1>".$TITULO."</h1>";
          echo "<h2>".$subTitulo."</h2>";

        
          for($i=0; $i<$CC->length; $i++){

                $PP = $htmlDom->getElementById('content-body')->getElementsByTagName('p')->item($i)->textContent;                

                echo $PP."<br><br>";

           }







        //Create an array to add extracted images to.
//        $extractedAnchors = array();
  
//        foreach($anchorTags as $anchorTag){
//
//            $ahref = $anchorTag->getAttribute('href');
//
//            echo $ahref;
//        
//            //Get the title text of the anchor, if it exists.
//            $aTitle = $anchorTag->getAttribute('title');
//        
//            //Add the anchor details to $extractedAnchors array.
//            $extractedAnchors[] = array(
//                'href' => $ahref,
//                'title' => $aTitle
//            );
 //     }
//        
//        echo "<pre>";
//        //print_r our array of anchors.
//        print_r($extractedAnchors);





?>