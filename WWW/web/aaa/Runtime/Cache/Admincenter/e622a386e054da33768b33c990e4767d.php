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

<title>会员管理</title>
</head>
<body>
<nav class="breadcrumb">
<span class="l">
<a href="javascript:;" layer-url="<?php echo U('useradd');?>" title="添加会员" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加会员</a>&nbsp;&nbsp;&nbsp;
排序：<span class="select-box" style="width:100px"><select class="select" name="ordertype" onChange="window.location.href = this.value">
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>0]));?>">默认排序</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>1]));?>" <?php if($ordertype == 1): ?>selected<?php endif; ?>>注册时间低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>2]));?>" <?php if($ordertype == 2): ?>selected<?php endif; ?>>彩票返点高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>3]));?>" <?php if($ordertype == 3): ?>selected<?php endif; ?>>彩票返点低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>4]));?>" <?php if($ordertype == 4): ?>selected<?php endif; ?>>账户金额高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>5]));?>" <?php if($ordertype == 5): ?>selected<?php endif; ?>>账户金额低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>6]));?>" <?php if($ordertype == 6): ?>selected<?php endif; ?>>账户积分高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>7]));?>" <?php if($ordertype == 7): ?>selected<?php endif; ?>>账户积分低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>8]));?>" <?php if($ordertype == 8): ?>selected<?php endif; ?>>洗码余额高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>9]));?>" <?php if($ordertype == 9): ?>selected<?php endif; ?>>洗码余额低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>16]));?>" <?php if($ordertype == 16): ?>selected<?php endif; ?>>登陆时间高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>17]));?>" <?php if($ordertype == 17): ?>selected<?php endif; ?>>登陆时间低到高</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>18]));?>" <?php if($ordertype == 18): ?>selected<?php endif; ?>>在线时间高到低</option>
<option value="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME,array_merge($_GET,['ordertype'=>19]));?>" <?php if($ordertype == 19): ?>selected<?php endif; ?>>在线时间低到高</option>
</select></span>
</span>

<span class="r">
<a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</span>
</nav>
<div class="page-container">
	<form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
<input type="hidden" name="ordertype" value="<?php echo ($ordertype); ?>">
会员组：<span class="select-box" style="width:80px"><select class="select" name="groupid">
<option value="0">全部</option>
<?php if(is_array($grouplist)): $i = 0; $__LIST__ = $grouplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($gvo["groupid"]); ?>" <?php if($gvo['groupid'] == $groupid): ?>selected<?php endif; ?>><?php echo ($gvo["groupname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select></span>
类型：<span class="select-box" style="width:80px"><select class="select" name="proxy">
<option value="999">全部</option>
<option value="1" <?php if($proxy == 1): ?>selected<?php endif; ?>>代理</option>
<option value="0" <?php if($proxy == 0): ?>selected<?php endif; ?>>会员</option>
</select></span>
&nbsp;&nbsp;内部：<span class="select-box" style="width:80px"><select class="select" name="isnb">
<option value="999">全部</option>
<option value="1" <?php if($isnb == 1): ?>selected<?php endif; ?>>是</option>
<option value="0" <?php if($isnb == 0): ?>selected<?php endif; ?>>否</option>
</select></span>
在线：<input type="checkbox" value="1" name="isonline" <?php if($isonline == 1): ?>checked<?php endif; ?>>&nbsp;&nbsp;

        

    	注册时间:<input class="input-text" type="text" style="width:80px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" name="sDate" value="<?php echo ($_sDate); ?>"> - <input class="input-text" type="text" style="width:80px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" value="<?php echo ($_eDate); ?>" name="eDate">&nbsp;&nbsp;
    	金额:<input class="input-text" type="text" style="width:60px;" name="sAmount" value="<?php echo ($_sAmount); ?>"> - <input class="input-text" type="text" style="width:60px;" value="<?php echo ($_eAmount); ?>" name="eAmount">
        
