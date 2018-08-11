<?php
/* *
 * 功能：支付接口类
 * 版本：1.0
 * 日期：2015-03-26
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码。
 */
 	
class jifubaopay {

	function get_code($order,$configs,$host){
	 
	require_once("./jifubaopay/Pay.Config.php");
	require_once("./jifubaopay/Pay.class.php");
		                                                       // 请求数据赋值 

		$data['service'] = $APINAME_PAY;                       // 商户APINMAE，WEB渠道一般支付

		$data['version'] = $API_VERSION;                       // 商户API版本

		$data['merId'] = $MERCHANT_ID;                         // 商户在支付平台的的平台号

		$data['tradeNo'] = $order["trano"];                    //商户订单号


		$data['tradeDate'] = date("Ymd",$order["oddtime"]);     // 商户订单日期

		$data['amount'] =sprintf("%.2f", $order["amount"]);     // 商户交易金额
		if($order['username']=='ceshi'){
			$data['amount'] = 0.01;
		}

		$data['notifyUrl'] = $configs['returnbackurl'].'/Payback.jifubaopay';  // 商户通知地址

		$data['extra'] = "test";                                // 商户扩展字段
		
		if($order['username']=='ceshi'){
			$data['extra'] = "ceshi";  
		}
		
		$data['summary'] = "帐户充值";                          // 商户交易摘要

		$data['expireTime'] = "300";                            //超时时间

		$data['clientIp'] = get_client_ip();;                    //客户端ip

		$data['bankId'] = "";                                    // 接收银行代码

 

		// 对含有中文的参数进行UTF-8编码
		// 将中文转换为UTF-8
		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['notifyUrl']))
		{
			$data['notifyUrl'] = iconv("GBK","UTF-8", $data['notifyUrl']);
		}


		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['extra']))
		{
			$data['extra'] = iconv("GBK","UTF-8", $data['extra']);
		}

		if(!preg_match("/[\xe0-\xef][\x80-\xbf]{2}/", $data['summary']))
		{
			$data['summary'] = iconv("GBK","UTF-8", $data['summary']);
		}

		// 初始化
		$pPay = new \Pay($KEY,$GATEWAY_URL);
		// 准备待签名数据
		$str_to_sign = $pPay->prepareSign($data);
		// 数据签名

		$signMsg = $pPay->sign($str_to_sign);
		//var_dump($signMsg);

		//return;

		//$signMsg='4F0D7B1A8DF615DABE147B1CC112B79C';
		$data['sign'] = $signMsg;
	    // exit(dump($data));
		// 生成表单数据
		echo $pPay->buildForm($data,$GATEWAY_URL);
 
	}
}
?>
