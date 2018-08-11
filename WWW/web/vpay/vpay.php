<?php
class vpay{
    function get_code($order,$configs,$host){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		$partner = $configs['merchantid'];//商户id,	
		$banktype = '';//银行类型
		$paymoney = intval($order['amount']);
		$ordernumber = $order['trano'];
		$callbackurl = $configs['returnbackurl'].'/Payback.dinpay';//异步通知的地址
		$hrefbackurl = $host.'/Member.orderform?tabid=rechargelist';//同步通知的地址
		$signstr = "partner={$partner}&banktype={$banktype}&paymoney={$paymoney}&ordernumber={$ordernumber}&callbackurl={$callbackurl}964ac2c399460f26442480b8ef1bd8e7";
		//dump($signstr);exit;
		$sign = md5($signstr);
		$gateway = "http://wytj.9vpay.com/PayBank.aspx";
		$param = [];
		$param['partner'] = $partner;
		$param['banktype'] = $banktype;
		$param['paymoney'] = $paymoney;
		$param['ordernumber'] = $ordernumber;
		$param['callbackurl'] = $callbackurl;
		$param['hrefbackurl'] = $hrefbackurl;
		$param['sign'] = $sign;
		//dump($param);exit;
		$html = '';
		$html .= '<form name="xpayForm" method="get" action="'.$gateway.'" target="_self" target="_blank">';
		foreach($param as $k=>$v){
			$html .= '<input type="hidden" name="'.$k.'"		  value="'.$v.'" />';
		}
		$html .= '</form>';
		$html .= '</body></html>';
		$html .= "<script>document.forms['xpayForm'].submit();</script>";
		return $html;
    }

}

?>