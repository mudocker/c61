<?php
class japayweixin{
    function get_code($order,$configs,$host){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		$merchno = $configs['merchantid'];//商户id,	678110154110001
		$amount  = intval($order['amount']);
		$traceno = $order['trano'];
		$payType = 2;
		$notifyUrl = $configs['returnbackurl'].'/Payback.japaysaoma';//异步通知的地址
		$returnUrl = $host.'/Member.orderform?tabid=rechargelist';//前台地址
		
		$param = [];
		$param['merchno'] = $merchno;
		$param['amount'] = $amount;
		$param['traceno'] = $traceno;
		$param['payType'] = $payType;
		$param['notifyUrl'] = $notifyUrl;
		$param['returnUrl'] = $returnUrl;
		$param = array_filter($param);
		ksort($param);
		$signStr= "";
		
		if($param['amount'] != ""){
			$signStr = $signStr."amount=".$param['amount']."&";
		}
		if($param['merchno'] != ""){
			$signStr = $signStr."merchno=".$param['merchno']."&";
		}
		if($param['notifyUrl'] != ""){
			$signStr = $signStr."notifyUrl=".$param['notifyUrl']."&";
		}
		if($param['payType'] != ""){
			$signStr = $signStr."payType=".$param['payType']."&";
		}
		if($param['returnUrl'] != ""){
			$signStr = $signStr."returnUrl=".$param['returnUrl']."&";
		}
		if($param['traceno'] != ""){
			$signStr = $signStr."traceno=".$param['traceno']."&";
		}
	
		$signStr = $signStr . $configs['merchantkey1'];
		$_signstr = md5($signStr);
		$param['signature'] = $_signstr;
		$gateway = "http://112.74.230.8:8081/posp-api/passivePay";
        $o = "";
        foreach ( $param as $k => $v ) 
        { 
            $o.= "$k=" . urlencode( $v ). "&" ;
        }
        $post_data = substr($o,0,-1);
		$res = self::curl_get($gateway.'?'.$post_data,true);
		$res1 = json_decode(auto_charset($res),true);
		if($res1){
			return $res1;
		}
		exit;
		dump($res1);
		exit;
		$html = '';
		$html .= '<form name="japayForm" method="post" action="'.$gateway.'" target="_self" target="_blank">';
		foreach($param as $k=>$v){
			$html .= '<input type="hidden" name="'.$k.'"		  value="'.$v.'" />';
		}
		$html .= '</form>';
		$html .= '</body></html>';
		$html .= "<script>document.forms['japayForm'].submit();</script>";
		return $html;
    }
function curl_get($url, $gzip=false){
 $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
 if($gzip) curl_setopt($curl, CURLOPT_ENCODING, "gzip"); // 关键在这里
 $content = curl_exec($curl);
 curl_close($curl);
 return $content;
}
	public function qrcode($url='',$pic=false,$level=3,$size=4){
		Vendor('phpqrcode.phpqrcode');
		$errorCorrectionLevel =intval($level) ;//容错级别 
		$matrixPointSize = intval($size);//生成图片大小 
		//生成二维码图片 
		//echo $_SERVER['REQUEST_URI'];
		$object = new \QRcode();
		$object->png($url, $pic, $errorCorrectionLevel, $matrixPointSize, 2);   
	}
}

?>