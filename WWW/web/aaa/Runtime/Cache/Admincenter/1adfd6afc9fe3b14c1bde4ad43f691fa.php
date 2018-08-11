<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
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
<title><?php echo GetVar('webtitle');?>管理系统</title>
</head>
<body>
<header class="navbar-wrapper">
	<div class="navbar navbar-fixed-top">
		<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml"><?php echo GetVar('webtitle');?>管理系统</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">梦想系统</a> <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
			<nav class="nav navbar-nav navbar-menu">
				<ul class="cl">
					<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 快捷菜单 <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="<?php echo U('Tongji/gaikuang');?>" data-title="统计概况">统计概况</a></li>
							<li><a href="<?php echo U('Tongji/yingkui');?>" data-title="盈亏统计">盈亏统计</a></li>
							<li><a href="<?php echo U('Member/recharge');?>" data-title="充值管理">充值管理</a></li>
							<li><a href="<?php echo U('Member/withdraw');?>" data-title="提现记录">提款管理</a></li>
							<li><a href="<?php echo U('Member/manage');?>" data-title="会员列表">会员列表</a></li>
							<li><a href="<?php echo U('Member/banklist');?>" data-title="会员银行卡">会员银行卡</a></li>
							<li><a href="<?php echo U('Member/fuddetail');?>" data-title="账变记录">账变记录</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
				<ul class="cl">
					<li><?php echo ($admininfo['groupname']); ?></li>
					<li class="dropDown dropDown_hover"> <a href="javascript:void(0);" class="dropDown_A"><?php echo ($admininfo['username']); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:void(0);" onclick="article_add('修改密码','<?php echo U('Adminmember/editpass',['type'=>'pass']);?>')">修改密码</a></li>
							<li><a href="javascript:void(0);" onclick="article_add('修改安全码','<?php echo U('Adminmember/editpass',['type'=>'safecode']);?>')">修改安全码</a></li>
							<li><a href="<?php echo U('Public/loginout');?>">退出</a></li>
						</ul>
					</li>
					<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
						<ul class="dropDown-menu menu radius box-shadow">
							<li><a href="javascript:;" data-val="default" title="黑色">黑色</a></li>
							<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
							<li><a href="javascript:;" data-val="green" title="绿色">绿色(默认)</a></li>
							<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
							<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
							<li><a href="javascript:;" data-val="orange" title="绿色">橙色</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<aside class="Hui-aside">
	<input runat="server" id="divScrollValue" type="hidden" value="" />
	<div class="menu_dropdown bk_2">
    ﻿<dl id="menu-system">
    <dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd style="display:block">
        <ul>
            <li><a href="<?php echo U('System/setting');?>" data-title="系统设置">系统设置</a></li>
            <li><a href="<?php echo U('Caipiao/cptype');?>" data-title="彩种管理">彩种管理</a></li>
            <li><a href="<?php echo U('Caipiao/wanfa');?>" data-title="玩法管理">玩法管理</a></li>
            <li><a href="<?php echo U('Caipiao/kaijiang');?>" data-title="开奖管理">开奖管理</a></li>
            <li><a href="<?php echo U('Caipiao/yukaijiang');?>" data-title="预开奖">系统彩预开奖</a></li>
            <li><a href="<?php echo U('Game/manage');?>" data-title="游戏记录">游戏记录</a></li>
            <li><a href="<?php echo U('Game/checkerrorder');?>" data-title="注单异常检测">注单异常检测</a></li>
        </ul>
    </dd>
</dl>


<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe61e;</i> 数据统计<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Tongji/gaikuang');?>" data-title="统计概况">统计概况</a></li>
            <li><a href="<?php echo U('Tongji/yingkui');?>" data-title="盈亏统计">盈亏统计</a></li>
            <li><a href="<?php echo U('Tongji/user');?>" data-title="用户统计">用户统计</a></li>
            <li><a href="<?php echo U('Tongji/tdgaikuang');?>" data-title="团队概况">团队概况</a></li>
            <li><a href="<?php echo U('Tongji/cptouzhu3d');?>" data-title="彩种投注统计">彩种投注统计</a></li>
            <li><a href="<?php echo U('Tongji/chongti3d');?>" data-title="充提款统计">充提款统计</a></li>
        </ul>
    </dd>
