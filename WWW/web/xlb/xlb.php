<?php
/* *
 * 功能：支付接口类
 * 版本：1.0
 * 日期：2015-03-26
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码。
 */
 	
class xlb {

	function get_code($order,$configs,$host){
		//$configs['returnbackurl'] = $configs['hrefbackurl'] = $host;
		require_once("./xlb/Mobaopay.Config.php");
		require_once("./xlb/MobaoPay.class.php");
	
		// 请求数据赋值
		$data = "";
		// 商户APINMAE，WEB渠道一般支付
		$data['apiName'] = $mobaopay_apiname_pay;
		// 商户API版本
		$data['apiVersion'] = $mobaopay_api_version;
		// 商户在迅联宝支付的平台号
		$data['platformID'] = $configs['merchantid'];
		// 迅联宝支付分配给商户的账号
		$data['merchNo'] = $configs['merchantid'];
		// 商户通知地址
		$data['merchUrl'] = $configs['returnbackurl'].'/Payback.xlb';
		// 银行代码，不传输此参数则跳转收银台
		//$data['bankCode'] = 'BOC';
		
		//商户订单号
		$data['orderNo'] = $order["trano"];
		// 商户订单日期
		$data['tradeDate'] = date("Ymd",$order["oddtime"]);
		// 商户交易金额
		$data['amt'] = $order['amount'];;
		// 商户参数
		$data['merchParam'] = $order["id"];
		// 商户交易摘要
		$data['tradeSummary'] = '账户充值';
		
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
		
		// 初始化
		$cMbPay = new \MbPay($configs['merchantkey1'], $mobaopay_gateway);
		// 准备待签名数据
		$str_to_sign = $cMbPay->prepareSign($data);
		// 数据签名
		$sign = $cMbPay->sign($str_to_sign);
		$data['signMsg'] = $sign;
		// 生成表单数据
		return $cMbPay->buildForm($data, $mobaopay_gateway);
	}
}
?>
