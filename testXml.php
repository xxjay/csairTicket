<?php
$xp = xml_parser_create();
$curl = curl_init("http://ec.csair.com/B2C/detail-1-S-0-1-PEK-CAN-20100212.dat");
curl_setopt($curl,CURLOPT_HEADER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

$data = curl_exec($curl);
print($data);
xml_parse_into_struct($xp,$data,$v,$in);
//print_r($in);
//print_r($in['ADULTPRICE']);

xml_parser_free($xp);
?>
