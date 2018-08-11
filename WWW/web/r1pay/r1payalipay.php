<?php
class r1payalipay{
    function get_code($order,$configs,$host){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		
		$userid   = $configs['merchantid'];//商户id,	
		$orderid  = $order['trano'];
		$btype    = 84;//84支付宝 83微信
		$ptype    = 0;
		$value    = intval($order['amount']);
		$returnurl= $configs['returnbackurl'].'/Payback.r1pay';//异步通知的地址
		$hrefreturnurl = $host.'/Member.orderform?tabid=rechargelist';//同步通知的地址
		
		$signstr = "userid{$userid}orderid{$orderid}btype{$btype}ptype{$ptype}value{$value}returnurl{$returnurl}hrefreturnurl{$hrefreturnurl}{$configs['merchantkey1']}";
		//dump($signstr);exit;
		$sign = strtolower(md5($signstr));
		$gateway = "http://api.r1pay.com/api/bapi.aspx";
		$param = [];
		$param['userid']      = $userid;
		$param['orderid']     = $orderid;
		$param['btype']       = $btype;
		$param['ptype']       = $ptype;
		$param['value']       = $value;
		$param['returnurl']   = $returnurl;
		$param['hrefreturnurl']= $hrefreturnurl;
		$param['sign'] = $sign;
		//dump($param);exit;
		$html = '';
		$html .= '<form name="r1payForm" method="get" action="'.$gateway.'" target="_self" target="_blank">';
		foreach($param as $k=>$v){
			$html .= '<input type="hidden" name="'.$k.'"		  value="'.$v.'" />';
		}
		$html .= '</form>';
		$html .= '</body></html>';
		$html .= "<script>document.forms['r1payForm'].submit();</script>";
		return $html;
    }

}

?>