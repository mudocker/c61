<?php
/**
1）merchant_private_key，商户私钥;merchant_public_key,商户公钥；商户需要按照《密钥对获取工具说明》操作并获取商户私钥，商户公钥。
2）demo提供的merchant_private_key、merchant_public_key是测试商户号1118004517的商户私钥和商户公钥，请商家自行获取并且替换；
3）使用商户私钥加密时需要调用到openssl_sign函数,需要在php_ini文件里打开php_openssl插件
4）php的商户私钥在格式上要求换行，如下所示；
*/
	$merchant_private_key='BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAMAeYc78jfe85tmZ
ql8psc6BFRwfENq8kmmuqFbD4MJ2f+AXF1c81VALTphJXUJJuY2Not61VeLd44QB
j/id4vKLux4j5olITrf9E5jwaSZmjwDFLpGv3zj4mqEZ2Z90BL/8u8PmSJ3EVaiU
V8SOYY+4lLegjOcnLdsLIXAI7LZHAgMBAAECgYEAjzjXH7DFwW9xBb159pGlvVYb
v6glL3wvBlwvoOdL8ozWzd9JBj8SoyaaxArFXHqLusxhI/g5e/SA/VMQ2n4Rxgap
EzF+MPqZgTLyVQEVGdT1vUJUDTNk/Y4wtPEDtJ1JalgCdynm77j5XiDHy23fOyFM
7JOY0uhPz9rLJgHk9ykCQQDlx29OtGtZnxrlyDMKkZr5pkqjbo6REkENTaHcZlNZ
AyFvAa8SfIXGJFoqOxBPpx/ZDf1mh88JIAcmrafFqPzbAkEA1grFKsEPmPCOeZGv
Sg1flCA0b7i7OmnOSxqC1ABqwhz/x+EEa25FrH+qrQDqmrGGLRXSP5EVMrifbFyY
58cyBQJAKu27qeSjObcz+0IP5yWU4pdi0m3RTOEwLiAW4Wpsn/CpymdyIe4JwB8C
iWlHftomZRLsCL/OulG1hFBlS9RqiQJAF0omuAc3xkFuj0XN1/Xqj3iNnBZysOFw
Y/WnhJ/i/eof3sTaMUJXbHSbwqVV4a0tV1yHewkzUEiMeEL/FEE1bQJBAKyj6W7a
0gqs6vopOHQu0bZzPd095XKF194501Sr3sDckiqcflOHE7x3O75Zr6iK6XMUstYl
ijzEJHBwC/j/kWM=
-----END PRIVATE KEY-----';

	//merchant_public_key,商户公钥，按照说明文档上传此密钥到智付商家后台，位置为"支付设置"->"公钥管理"->"设置商户公钥"，代码中不使用到此变量
$pubKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDAHmHO/I33vObZmapfKbHOgRUc
HxDavJJprqhWw+DCdn/gFxdXPNVQC06YSV1CSbmNjaLetVXi3eOEAY/4neLyi7se
I+aJSE63/ROY8GkmZo8AxS6Rr984+JqhGdmfdAS//LvD5kidxFWolFfEjmGPuJS3
oIznJy3bCyFwCOy2RwIDAQAB';
		

	$merchant_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCJQIEXUkjG2RoyCnfucMX1at7O
PtOCDSiKZhtzHw5HOjXKteBpYBqEBOZc9pNjP/fKbvBNZ3Z7XxUn5ECfQbPCtH9y
++c0WxAYPoZiPDEYeQmRJfqPR68c0aAtZN5Kh7H1SI2ZRvoMUdZGvvFy3vuPnTwm
3R+aHq17bch/0ZAudwIDAQAB
-----END PUBLIC KEY-----';
	
/**
1)dinpay_public_key，智付公钥，每个商家对应一个固定的智付公钥（不是使用工具生成的密钥merchant_public_key，不要混淆），
即为智付商家后台"公钥管理"->"智付公钥"里的绿色字符串内容,复制出来之后调成4行（换行位置任意，前面三行对齐），
并加上注释"-----BEGIN PUBLIC KEY-----"和"-----END PUBLIC KEY-----"
2)demo提供的dinpay_public_key是测试商户号1118004517的智付公钥，请自行复制对应商户号的智付公钥进行调整和替换。
3）使用智付公钥验证时需要调用openssl_verify函数进行验证,需要在php_ini文件里打开php_openssl插件
*/
		$dinpay_public_key ='-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCJQIEXUkjG2RoyCnfucMX1at7O
PtOCDSiKZhtzHw5HOjXKteBpYBqEBOZc9pNjP/fKbvBNZ3Z7XxUn5ECfQbPCtH9y
++c0WxAYPoZiPDEYeQmRJfqPR68c0aAtZN5Kh7H1SI2ZRvoMUdZGvvFy3vuPnTwm
3R+aHq17bch/0ZAudwIDAQAB
-----END PUBLIC KEY-----'; 	


	



?>