</dl>


<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6f3;</i> 电子银行<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Sysbank/manage');?>" data-title="提款银行">提款银行</a></li>
            <li><a href="<?php echo U('Member/payset');?>" data-title="存款方式配置">存款方式配置</a></li>
            <li><a href="<?php echo U('Member/recharge');?>" data-title="充值记录">充值记录</a></li>
            <li><a href="<?php echo U('Member/withdraw');?>" data-title="提现记录">提现记录</a></li>
        </ul>
    </dd>
</dl>




<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe60d;</i> 会员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Membergroup/manage');?>" data-title="会员组">会员组</a></li>
            <li><a href="<?php echo U('Member/manage');?>" data-title="会员列表">会员列表</a></li>
            <li><a href="<?php echo U('Member/sameipuser');?>" data-title="同IP会员检测">同IP会员检测</a></li>
            <li><a href="<?php echo U('Member/fuddetail');?>" data-title="账变记录">账变记录</a></li>
            <li><a href="<?php echo U('Member/banklist');?>" data-title="银行信息">银行信息</a></li>
            <li><a href="<?php echo U('Member/agentlink');?>" data-title="注册链接">代理注册链接</a></li>
            <li><a href="<?php echo U('Member/memlog');?>" data-title="登录日志">登录日志</a></li>
        </ul>
    </dd>
</dl>
<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6bb;</i> 真人视讯<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Zhenren/merchant');?>" data-title="商户信息">商户信息</a></li>
            <li><a href="<?php echo U('Zhenren/transrecord');?>" data-title="额度转让">额度转让</a></li>
            <li><a href="<?php echo U('Zhenren/agztrecord');?>" data-title="AG投注记录">AG投注记录</a></li>
			 <li><a href="<?php echo U('Zhenren/bbtzrecord');?>" data-title="BB投注记录">BB投注记录</a></li>
			 <li><a href="<?php echo U('Zhenren/agztreport');?>" data-title="AG会员报表">AG会员报表</a></li>
			 <li><a href="<?php echo U('Zhenren/bbtzreport');?>" data-title="BB会员报表">BB会员报表</a></li>
			  <li><a href="<?php echo U('Zhenren/getrecords');?>" data-title="真人采集">真人采集</a></li>
         
        </ul>
    </dd>
</dl>

<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Admingroup/manage');?>" data-title="管理员组">管理员组</a></li>
            <li><a href="<?php echo U('Adminmember/manage');?>" data-title="管理员列表">管理员列表</a></li>
            <li><a href="<?php echo U('Adminmember/memlog');?>" data-title="管理员日志">管理员日志</a></li>
        </ul>
    </dd>
</dl>

<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6bb;</i> 活动管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('System/zengsong');?>" data-title="赠送活动">赠送活动</a></li>
            <li><a href="<?php echo U('Member/fanshui');?>" data-title="会员反水">每日加奖</a></li>
            <li><a href="<?php echo U('Member/jinjijiangli');?>" data-title="晋级奖励">晋级奖励</a></li>
            <li><a href="<?php echo U('Member/dailiyongjin');?>" data-title="代理佣金">代理佣金</a></li>
        </ul>
    </dd>
</dl>

<!--
<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6bb;</i> 佣金管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Mod/manage');?>" data-title="消费佣金发放">消费佣金发放</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="消费佣金发放">消费佣金发放</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="积分兑换">积分兑换</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="积分兑换记录">积分兑换记录</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="分红统计">分红统计</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="分红发放">分红发放</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="分红发放记录">分红发放记录</a></li>
        </ul>
    </dd>
</dl>


<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6bb;</i> 返利抽奖<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Category/manage');?>" data-title="转盘配置">转盘配置</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="转盘记录">转盘记录</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="砸金蛋配置">砸金蛋配置</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="砸金蛋记录">砸金蛋记录</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="刮刮乐配置">刮刮乐配置</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="刮刮乐记录">刮刮乐记录</a></li>
        </ul>
    </dd>
</dl>


<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe63b;</i> 站内短消息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Mod/manage');?>" data-title="模型管理">模型管理</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="资讯分类">资讯分类</a></li>
            <li><a href="<?php echo U('Content/manage');?>" data-title="资讯管理">资讯管理</a></li>
        </ul>
    </dd>
