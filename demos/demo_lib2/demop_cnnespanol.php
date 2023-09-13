<?php

include('pharse/pharse.php');



    $PPP = new Pharse();

 
      $URL =  "https://cnnespanol.cnn.com/2023/08/15/autoridades-migratorias-mexico-rescatan-231-migrantes-trailer-puebla-trax/";
 

    $html = $PPP->file_get_dom($URL);
    

echo "<pre>";


     echo "<br> --------------------------------------------------- <br>";
      echo $html('.storyfull__title', 0)->getPlainText();
     echo "<br> --------------------------------------------------- <br>";

     echo $html('.image', 0)->src;
     echo "<br> --------------------------------------------------- <br>";
     echo "<br> OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  OLD  <br>";
     echo "<br> --------------------------------------------------- <br>";


     echo $html('.storyfull__body', 0)->html();
     echo "<br> --------------------------------------------------- <br>";


     

     echo "<br> --------------------------------------------------- <br>";
     

    
        foreach($html('.storyfull__gallery') as $element) {     
           $element->clear();
        }

        foreach($html('ul') as $element) {     
            $element->clear();
         }         

        foreach($html('.tags') as $element) {     
            $element->clear();
         }         

          

 

     echo "<br> --------------------------------------------------- <br>";
     echo "<br> NEW  NEW  NEW  NEW  NEW  NEW  NEW  NEW  NEW  NEW  NEW  <br>";
     echo "<br> --------------------------------------------------- <br>";
 

       
     echo $html('.storyfull__body', 0)->html();


    // $html('.nd-related-news-detail-media-dual',0)->parent->clear(); //Removemos la shit

//    //Removemos todas las shits       
//    foreach($html('.nd-related-news-detail-media-dual') as $element) {        
//        // echo $element.clear()"<br>"; //echo $element;
//        $element->clear();
//    }
//
//    foreach($html('.nd-text-highlights-detail-bold') as $element) {        
//        // echo $element.clear()"<br>"; //echo $element;
//        $element->clear();
//    }
//
//    
//
//    echo "<br> --------------------------------------------------- <br>";    
//    echo $html('#content-body', 0)->getPlainText();    
//
//    echo "<br> --------------------------------------------------- <br>";
//    echo $html('#content-body', 0)->html();
// 
//    echo "<br> --------------------------------------------------- <br>";
//
//      echo "<br> ----------------------------------------------";
//
//      // .nd-related-news-detail-media-dual
//      echo "<br>";
//      
//      $last = count($html(".nd-media-detail-base__img"));
//      $html(".nd-media-detail-base__img", $last-1)->src;