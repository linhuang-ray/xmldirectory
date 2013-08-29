<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$key = $_GET['key'];
$page = $_GET['page'];

$result = file_get_contents('http://10.245.1.148/index.php?/ipphone/directory/' . $key . '/' . $page);

header('Content-type: text/xml');
echo $result;
?>