<br><br>
        用户名：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($username); ?>" name="username">
        姓名：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($userbankname); ?>" name="userbankname">
        &nbsp;&nbsp;QQ：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($qq); ?>" name="qq">
		<?php if(isset($parentid)): ?><input name="parentid" type="hidden" value="<?php echo ($parentid); ?>">
        <a class="btn btn-default-outline radius" href="<?php echo U('manage',['parentid'=>$parentid]);?>">重置</a>
        <?php else: ?>
        &nbsp;&nbsp;昵称：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($nickname); ?>" name="nickname">
        &nbsp;&nbsp;登陆IP：<input class="input-text" type="text" style="width:60px;" value="<?php echo ($loginip); ?>" name="loginip"><?php endif; ?>
        <input class="btn btn-primary-outline radius" type="submit" value="查询">
        
    </form>
	<div class="mt-5">
    <form method="post" action="">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
                <th width="40">ID</th>
				<th width="60">会员组</th>
				<th width="60">用户名</th>
				<th width="60">姓名</th>
				<th width="60">上线</th>
				<th width="60">类型</th>
				<th width="60">晋级记录</th>
				<th width="60">金额</th>
				<th width="60">积分</th>
				<th width="60">返点</th>
				<th width="75">洗码余额</th>
				<th width="70">总充值</th>
				<th width="70">总提款</th>
				<th width="70">总输赢</th>
				<th width="40">登陆时间</th>
				<th width="40">登陆来源</th>
				<th width="30">状态</th>
				<th width="30">资料</th>
				<th width="125">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" class="checkids" value="<?php echo ($vo["id"]); ?>" name="ids[<?php echo ($vo["id"]); ?>]"></td>
                <td><?php echo ($vo["id"]); ?></td>
                <td><?php echo ($grouplist[$vo['groupid']]['groupname']); ?></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('useredit',['id'=>$vo['id']]);?>" title="编辑-<?php echo ($vo["username"]); ?>"><?php echo ($vo["username"]); ?></u></td>
                <td><?php echo ($vo["userbankname"]); ?></td>
                <td><?php echo ($vo["shangji"]); ?></td>
                <td><?php if($vo['proxy'] == 1): ?>代理<?php elseif($vo['proxy'] == 0): ?>会员<?php endif; ?></td>
               <!-- <td><?php echo ($grouplist[$vo['groupid']]['groupname']); ?></td>-->
				<td>VIP<?php echo ($vo["jinjijilu"]); ?></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('balance',['id'=>$vo['id']]);?>" title="修改-<?php echo ($vo["username"]); ?>金额"><?php echo ($vo["balance"]); ?></u></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('point',['id'=>$vo['id']]);?>" title="修改-<?php echo ($vo["username"]); ?>积分"><?php echo ($vo["point"]); ?></u></td>
				<td><?php echo ($vo["fandian"]); ?>%</td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('xima',['id'=>$vo['id']]);?>" title="修改-<?php echo ($vo["username"]); ?>洗码余额"><?php echo ($vo["xima"]); ?></u></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('recharge',['uid'=>$vo['id']]);?>" title="<?php echo ($vo["username"]); ?>的充值记录">总充值</u></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('withdraw',['uid'=>$vo['id']]);?>" title="<?php echo ($vo["username"]); ?>的充值记录">总提款</u></td>
                <td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('Tongji/user',['username'=>$vo['username']]);?>" title="<?php echo ($vo["username"]); ?>的游戏统计">总输赢</u></td>
                <td><?php echo (date("m-d H:i",$vo["logintime"])); ?></td>
                <td><?php echo ($vo["loginsource"]); ?></td>
                <td><?php if($vo['isonline'] == 1): ?><span class="c-green">在线</span><?php else: ?><span class="c-999">离线</span><?php endif; ?></td>
				<td><u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('ziliao',['id'=>$vo['id']]);?>" title="查看-<?php echo ($vo["username"]); ?>资料">资料</u></td>

				<td class="td-manage">
                <u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('fuddetail',['uid'=>$vo['id']]);?>" title="帐变-<?php echo ($vo["username"]); ?>">帐变</u> | <u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('useredit',['id'=>$vo['id']]);?>" title="编辑-<?php echo ($vo["username"]); ?>">编辑</u> | <u style="cursor:pointer" class="text-primary" layer-url="<?php echo U('manage',['parentid'=>$vo['id']]);?>" layer-width="100%" layer-height="100%" title="查看下级-<?php echo ($vo["username"]); ?>">下级</u>
                <br>
                <u style="cursor:pointer" class="text-primary" layer-del-url="<?php echo U('userdelete',['id'=>$vo['id']]);?>" title="删-<?php echo ($vo["username"]); ?>">删</u> | <u style="cursor:pointer" class="text-primary" layer-alt-url="<?php echo U('unline',['id'=>$vo['id']]);?>" title="踢-<?php echo ($vo["username"]); ?>">踢</u> | <u style="cursor:pointer" class="text-primary <?php if($vo[islock] == 0): ?>c-999<?php elseif($vo[islock] == 1): ?>c-green<?php endif; ?>" lock-url="<?php echo U('lock',['id'=>$vo['id']]);?>" title="锁定/解锁-<?php echo ($vo["username"]); ?>"><?php if($vo['islock'] == 0): ?>锁定<?php elseif($vo['islock'] == 1): ?>解锁<?php endif; ?></u>
                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
    <div class="cl pd-5 bg-1 bk-gray mt-20 text-c">
        <div class="l" style="padding:0"><a href="javascript:;" deleteall-url="<?php echo U('deleteall');?>" title="删除" class="btn btn-danger-outline radius">删除</a></div>
        <div class="r">
            <div class="pageNav l" style="padding:0"><?php echo ($page); ?></div>
            <div class="r">共有数据：<strong><?php echo ($totalcount); ?></strong> 条 </div>
        </div>
    </div>
    </form>
	</div>
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
$(document).on("click", "[lock-url]", function() {
	var obj       = $(this);
	var url       = $(this).attr('lock-url');
	var title     = obj.attr('title')?$(this).attr('title'):'您确认操作吗？';
	var issuccess = obj.hasClass('label-success');
	layer.confirm(title,function(index){
		$.getJSON(url, function(json){
			if(json.status==1){
				if(obj.text()=='锁定'){
					obj.removeClass('c-999').addClass('c-green').text('解锁');
				}else{
					obj.removeClass('c-green').addClass('c-999').text('锁定');
				}
				
				layer.msg('操作成功',{icon: 1,time:1000});
			}else{
				layer.msg(json.info,{icon: 2,time:2000});
			};
		});
	});
});

</script>
</body>
</html>