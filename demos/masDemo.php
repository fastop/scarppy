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

        //content-body
        
        //Loop through the anchors tags that DOMDocument found.
        foreach($anchorTags as $anchorTag){
        
            //Get the href attribute of the anchor.
            $aHref = $anchorTag->getAttribute('href');
        
            //Get the title text of the anchor, if it exists.
            $aTitle = $anchorTag->getAttribute('title');
        
            //Add the anchor details to $extractedAnchors array.
            $extractedAnchors[] = array(
                'href' => $aHref,
                'title' => $aTitle
            );
        }
        
        echo "<pre>";
        //print_r our array of anchors.
        print_r($extractedAnchors);





?>