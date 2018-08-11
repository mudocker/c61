<?php
/* *
 * 功能：支付回调文件
 * 版本：1.0
 * 日期：2012-03-26
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码。
 */
 
	require_once("Mobaopay.Config.php");
	require_once("lib/MobaoPay.class.php");

	// 请求数据赋值
	$data = "";
	$data['apiName'] = $_REQUEST["apiName"];
	// 通知时间
	$data['notifyTime'] = $_REQUEST["notifyTime"];
	// 支付金额(单位元，显示用)
	$data['tradeAmt'] = $_REQUEST["tradeAmt"];
	// 商户号
	$data['merchNo'] = $_REQUEST["merchNo"];
	// 商户参数，支付平台返回商户上传的参数，可以为空
	$data['merchParam'] = $_REQUEST["merchParam"];
	// 商户订单号
	$data['orderNo'] = $_REQUEST["orderNo"];
	// 商户订单日期
	$data['tradeDate'] = $_REQUEST["tradeDate"];
	// Mo宝支付订单号
	$data['accNo'] = $_REQUEST["accNo"];
	// Mo宝支付账务日期
	$data['accDate'] = $_REQUEST["accDate"];
	// 订单状态，0-未支付，1-支付成功，2-失败，4-部分退款，5-退款，9-退款处理中
	$data['orderStatus'] = $_REQUEST["orderStatus"];
	// 签名数据
	$data['signMsg'] = $_REQUEST["signMsg"];

	//print_r( $data);
	// 初始化
	$cMbPay = new MbPay($pfxFile, $pubFile, $passwd);
	// 准备准备验签数据
	$str_to_sign = $cMbPay->prepareSign($data);
	// 验证签名
	$resultVerify = $cMbPay->verify($str_to_sign, $data['signMsg']);
	//var_dump($data);
	if ($resultVerify) 
	{
		if ('1' == $_REQUEST["notifyType"]) {
			$url = "notify.php";
			Header("Location: $url");
			return true;
		}
		// 签名验证通过
		echo "支付成功".'<br>';
		echo "商户订单号 ".$data['orderNo'].'<br>';
		echo "商户订单日期 ".$data['tradeDate'].'<br>';
		echo "商户参数 ".$data['merchParam'].'<br>';
		echo "Mo宝支付订单号 ".$data['accNo'].'<br>';
		echo "Mo宝支付账务日期 ".$data['accDate'].'<br>';
		echo "支付金额 ".$data['tradeAmt']."元".'<br>';
		echo "订单状态 ";
		
		if ($data['orderStatus'] == '0')
			echo "未处理[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '1')// 需更新商户系统订单状态
			echo "成功[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '2')// 需更新商户系统订单状态
			echo "失败[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '4')// 需更新商户系统订单状态
			echo "部分退货[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '5')// 需更新商户系统订单状态
			echo "全部退货[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '9')// 需更新商户系统订单状态
			echo "退款处理中[".$data['orderStatus']."]";
		else if ($data['orderStatus'] == '11')
			echo "订单过期[".$data['orderStatus']."]";
		else
			echo "其他[".$data['orderStatus']."]";

		/*商户需要在此处判定通知中的订单状态做后续处理*/
		/*由于页面跳转同步通知和异步通知均发到当前页面，所以此处还需要判定商户自己系统中的订单状态，避免重复处理。*/
		
		return true;
	}
	else
	{
		// 签名验证失败
		echo "验证签名失败";
		return false;
	}

?>