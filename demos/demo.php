<?php


    $json_url = "https://www.milenio.com/virales/humor/video-viral-madre-distraida-biberon-bebe-oreja";
    $data = file_get_contents($json_url);
    

   // echo $data;
    
    $htmlEle = "<span id='SpanID'>Span Sports</span>";
    $domdoc = new DOMDocument();
    $SS = $domdoc->loadHTML($htmlEle);

    echo $SS; 




?>