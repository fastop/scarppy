<?php  
 

 

        $htmlURL = "https://www.milenio.com/virales";
        $data = file_get_contents($htmlURL);
        
        $htmlString= $data;        
        $htmlDom = new DOMDocument;
        
        @$htmlDom->loadHTML($htmlString);

        $anchorTags = $htmlDom->getElementsByTagName('a');        
        $extractedAnchors = array();

        $stable = "";

        foreach($anchorTags as $i =>$anchorTag){
        
            if($i>126 && $i<175){

                $aHref = $anchorTag->getAttribute('href');            
                $aTitle = $anchorTag->textContent;

                $stable.= "<tr><td><a href='https://www.milenio.com/".$aHref."' target='_blank'>".$aTitle."</a></td><td><button>SCRAP!</button></td></tr>";
            }
        }


        echo "<table>".$stable."</table>";
        


?>