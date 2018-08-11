<?php

/**
 * 墨宝支付集成
*/



class mobaobank{


    /**
     * 生成支付代码
     */
    function get_code($order,$configs,$host,$choosePayType){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		$notify_url = $configs['returnbackurl'].'/Payback.mobaobank';	//异步地址	
		$return_url = $host.'/Member.orderform?tabid=rechargelist';	//前台地址
		$mbp_key = $configs['merchantkey1'];
		// 请求数据赋值
		$data = array();
		// 商户APINMAE，WEB渠道一般支付
		$data['apiName'] = 'WEB_PAY_B2C';
		// 商户API版本
		$data['apiVersion'] = "1.0.0.0";
		// 商户在Mo宝支付的平台号
		$data['platformID'] = $configs['merchantid'];
		// Mo宝支付分配给商户的账号
		$data['merchNo'] = $configs['merchantid'];
		// 商户通知地址
		$data['merchUrl'] = $notify_url;
		// 银行代码，不传输此参数则跳转Mo宝收银台
		$data['bankCode'] = 'MOBOACC';
		
		//商户订单号
		$data['orderNo'] = $order['trano'];
		// 商户订单日期
		$data['tradeDate'] = date('Ymd',$order['oddtime']);
		// 商户交易金额
		$data['amt'] = $order['amount'];
		// 商户参数
		$data['merchParam'] = '';
		// 商户交易摘要
		$data['tradeSummary'] = '充值';
		if($choosePayType)$data['choosePayType']= $choosePayType;
		// 对含有中文的参数进行UTF-8编码
		// 将中文转换为UTF-8
		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['merchUrl']))
		{
		$data['merchUrl'] = iconv("GBK","UTF-8", $data['merchUrl']);
		}
		
		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['merchParam']))
		{
	
		$data['merchParam'] = iconv("GBK","UTF-8", $data['merchParam']);
		}
	
		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['tradeSummary']))
		{
		$data['tradeSummary'] = iconv("GBK","UTF-8", $data['tradeSummary']);
		}
		$mobaopay_gateway = "https://bis.pandapayment.com/cgi-bin/netpayment/pay_gate.cgi";
		$merchant_notify_url = $notify_url;
		
		require_once("./mbpay/MbPay.php");
		// 初始化
		$cMbPay = new \MbPay($mbp_key, $mobaopay_gateway);
		// 准备待签名数据
		$str_to_sign = $cMbPay->prepareSign($data);
		// 数据签名
		$sign = $cMbPay->sign($str_to_sign);
		$data['signMsg'] = $sign;
		// 生成表单数据
		$def_url = $cMbPay->buildForm($data, $mobaopay_gateway);



        return $def_url;
    }

}

?>