</dl>

<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe6d0;</i> 在线客服系统<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Mod/manage');?>" data-title="模型管理">模型管理</a></li>
            <li><a href="<?php echo U('Category/manage');?>" data-title="资讯分类">资讯分类</a></li>
            <li><a href="<?php echo U('Content/manage');?>" data-title="资讯管理">资讯管理</a></li>
        </ul>
    </dd>
</dl>
-->

<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe616;</i> 内容管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('News/category');?>" data-title="资讯栏目">资讯栏目管理</a></li>
            <li><a href="<?php echo U('News/manage');?>" data-title="新闻资讯">新闻资讯管理</a></li>
            <li><a href="<?php echo U('News/gonggao');?>" data-title="公告管理">网站公告管理</a></li>
        </ul>
    </dd>
</dl>


<dl id="menu-article">
    <dt><i class="Hui-iconfont">&#xe616;</i> 运维管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
    <dd>
        <ul>
            <li><a href="<?php echo U('Yunwei/caiji');?>" data-title="采集设置">采集设置</a></li>
            <li><a href="<?php echo U('Yunwei/dbclear');?>" data-title="数据清理">数据清理</a></li>
            <li><a href="<?php echo U('Database/index',['type'=>'export']);?>" data-title="数据库备份">数据库备份</a></li>
            <li><a href="<?php echo U('Database/index',['type'=>'import']);?>" data-title="数据库还原">数据库还原</a></li>
            <!--<li><a href="<?php echo U('Database/nization');?>" data-title="数据备份同步">数据备份同步</a></li>-->
            <li><a href="<?php echo U('Yunwei/jihua');?>" data-title="计划任务">计划任务</a></li>
            <li><a href="<?php echo U('Yunwei/yijianclear');?>" data-title="一键清理数据">一键清理数据</a></li>
        </ul>
    </dd>
</dl>




	</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
	<div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
		<div class="Hui-tabNav-wp">
			<ul id="min_title_list" class="acrossTab cl">
				<li class="active"><span title="统计概况" data-href="<?php echo U('Tongji/Tongjiweb');?>">我的桌面</span><em></em></li>
			</ul>
		</div>
		<div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
	</div>
	<div id="iframe_box" class="Hui-article">
		<div class="show_iframe">
			<div style="display:none" class="loading"></div>
			<iframe scrolling="yes" frameborder="0" src="<?php echo U('Tongji/gaikuang');?>"></iframe>
		</div>
	</div> 
</section>
<script type="text/javascript" src="../Template/admin/resources/ui/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="../Template/admin/resources/ui/static/h-ui.admin/js/H-ui.admin.js"></script> 
<script type="text/javascript">
function article_add(title,url){
	layer_show(title,url);
}
loadAudioSource();
function loadAudioSource(num) {
	var audioHtml = '';
	audioHtml += '<audio controls id="audiotikuan" style="display:none;"><source src="../Template/admin/resources/audio/tikuan.mp3" type="audio/mpeg"></audio>';
	audioHtml += '<audio controls id="audiochongzhi" style="display:none;"><source src="../Template/admin/resources/audio/chongzhi.mp3" type="audio/mpeg"></audio>';
	audioHtml += '<audio controls id="audiobankbind" style="display:none;"><source src="../Template/admin/resources/audio/bankbind.mp3" type="audio/mpeg"></audio>';
	$("body").append(audioHtml);

}
 
function audioPlay(name) {
	var audio = document.getElementById("audio" + name);
	if(!audio) {
		setTimeout(function(){
			audioPlay(name);
		}, 50);
		return false;
	}
	audio.play('tikuan');
}
function checkspeck(){
	$.getJSON("<?php echo U('Index/checkspeck');?>", function(data){
	   if(data.sign){
		   if(data.tkcount>0){
			   audioPlay('tikuan');
		   }else if(data.czcount>0){
			   audioPlay('chongzhi');
		   }else if(data.bankbindcount>0){
			   audioPlay('bankbind');
		   }
	   }
	});
}
window.setInterval("checkspeck();",10000);
</script> 
</body>
</html>