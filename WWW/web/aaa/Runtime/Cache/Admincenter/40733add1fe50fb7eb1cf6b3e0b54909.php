<?php if (!defined('THINK_PATH')) exit();?><!--_meta 作为公共模版分离出去-->
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

<link rel="stylesheet" type="text/css" href="../Template/admin/resources/ui/lib/bootstrap-Switch/bootstrapSwitch.css" />
<style>
.border-danger-outline{
	border:1px solid #dd514c;
}
.border-success-outline{
	border:1px solid #5eb95e;
}
.tabBar1 {border-bottom: 2px solid #19a97b}
.tabBar1 span {background-color: #e8e8e8;cursor: pointer;display: inline-block;float: left;
font-weight: bold;height: 30px;line-height: 30px;padding: 0 15px}
.tabBar1 span.current{background-color: #19a97b;color: #fff}
</style>
<title>数据清理</title>
</head>
<body>
<div class="page-container">
  <div class="tabBar cl"><span>数据清理</span></div>
    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
            <tr class="text-c">
                <th bgcolor="#f9f9f9" width="100">数据项目</th>
                <th bgcolor="#f9f9f9">清理条件</th>
                <th bgcolor="#f9f9f9" width="60">操作</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-c">
                <th rowspan="3">会员账号清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>账户金额低于<input type="number" name="user[clearamountmin]" class="input-text" value="1" style="width:60px;" min="0" max="1">元&nbsp;，&nbsp;
并且<input type="number" name="user[clearday]" class="input-text" value="60" style="width:60px;" min="30">天未登录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>注册<input type="number" name="user1[clearday]" class="input-text" value="15" style="width:60px;" min="7">天内未登录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>内部账号 <input name="isnbuser" type="checkbox" value="1">全部</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>开奖数据清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="kaijiang[clearday]" class="input-text" value="2" style="width:60px;" min="1">天前的开奖</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>投注数据清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="touzhu[clearday]" class="input-text" value="60" style="width:60px;" min="45">天前,类型:<span class="select-box" style="width:80px"><select class="select" name="touzhu[state]"><option value="999">全部</option><option value="0">未开奖</option><option value="-2">撤单</option></select></span>投注记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>充值数据清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理清理<input type="number" name="recharge[clearday]" class="input-text" value="45" style="width:60px;" min="1">天前,类型:<span class="select-box" style="width:80px"><select class="select" name="recharge[state]"><option value="999">全部</option><option value="0">未审核</option><option value="-1">取消</option></select></span>的充值记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>提款数据清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="withdraw[clearday]" class="input-text" value="45" style="width:60px;" min="1">天前,类型:<span class="select-box" style="width:80px"><select class="select" name="withdraw[state]"><option value="999">全部</option><option value="0">未审核</option><option value="-1">退回取消</option></select></span>的充值记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>账变记录数据清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="fuddetail[clearday]" class="input-text" value="45" style="width:60px;" min="45">天前的账变记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>会员日志清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="memlog[clearday]" class="input-text" value="7" style="width:60px;" min="7">天前的记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
            <tr class="text-c">
                <th>管理员日志清理</th>
                <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form AjaxPostForm">
                <td>清理<input type="number" name="adminlog[clearday]" class="input-text" value="7" style="width:60px;" min="7">天前的记录</td>
                <td><button class="btn btn-danger-outline radius size-S" type="submit"><i class="Hui-iconfont">&#xe609;</i> 清理</button></td>
                </form>
            </tr>
        </tbody>
    </table> 
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

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-green',
		radioClass: 'iradio-green',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script>
</body>
</html>