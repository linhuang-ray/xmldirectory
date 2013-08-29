<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$key = $_GET['key'];
$searchParam = $_GET['searchParam'];

$searchResult = file_get_contents('http://10.245.1.148/index.php?/ipphone/search_entry_xml/' . $key . '/' . $searchParam);

$xml = new SimpleXMLElement($searchResult);

header('Content-type: text/xml');
echo $xml->asXML();
?>
