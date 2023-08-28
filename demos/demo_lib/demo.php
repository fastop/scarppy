<?php

require "vendor/autoload.php";
use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;


    $dom = new Dom ;
    $dom->loadStr('<div class="all"><p>Hey bro, <a href="google.com">click here</a><br /> :)</p></div>');

    $a = $dom->find('a')[0];
    echo $a->text;

    echo "<br>";

    $AX = $dom->find('div')[0];
    $KK = $AX->getAttribute('class');
   print_r($KK);


    echo "<br><br> -=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-==-=-=-=- <br><br><br>";

    //-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-==-=-=-=-

    // $dom->setOptions(      
    //     (new Options())
    //         ->setStrict(true)
    // );

    //Loading from URL  

  /*  $dom->loadFromUrl("https://www.google.com/");
    $html = $dom->outerHtml;

    $a = $dom->find('a')[0];

    echo $a->text;


    $class = $dom->find('.lnXdpd');

    echo $class;



    
    */


    


?>