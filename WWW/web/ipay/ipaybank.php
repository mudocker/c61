<?php
class ipaybank{
    function get_code($order,$configs,$host){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		$merchno = $configs['merchantid'];//商户id,	678110154110001
		$mbp_key = $configs['merchantkey1'];
		$amount  = intval($order['amount']);
		$traceno = $order['trano'];
		$notifyUrl = $configs['returnbackurl'].'/Payback.ipaybank';//异步通知的地址
		$returnUrl = $host.'/Member.orderform?tabid=rechargelist';//前台地址
		
		$data = array();
		$MerBillNo = $order['trano']; //您的订单Id号
        $GoodsName = $order ['uid'];  //充值的账号
        $amount  = intval($order['amount']);
        $Amount = number_format($amount, 2, '.', ''); //充值的金额



		$MerCode = $merchno;//环迅商户号
		$Account = $configs['merchantkey2'];
		$Merchanturl = $returnUrl;//前台回调
		$ServerUrl = $notifyUrl;//后台回调
		$tokenkey = $mbp_key;//环迅MD5签名秘钥
		//$tokenkey = 'g22Fq3FlcdEQ3kc3qA72mmGPVWvHSRv3TWqZwFlu0P9VxBupNqefjdguukQbeHVEvsrCDXrRhZRAa7o3H5Rv58GJNUaJoz7ajbxXUoTRYcZ9Hshcvk0VoCPAuvDHLCNv';//环迅MD5签名秘钥
		$ReqDate = date('YmdHis', $order['oddtime']);
        $Date	= date("Ymd",$order['oddtime']);
		$Signature = md5("<body><MerBillNo>$MerBillNo</MerBillNo><Amount>$Amount</Amount><Date>$Date</Date><CurrencyType>156</CurrencyType><GatewayType>01</GatewayType><Lang>GB</Lang><Merchanturl><![CDATA[$Merchanturl]]></Merchanturl><FailUrl><![CDATA[]]></FailUrl><Attach><![CDATA[]]></Attach><OrderEncodeType>5</OrderEncodeType><RetEncodeType>17</RetEncodeType><RetType>1</RetType><ServerUrl><![CDATA[$ServerUrl]]></ServerUrl><BillEXP></BillEXP><GoodsName>账户充值</GoodsName><IsCredit> </IsCredit><BankCode>1104</BankCode><ProductType> </ProductType></body>".$MerCode.$tokenkey);
		$pGateWayReq = "<Ips><GateWayReq><head><Version>v1.0.0</Version><MerCode>$MerCode</MerCode><MerName></MerName><Account>$Account</Account><MsgId></MsgId><ReqDate>$ReqDate</ReqDate><Signature>$Signature</Signature></head><body><MerBillNo>$MerBillNo</MerBillNo><Amount>$Amount</Amount><Date>$Date</Date><CurrencyType>156</CurrencyType><GatewayType>01</GatewayType><Lang>GB</Lang><Merchanturl><![CDATA[$Merchanturl]]></Merchanturl><FailUrl><![CDATA[]]></FailUrl><Attach><![CDATA[]]></Attach><OrderEncodeType>5</OrderEncodeType><RetEncodeType>17</RetEncodeType><RetType>1</RetType><ServerUrl><![CDATA[$ServerUrl]]></ServerUrl><BillEXP></BillEXP><GoodsName>账户充值</GoodsName><IsCredit> </IsCredit><BankCode>1104</BankCode><ProductType> </ProductType></body></GateWayReq></Ips>";
		$html = '';
		$html .= '<form name="IpayForm" method="post" action="https://newpay.ips.com.cn/psfp-entry/gateway/payment.do">';
		
		
			$html .= '<input type="hidden" name="pGateWayReq" value="'.$pGateWayReq.'" />';
		

		$html .= '<input type="submit" value="send" />';
		$html .= '</form>';
		$html .= '</body></html>';
		$html .= "<script>document.forms['IpayForm'].submit();</script>";
		//dump($signStr);exit;
		return $html;

    }
}

?>