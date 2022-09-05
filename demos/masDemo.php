<?php  
 

        $htmlString = "<html>
        <head></head>
        <body>
            <a href='https://www.google.com/' title='Google URL'>Google</a>
            <a href='https://www.youtube.com/' title='Youtube URL'>Youtube</a>
            <a href='https://onlinewebtutorblog.com/' title='Website URL'>Online Web Tutor</a>
        </body>
        </html>";

        $htmlURL = "https://www.milenio.com/virales/humor/video-viral-madre-distraida-biberon-bebe-oreja";
        $data = file_get_contents($htmlURL);
        
        $htmlString= $data;

        //Create a new DOMDocument object.
        $htmlDom = new DOMDocument;

        //Load the HTML string into our DOMDocument object.
        @$htmlDom->loadHTML($htmlString);

        //Extract all anchor elements / tags from the HTML.
        $anchorTags = $htmlDom->getElementsByTagName('a');
        //Create an array to add extracted images to.
        $extractedAnchors = array();

        
        //Loop through the anchors tags that DOMDocument found.
        foreach($anchorTags as $anchorTag){
        
            $aHref = $anchorTag->getAttribute('href');            
            $aTitle = $anchorTag->textContent;
        
            $extractedAnchors[] = array(
                'href' => $aHref,
                'title' => $aTitle
            );
        }
        
        echo "<pre>";
        print_r($extractedAnchors);





?>