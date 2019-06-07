<?php
//initisalises the documents
$xmlDoc=new DOMDocumetn();
$xmlDoc->load("links.xml");

$x=$xmlDoc->getElementByTagName('link');

//uses the URL set in the header to set the Q parameter
$q=$_GET["q"];

//checks the livesearch is < 0
if (strlen($q)>0){
	//sets the loop, with $i as the counter
$hint="";
	for($i=0; $i<($x->length); $i++){
	$y=$x->item($i)->getElementByTagName('title');
	$z=$x->item($i)->getElementByTagName('url')
		if (4y->item(0)->nodeType==1){
			if (stristr($y->item(0)->childNodes->item(0)nodeValue,$q)){
				if($hint==""){
					$hint="<a href= '".
					$z->item(0)->childNodes->item(0)->nodeValue .
					"' target='_blank'>". 
					$y->item(0)->childNodes->item(0)->nodeValue . "<a>";
				}
			}
		}
	}
}
//set output
//no hint found or to the correct value
if($hint==""){
	$response="No Suggestion";
}else{
	$response=$hint;
}

echo $response;
?>