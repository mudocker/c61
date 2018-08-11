<?php if (!defined('THINK_PATH')) exit();?>﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/html5.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/respond.min.js"></script>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/skin/green/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="../Template/admin/resources/ui/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>基本设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 系统设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form class="form form-horizontal" id="AjaxPostForm" method="post" action="<?php echo url('System/settingdo');?>" confirm="确定吗修改系统配置吗？">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl"><span>基本设置</span><span>后台安全</span><span>前台安全</span><span>邮件设置</span><span>其他设置</span></div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[webtitle]" placeholder="控制在25个字、50个字节以内" value="<?php echo ($setlist["webtitle"]); ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">关键词：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[keywords]" placeholder="5个左右,8汉字以内,用英文,隔开" value="<?php echo ($setlist["keywords"]); ?>" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">描述：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[description]" placeholder="空制在80个汉字，160个字符以内" value="<?php echo ($setlist["description"]); ?>" class="input-text">
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">允许撤单：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[iskillorder]" value="1" <?php if($setlist['iskillorder'] == 1): ?>checked<?php endif; ?>>是 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[iskillorder]" value="0" <?php if($setlist['iskillorder'] == 0): ?>checked<?php endif; ?>>否 </label>
					</div>
				</div>
				<!--<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">网站开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
						
                        <label><input type="radio" name="info[webisopen]" value="1" <?php if($setlist['webisopen'] == 1): ?>checked<?php endif; ?>>开 &nbsp;&nbsp;</label>
                        <label><input type="radio" name="info[webisopen]" value="0" <?php if($setlist['webisopen'] == 0): ?>checked<?php endif; ?>>关 </label>
                        
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">网站关闭告示：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<textarea class="textarea" name="info[webcloseinfo]"><?php echo ($setlist["webcloseinfo"]); ?></textarea>
					</div>
				</div>-->
                <!--
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">总投注开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[switchbuy]" value="1" <?php if($setlist['switchbuy'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[switchbuy]" value="0" <?php if($setlist['switchbuy'] == 0): ?>checked<?php endif; ?>>关 </label>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">代理投注开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[switchdlbuy]" value="1" <?php if($setlist['switchdlbuy'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[switchdlbuy]" value="0" <?php if($setlist['switchdlbuy'] == 0): ?>checked<?php endif; ?>>关 </label>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">总代投注开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[switchzdbuy]" value="1" <?php if($setlist['switchzdbuy'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[switchzdbuy]" value="0" <?php if($setlist['switchzdbuy'] == 0): ?>checked<?php endif; ?>>关 </label>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">上线充值开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[recharge]" value="1" <?php if($setlist['recharge'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[recharge]" value="0" <?php if($setlist['recharge'] == 0): ?>checked<?php endif; ?>>关 </label>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">投注模式：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="checkbox" value="1" name="info[yuanmoshi]" <?php if($setlist['yuanmoshi'] == 1): ?>checked<?php endif; ?>>元 </label>&nbsp;&nbsp;
                        <label><input type="checkbox" value="1" name="info[jiaomoshi]" <?php if($setlist['jiaomoshi'] == 1): ?>checked<?php endif; ?>>角 </label>&nbsp;&nbsp;
                        <label><input type="checkbox" value="1" name="info[fenmoshi]" <?php if($setlist['fenmoshi'] == 1): ?>checked<?php endif; ?>>分 </label>&nbsp;&nbsp;
                        <label><input type="checkbox" value="1" name="info[limoshi]" <?php if($setlist['limoshi'] == 1): ?>checked<?php endif; ?>>厘 </label>&nbsp;&nbsp;
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">系统彩利润：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="info[xtclirun]" class="input-text" value="<?php echo ($setlist["xtclirun"]); ?>" style="width:60px;">%
                        &nbsp;&nbsp;0为随机，设置好后须重启开将器才能生效 
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">返点限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        最大：<input type="text" name="info[fanDianMax]" class="input-text" value="<?php echo ($setlist["fanDianMax"]); ?>" style="width:60px;">%&nbsp;&nbsp;
                        最小：<input type="text" name="info[fanDianMin]" class="input-text" value="<?php echo ($setlist["fanDianMin"]); ?>" style="width:60px;">%&nbsp;&nbsp;

					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">最大投注限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        最大投注：<input type="text" name="info[touzhuMax]" class="input-text" value="<?php echo ($setlist["touzhuMax"]); ?>" style="width:60px;">注&nbsp;&nbsp;
                        最大中奖：<input type="text" name="info[zhongjiangMax]" class="input-text" value="<?php echo ($setlist["zhongjiangMax"]); ?>" style="width:60px;">元&nbsp;&nbsp;
                     </div>
				</div>-->
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">返点限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
						最大：<input type="text" name="info[fanDianMax]" class="input-text" value="<?php echo ($setlist["fanDianMax"]); ?>" style="width:60px;">%&nbsp;&nbsp;
						最小：<input type="text" name="info[fanDianMin]" class="input-text" value="<?php echo ($setlist["fanDianMin"]); ?>" style="width:60px;">%&nbsp;&nbsp;

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">绑定银行卡：</label>
					<div class="formControls col-xs-8 col-sm-9">
最多数量：<input type="text" class="input-text" name="info[sysBankMaxNum]" value="<?php echo ($setlist["sysBankMaxNum"]); ?>" style="width:60px;">张&nbsp;&nbsp;
                        
					</div>
				</div>
                
				<!--
                <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">充值限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
最低金额：<input type="text" class="input-text" name="info[chongzhiMin]" value="<?php echo ($setlist["chongzhiMin"]); ?>" style="width:60px;">元&nbsp;&nbsp;
最高金额：<input type="text" class="input-text" name="info[chongzhiMax]" value="<?php echo ($setlist["chongzhiMax"]); ?>" style="width:60px;">元&nbsp;&nbsp;
                        
					</div>
				</div>
                -->
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">提款限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
打码量：<input type="text" name="info[damaliang]" class="input-text" value="<?php echo ($setlist["damaliang"]); ?>" style="width:60px;">%,(打码量 = 充值金额 乘 **%)
<br><br>
最低提款：<input type="text" name="info[tikuanMin]" class="input-text" value="<?php echo ($setlist["tikuanMin"]); ?>" style="width:60px;">元&nbsp;&nbsp;
最高提款：<input type="text" name="info[tikuanMax]" class="input-text" value="<?php echo ($setlist["tikuanMax"]); ?>" style="width:60px;">元&nbsp;&nbsp;日提款限额：<input type="text" name="info[ritikuanxiane]" class="input-text" value="<?php echo ($setlist["ritikuanxiane"]); ?>" style="width:80px;">元
<br><br>
时间段： 从<input type="text" name="info[tikuanstart]" class="input-text" value="<?php echo ($setlist["tikuanstart"]); ?>" style="width:60px;">&nbsp;&nbsp;
到<input type="text" name="info[tikuanend]" class="input-text" value="<?php echo ($setlist["tikuanend"]); ?>" style="width:60px;">&nbsp;&nbsp;
<br><br>
日提款次数： <input type="text" name="info[tikuannum]" class="input-text" value="<?php echo ($setlist["tikuannum"]); ?>" style="width:60px;">次&nbsp;&nbsp;
超出收取费用<input type="text" name="info[tikuannumoverbilv]" class="input-text" value="<?php echo ($setlist["tikuannumoverbilv"]); ?>" style="width:60px;">%&nbsp;&nbsp;
最低<input type="text" name="info[tikuannumovermin]" class="input-text" value="<?php echo ($setlist["tikuannumovermin"]); ?>" style="width:60px;">元，最高<input type="text" name="info[tikuannumovermax]" class="input-text" value="<?php echo ($setlist["tikuannumovermax"]); ?>" style="width:60px;">元
<br><br>
排队人数： <input type="text" name="info[paiduinum]" class="input-text" value="<?php echo ($setlist["paiduinum"]); ?>" style="width:60px;">人&nbsp;&nbsp; 排队人数=真实+后台
					</div>
				</div>

<!--				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">充值限制：</label>
					<div class="formControls col-xs-8 col-sm-9">
						最低充值：<input type="text" name="info[chongzhiMin]" class="input-text" value="<?php echo ($setlist["chongzhiMin"]); ?>" style="width:60px;">元&nbsp;&nbsp;
						最高充值：<input type="text" name="info[chongzhiMax]" class="input-text" value="<?php echo ($setlist["chongzhiMax"]); ?>" style="width:60px;">元&nbsp;&nbsp;
 						<br><br>

					</div>
				</div>-->

                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">积分规则：</label>
					<div class="formControls col-xs-8 col-sm-9">
每充值<input type="text" name="info[pointchongzhi]" class="input-text" value="<?php echo ($setlist["pointchongzhi"]); ?>" style="width:60px;">元&nbsp;积分增加<input type="text" name="info[pointchongzhiadd]" class="input-text" value="<?php echo ($setlist["pointchongzhiadd"]); ?>" style="width:60px;">分

					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">客服QQ：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[kefuqq]" placeholder="客服QQ" value="<?php echo ($setlist["kefuqq"]); ?>" class="input-text">
					</div>
				</div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">第三方客服链接代码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[kefuthree]" placeholder="客服链接代码" value="<?php echo ($setlist["kefuthree"]); ?>" class="input-text">
					</div>
				</div>
			</div>
            
            
			<div class="tabCon">
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台登录最大次数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						密码错误<input type="text" class="input-text" value="<?php echo ($setlist["loginerrornum"]); ?>" name="info[loginerrornum]"  style="width:60px;">次后，禁止登陆
                        <input type="text" class="input-text" value="<?php echo ($setlist["loginerrorclosetime"]); ?>" name="info[loginerrorclosetime]"  style="width:60px;">小时
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台登录图像验证码：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[islogincode]" value="1" <?php if($setlist['islogincode'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[islogincode]" value="0" <?php if($setlist['islogincode'] == 0): ?>checked<?php endif; ?>>关 </label>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台登录邮件验证码：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[isemailcode]" value="1" <?php if($setlist['isemailcode'] == 1): ?>checked<?php endif; ?>>开 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[isemailcode]" value="0" <?php if($setlist['isemailcode'] == 0): ?>checked<?php endif; ?>>关 </label>
                        <span class="c-danger">务必保证邮件服务器能正常通过smtp发送邮件，否则后台无法登陆</span>
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台邮件验证码过期时间：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[adminemailcodetime]" class="input-text" value="<?php echo ($setlist["adminemailcodetime"]); ?>" style="width:60px;" placeholder="后台邮件验证码过期时间">秒
					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台邮件验证码接收邮箱：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[getemailcode]" class="input-text" value="<?php echo ($setlist["getemailcode"]); ?>" placeholder="后台邮件验证码接收邮箱">
					</div>
				</div>
                
			</div>
			<div class="tabCon">
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">前台登录最大次数：</label>
					<div class="formControls col-xs-8 col-sm-9">
						密码错误<input type="text" class="input-text" value="<?php echo ($setlist["loginerrornum_q"]); ?>" name="info[loginerrornum_q]"  style="width:60px;">次后，禁止登陆
                        <input type="text" class="input-text" value="<?php echo ($setlist["loginerrorclosetime_q"]); ?>" name="info[loginerrorclosetime_q]"  style="width:60px;">小时
					</div>
				</div>
                
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">IP黑名单：<br><small>多个IP用","(英文逗号隔开)</small></label>
					<div class="formControls col-xs-8 col-sm-9">
						<label><input type="radio" name="info[ipblackisopen]" value="1" <?php if($setlist['ipblackisopen'] == 1): ?>checked<?php endif; ?>>开启 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[ipblackisopen]" value="0" <?php if($setlist['ipblackisopen'] == 0): ?>checked<?php endif; ?>>关闭 </label></br>
                        <textarea class="textarea" name="info[ipblacklist]"><?php echo ($setlist["ipblacklist"]); ?></textarea>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">IP白名单：<br><small>多个IP用","(英文逗号隔开)<br>白名单开启后只有允许的IP列表可以访问<br>用于网站维护测试等</small></label>
					<div class="formControls col-xs-8 col-sm-9">
						<label><input type="radio" name="info[ipwhiteisopen]" value="1" <?php if($setlist['ipwhiteisopen'] == 1): ?>checked<?php endif; ?>>开启 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[ipwhiteisopen]" value="0" <?php if($setlist['ipwhiteisopen'] == 0): ?>checked<?php endif; ?>>关闭 </label></br>
                        <textarea class="textarea" name="info[ipwhitelist]"><?php echo ($setlist["ipwhitelist"]); ?></textarea>
					</div>
				</div>
                
			</div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮件服务器：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[SMTP_HOST]"  class="input-text" value="<?php echo ($setlist["SMTP_HOST"]); ?>" placeholder="邮件服务器">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">安全协议：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <label><input type="radio" name="info[SMTP_SSL]" value="1" <?php if($setlist['SMTP_SSL'] == 1): ?>checked<?php endif; ?>>SSL连接 </label>&nbsp;&nbsp;
                        <label><input type="radio" name="info[SMTP_SSL]" value="0" <?php if($setlist['SMTP_SSL'] == 0): ?>checked<?php endif; ?>>普通连接 </label>
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮件发送端口：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[SMTP_PORT]"  class="input-text" value="<?php echo ($setlist["SMTP_PORT"]); ?>" placeholder="邮件发送端口">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">你的邮箱名：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[FROM_EMAIL]"  class="input-text" value="<?php echo ($setlist["FROM_EMAIL"]); ?>" placeholder="你的邮箱名">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">发件人地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" name="info[SMTP_USER]"  class="input-text" value="<?php echo ($setlist["SMTP_USER"]); ?>" placeholder="发件人地址">
					</div>
				</div>


                
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">发件人姓名</label>
                    <div class="formControls col-xs-8 col-sm-9">
                    	<input type="text" class="input-text" name="info[FROM_NAME]" value="<?php echo ($setlist["FROM_NAME"]); ?>" placeholder="发件人姓名">
                    </div>
                </div>
                
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">回复邮件地址</label>
                    <div class="formControls col-xs-8 col-sm-9">
                    	<input type="text" class="input-text" name="info[REPLY_EMAIL]" value="<?php echo ($setlist["REPLY_EMAIL"]); ?>" placeholder="回复邮件地址">
                    </div>
                </div>
                
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">回复邮件姓名</label>
                    <div class="formControls col-xs-8 col-sm-9">
                    	<input type="text" class="input-text" name="info[REPLY_NAME]" value="<?php echo ($setlist["REPLY_NAME"]); ?>" placeholder="回复邮件姓名">
                    </div>
                </div>

				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">邮箱密码：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="password" name="info[SMTP_PASS]"  class="input-text" value="<?php echo ($setlist["SMTP_PASS"]); ?>" placeholder="邮箱密码">
					</div>
				</div>
			</div>
			<div class="tabCon">
                
                
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">采集接口设置：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <input class="input-text" name="info[caijieapiurl]" placeholder="采集接口设置" value="<?php echo ($setlist["caijieapiurl"]); ?>" type="text"><br><small>修改5分钟内生效</small>
                        
                        
					</div>
				</div>
                
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">允许前台IP地址：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <textarea class="textarea" name="info[weballowips]"><?php echo ($setlist["weballowips"]); ?></textarea><br><small>前台服务器IP地址，多个用(,)隔开</small>
                        
                        
					</div>
				</div>
                
                <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">后台提示音：</label>
					<div class="formControls col-xs-8 col-sm-9">
充值提示音：
<label><input type="radio" name="info[czaudioplay]" value="1" <?php if($setlist['czaudioplay'] == 1): ?>checked<?php endif; ?>>开启提示 </label>&nbsp;&nbsp;
<label><input type="radio" name="info[czaudioplay]" value="0" <?php if($setlist['czaudioplay'] == 0): ?>checked<?php endif; ?>>关闭提示 </label>
&nbsp;&nbsp;&nbsp;&nbsp;
提示<input name="info[czaudioplaytime]" class="input-text"  value="<?php echo ($setlist["czaudioplaytime"]); ?>" style="width:60px;" type="number">分钟内的，超过：<input name="info[czaudioqxtime]" class="input-text" value="<?php echo ($setlist["czaudioqxtime"]); ?>" style="width:60px;" type="number">分钟自动关闭
<br><br>
提款提示音：
<label><input type="radio" name="info[tkaudioplay]" value="1" <?php if($setlist['tkaudioplay'] == 1): ?>checked<?php endif; ?>>开启提示 </label>&nbsp;&nbsp;
<label><input type="radio" name="info[tkaudioplay]" value="0" <?php if($setlist['tkaudioplay'] == 0): ?>checked<?php endif; ?>>关闭提示 </label>
&nbsp;&nbsp;&nbsp;&nbsp;
<input name="info[tkaudioplaytime]" class="input-text" value="<?php echo ($setlist["tkaudioplaytime"]); ?>" style="width:60px;" type="number">分钟内的
<br><br>
银行绑定提示音：
<label><input type="radio" name="info[cardaudioplay]" value="1" <?php if($setlist['cardaudioplay'] == 1): ?>checked<?php endif; ?>>开启提示 </label>&nbsp;&nbsp;
<label><input type="radio" name="info[cardaudioplay]" value="0" <?php if($setlist['cardaudioplay'] == 0): ?>checked<?php endif; ?>>关闭提示 </label>
&nbsp;&nbsp;&nbsp;&nbsp;

<br><br>

					</div>
				</div>
                
                <div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">默认推荐码：</label>
					<div class="formControls col-xs-8 col-sm-9">
                        <input type="text" name="info[defaulttjcode]" class="input-text" value="<?php echo ($setlist["defaulttjcode"]); ?>" style="width:80px;">会员注册页面提示(0 不提示)
                        
                        
					</div>
				</div>
                
                
			</div>
			
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/icheck/jquery.icheck.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","6");
});

<!--AJAX POST表单提交-->
$("#AjaxPostForm,.AjaxPostForm").submit(function(){
	var $this    = $(this);
	var $confirm = $this.attr('confirm');
	var url      = $this.attr('action');
 
	var defaultsubvalue = $("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val();
 
	layer.confirm('您确定需要操作吗？', {
	  btn: ['确定','取消'] 
	}, function(index){
	  	layer.close(index);
		$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val('正在提交...').attr("disabled","disabled");
		$.post(url,$this.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val(defaultsubvalue).removeAttr("disabled");
			 
				setTimeout("parentrefresh()", 2000);
			}else if(json.status==0){
				$("#AjaxPostForm,.AjaxPostForm").find("[type='submit']").val(defaultsubvalue).removeAttr("disabled");
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	}, function(index){
	  layer.close(index);
	});
	
	return false;
});
function parentrefresh(index){
	var index = parent.layer.getFrameIndex(window.name);
	if(window.name==''){
		window.location.reload();
	}else{
		parent.location.reload();
	}
	parent.layer.close(index);
 
 
}
$(document).on("click", "[layer-url]", function() {
	var title = $(this).attr('title')?$(this).attr('title'):'窗口信息',
		url   = $(this).attr('layer-url'),
		w     = $(this).attr('layer-width'),
		h     = $(this).attr('layer-height');
	if(w=='100%'){
		var layerindex = layer.open({
		  type: 2,
		  content: url,
		  area: ['320px', '195px'],
		  maxmin: true
		});
		layer.full(layerindex);
	}else{
		layer_show(title,url,w,h);
	}
});
$(document).on("click", "[status-url]", function() {
	var obj       = $(this);
	var url       = $(this).attr('status-url');
	var title     = obj.attr('title')?$(this).attr('title'):'您确认操作吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				if(issuccess){
					obj.removeClass('label-success').addClass('label-defaunt').text('禁用');
				}else{
					obj.removeClass('label-defaunt').addClass('label-success').text('启用');
				}
				layer.msg('操作成功',{icon: 1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});
$(document).on("click", "[layer-del-url]", function() {
	var obj       = $(this);
	var url       = obj.attr('layer-del-url');
	var title     = '您确认删除吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				obj.parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});
$(document).on("click", "[layer-alt-url]", function() {
	var obj       = $(this);
	var url       = obj.attr('layer-alt-url');
	var title     = '您确认操作吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				 
				layer.msg('操作成功!',{icon:1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});

$(document).on("click", "[deleteall-url]", function() {
	if($("input.checkids:checked").length<1){
		layer.msg('请勾选操作的数据行',{icon:5,time:3000});
		return false;
	}
	var obj       = $(this),
		url       = obj.attr('deleteall-url'),
		form      = obj.parents('form');
	form.attr('action',url)
	layer.confirm('确定批量删除吗？',function(index){
		$.post(url,form.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				setTimeout("window.location.reload()", 2000);
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
});

$(document).on("click", "[listorder-url]", function() {
	if($("input.checkids:checked").length<1){
		layer.msg('请勾选操作的数据行',{icon:5,time:3000});
		return false;
	}
	var obj       = $(this),
		url       = obj.attr('listorder-url'),
		form      = obj.parents('form');
	form.attr('action',url)
	layer.confirm('确定排序吗？',function(index){
		$.post(url,form.serialize(), function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
				setTimeout("window.location.reload()", 2000);
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
});

</script>
<!--/请在上方写此页面业务相关的脚本-->

<script>
	setTimeout(function(){
		$('.tabBar span').eq(0).click();
	}) 
</script>
</body>
</html>