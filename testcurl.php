<?php
   $url = 'http://ec.csair.com/B2C/detail-1-S-0-1-PEK-CAN-20100212.dat';
   $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
   $xmlPar = xml_parser_create();
    $result = curl_exec($curl);
  //  print_r("the result:\n$result");
    xml_parse_into_struct($xmlPar,$result,$vals,$index);
    print("the index\n");
    print_r($index);
    print("the value\n");
    print_r($vals);


 
?>
