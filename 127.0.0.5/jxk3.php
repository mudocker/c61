<?php
$api = "http://ho.apiplus.net/token/jxk3-1.json";
$data = file_get_contents($api);
$data = json_decode($data,1);
//var_dump($data);
$qh = $data["data"][0]["expect"];
$hm = $data["data"][0]["opencode"];
$rq = $data["data"][0]["opentime"];
//$opentimestmp = strtotime($rq);
echo '{"sign":true,"message":"获取成功","data":[{"title":"江西快3","name":"jxk3","expect":"'.$qh.'","opencode":"'.$hm.'","opentime":"'.$rq.'","source":"开彩采集","sourcecode":""}]}';
?>