<?php

include('pharse/pharse.php');


 //ini_set('user_agent', 'My-Application/2.5');

    $PPP = new Pharse();

    $URL =  "https://www.debate.com.mx/policiacas/Condenan-a-31-anos-de-prision-a-Jose-Sigala-por-asesinar-a-un-ex-funcionario-en-Ensenada-20230426-0220.html"; 
   // $URL =  "https://www.debate.com.mx/policiacas/FGE-de-Queretaro-investiga-paradero-de-Alicia-de-22-anos-desaparecida-desde-el-15-de-septiembre-20230919-0182.html"; 
   // $URL =  "https://www.debate.com.mx/policiacas/Mujer-recibe-disparo-en-la-cabeza-mientras-tomaba-refresco-en-Walmart-20230920-0042.html"; 
   
    
    $context = stream_context_create(
                array("http" => array(
                      "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36" )));   
    
    
    //$EXT =file_get_contents($URL, false, $context);
    $html = $PPP->file_get_dom($URL, true, false, $context);



echo "<pre>";

    echo "<br> --------------------------------------------------- <br>";      
      echo $html('h1', 0)->getPlainText();
    echo "<br> --------------------------------------------------- <br>";

    echo $html('.image img', 0)->src;

    echo "<br> --------------------------------------------------- <br>";
    //Limpiamos la basuritaw

        foreach($html('.inlinearticle') as $element) { $element->clear(); }  // Eliminamos los articulos en el texto
        foreach($html('.body .list') as $element) { $element->clear(); } //Eliminamos las listas pedorras         
        foreach($html('.embed') as $element) { $element->clear(); } //Quitamos las alter noticias       
        foreach($html('.bannercover') as $element) { $element->clear(); } //Quitamos TODA las shits que digan publicidad :V       
          

    echo "<br> --------------------------------------------------- <br>";

        
    $TXT = $html('.body',1)->getPlainText();
    $HTML = $html('.body',1)->html();

    // foreach($html('.paragraph') as $element) { 
 
    //         $TXT .= $element->getPlainText();
    //         $HTML .= $element->html();
    // }


    echo $TXT;
    echo "<br> --------------------------------------------------- <br>";
    echo $HTML;

