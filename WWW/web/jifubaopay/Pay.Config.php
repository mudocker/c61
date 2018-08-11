<?php
/* *
 * 配置文件
 * 版本：1.0
 * 日期：2017.5.15
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码。
 */ 
 
	
    $SIGN_TYPE = "MD5"; // 请选择签名类型，默认为md5商户根据自己要求
	
    $KEY = "b0877237b36319f83c67cc984a56ec4f"; // 支付系统密钥，
	
	 $GATEWAY_URL = "http://gate.malljls.com/cooperate/gateway.cgi";//  支付（正式环境）
	
    
    $MERCHANT_ID = "2017102011010088"; // 商户在支付平台的平台号
	

	 $MERCHANT_NOTIFY_URL = ""; // 商户通知地址（请根据自己的部署情况设置下面的路径）
    
     $API_VERSION = "1.0.0.0";  //支付版本的api的版本号

    
     $APINAME_PAY = "TRADE.B2C";  //网银支付
    
     $APINAME_SCANPAY = "TRADE.SCANPAY"; //扫码支付
     
     $APINAME_QUERY = "TRADE.QUERY";//支付订单查询
    
     $APINAME_REFUND = "TRADE.REFUND"; //退款申请
     
     $APINAME_SETTLE = "TRADE.SETTLE";//单笔委托结算
     
     $APINAME_SETTLE_QUERY = "TRADE.SETTLE.QUERY";//单笔委托结算查询
    
     $APINAME_NOTIFY = "TRADE.NOTIFY"; //支付通知
     
      $APINAME_H5PAY = "TRADE.H5PAY";// H5支付
    
      $APINAME_QUICKPAY_APPLY="TRADE.QUICKPAY.APPLY"; //快捷支付
     
      $APINAME_QUICKPAY_CONFIRM = "TRADE.QUICKPAY.CONFIRM"; //快捷确认
	 

?>
