<?php
$xp = xml_parser_create();
$fp = fopen("csair.xml","r");
$data = '';
while(!feof($fp)){
  $data .= fread($fp,10240);
}
fclose($fp);
xml_parse_into_struct($xp,$data,$v,$in);
$r = getSuitTicket($v,$in);
print_r($r);
function getSuitTicket($vs,$inx)
{
  $reArr = array();
  foreach($inx['ADULTPRICE'] as $i){
     array_push($reArr,$vs[$i]['value']);
  }
  //get the result in sorted array;
  sort($reArr);
  return $reArr;
}
?>
