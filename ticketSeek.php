<?php
$queryPlace= array(
  array("PEK","CAN"),//beijing to guangzhou
  array("PEK","SZX"),//beijing to shenzhen 
  array("TSN","SZX"),//tianjing to shenzhen
  array("TSN","CAN"),//tianjing to guangzhou
  array("PEK","SWA") //beijing to shantou
  );
$queryDate = array("20100211","20100212","20100213");
$mailto = "chen123jay@126.com";
//query url:http://ec.csair.com/B2C/detail-1-S-0-1-{0}-{1}-{2}.dat
$baseUrls = geneQueryUrl($queryPlace,$queryDate);
$resultArr = array();
$resultInx = array();
//print_r($baseUrls);
while(true){
  foreach ($baseUrls as $url){
    $curl = curl_init($url);
    //curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    //request result , form in xml
    $result = curl_exec($curl);
   // print("result:\n$result");
    $xmlPar = xml_parser_create();
    $r = xml_parse_into_struct($xmlPar,$result,$vals,$index);
    array_push($resultArr,$vals);
    array_push($resultInx,$index);
    /*print("$r,index:\n");
    print_r($index);
    print("value:\n");
    print_r($vals);*/
    curl_close($curl);
    xml_parser_free($xmlPar);
    sleep(2*10);
  }
    $re = getSuitTicket($resultArr,$resultInx);

    //print_r($re);
   // ticketMail($re);
    $resultArr = array();
    $resultInx = array();
    sleep(3*10);
}
function ticketMail($ms)
{
  mail($mailto,"sub",$ms);
}
function getSuitTicket($vs,$inx)
{
  $reArr = array();
  foreach($vs as $i){
     print("ticket result:\n");
     if ($i['tag'] == 'ADULTPRICE'){
        array_push($reArr,$i['value']);
     }
  }
  //get the result in sorted array;
  sort($reArr);
  return $reArr;
}
function geneQueryUrl($places,$dates)
{
  $baseurl = "http://ec.csair.com/B2C/detail-1-S-0-1-";
  $baseurlArr = array();
  foreach ($places as $place){
    foreach ($dates as $date){
      $tmp = $baseurl;
      $tmp = $place[0] . "-" . $place[1] .'-'. $date . '.dat';
      $tmp = $baseurl . $tmp;
      array_push($baseurlArr,$tmp);
    }
  }
  return $baseurlArr; 
}

?>
