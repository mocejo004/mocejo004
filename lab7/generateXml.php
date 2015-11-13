<?php
header('Content-Type: text/xml');

$array = array(
    array(
        'loc' => 'http://www.ssdtutorials.com',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'weekly',
        'priority' => 1
    ),
    array(
        'loc' => 'http://www.coremediadesign.co.uk',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'weekly',
        'priority' => 0.8
    ),
    array(
        'loc' => 'http://www.google.co.uk',
        'lastmod' => date('Y-m-d'),
        'changefreq' => 'weekly',
        'priority' => 0.5
    )
);

$objDom = new DOMDocument('1.0');
$objDom->encoding = 'UTF-8';
$objDom->formatOutput = true;
$objDom->preserveWhiteSpace = false;

$root = $objDom->createElement("urlset");
$objDom->appendChild($root);

$root_attr = $objDom->createAttribute("xmlns"); 
$root->appendChild($root_attr); 

$root_attr_text = $objDom->createTextNode("http://www.sitemaps.org/schemas/sitemap/0.9"); 
$root_attr->appendChild($root_attr_text);

if (!empty($array)) {

    foreach($array as $row) {
    
        $url = $objDom->createElement("url");
        $root->appendChild($url);
        
        $loc = $objDom->createElement("loc");
        $lastmod = $objDom->createElement("lastmod");
        $changefreq = $objDom->createElement("changefreq");
        $priority = $objDom->createElement("priority");
        
        $url->appendChild($loc);
        $url_text = $objDom->createTextNode($row["loc"]);
        $loc->appendChild($url_text);
        
        $url->appendChild($lastmod);
        $lastmod_text = $objDom->createTextNode($row["lastmod"]);
        $lastmod->appendChild($lastmod_text);
        
        $url->appendChild($changefreq);
        $changefreq_text = $objDom->createTextNode($row["changefreq"]);
        $changefreq->appendChild($changefreq_text);
        
        $url->appendChild($priority);
        $priority_text = $objDom->createTextNode($row["priority"]);
        $priority->appendChild($priority_text);
    
    }
}

echo $objDom->saveXML();