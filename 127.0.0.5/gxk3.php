<?php
$api = "http://api.api68.com/lotteryJSFastThree/getBaseJSFastThree.do?issue=&lotCode=10026";
$data = file_get_contents($api);
$data = json_decode($data,1);
$qh = $data['result']['data']['preDrawIssue'];

$qh1 = '20'.$qh;
$hm = $data['result']['data']['preDrawCode'];

$rq = $data['result']['data']['preDrawTime'];

echo '{"sign":true,"message":"获取成功","data":[{"title":"广西快3","name":"gxk3","expect":"'.$qh1.'","opencode":"'.$hm.'","opentime":"'.$rq.'","source":"开彩采集","sourcecode":""}]}';
?>