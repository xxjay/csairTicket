<?php
$queryPlace= array(
  array("PEK","ACN"),//beijing to guangzhou
  array("PEK","SZX"),//beijing to shenzhen 
  array("TSN","SZX"),//tianjing to shenzhen
  array("TSN","ACN"),//tianjing to guangzhou
  array("PEK","SWA"),//beijing to shantou
  array("TSN","SWA")//tianjing to shantou
  );
$queryDate = array("20100211","20100212","20100213","20100214");
geneQueryUrl($queryPlace,$queryDate);
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
  print_r($baseurlArr);
  return $baseurlArr;
}
?>
