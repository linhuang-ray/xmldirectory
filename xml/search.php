<?php

header('Content-type: text/xml');
echo '<?xml version="1.0" encoding="utf-8"?>
<CiscoIPPhoneInput>
  <Title></Title>
  <Prompt></Prompt>
  <URL>http://10.245.1.148/xml/searchResult.php?key=' . $_GET['key'] . '</URL>
  <InputItem>
   <DisplayName>Search</DisplayName>
   <QueryStringParam>searchParam</QueryStringParam>
   <DefaultValue></DefaultValue>
   <InputFlags>L</InputFlags>
  </InputItem>
</CiscoIPPhoneInput>';

?>
