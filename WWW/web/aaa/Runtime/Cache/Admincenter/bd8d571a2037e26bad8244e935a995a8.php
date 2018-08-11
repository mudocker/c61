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

<style>
.border-danger-outline{
	border:1px solid #dd514c;
}
.border-success-outline{
	border:1px solid #5eb95e;
}
</style>
<title>彩种a管理</title>
</head>
<body>
<nav class="breadcrumb">
<span class="l">
<form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
<span class="select-box clearfix" style="width:150px; background:#fff; text-align:center; margin:0 auto"><select class="select" onChange="javascipt:window.location.href=this.value">
<?php if(is_array($cpcategory)): foreach($cpcategory as $cpk=>$cptype): ?><optgroup label="<?php echo ($cptype); ?>">
    <?php if(is_array($cplist)): $i = 0; $__LIST__ = $cplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cpv): $mod = ($i % 2 );++$i; if($cpk == $cpv['typeid']): ?><option value="<?php echo url('kaijiang',['name'=>$cpv['name']]);?>" <?php if($cpv['name'] == $name): ?>selected<?php endif; ?>><?php echo ($cpv["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</optgroup><?php endforeach; endif; ?>
</select></span>
期号：<input class="input-text" type="text" style="width:100px;" value="<?php echo ($expect); ?>" name="expect">
<input type="hidden" name="name" value="<?php echo ($name); ?>">
<input class="btn btn-default-outline radius" type="submit" value="查询">
</form>
&nbsp;&nbsp;&nbsp;</span>
&nbsp;&nbsp;&nbsp;<a href="javascript:;" layer-url="<?php echo U('kaijiangadd');?>" title="添加ab开奖" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加aa开奖</a>
<a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="mt-5">
    <form method="post" action="">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="60">彩种</th>
				<th width="60">期号</th>
				<th width="120">开奖号码</th>
				<th width="120">开奖时间</th>
				<th width="60">来源</th>
				<th width="60">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($olist)): $i = 0; $__LIST__ = $olist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
				<td><input type="checkbox" class="checkids" value="<?php echo ($vo["id"]); ?>" name="ids[<?php echo ($vo["id"]); ?>]"></td>
				<td><?php echo ($cptitle); ?></td>
				<td><?php echo ($vo["expect"]); ?><input id="expect-<?php echo ($vo["id"]); ?>" defaultValue="<?php echo ($vo["expect"]); ?>" class="input-text" readonly type="hidden" style="width:160px" name="" value="<?php echo ($vo["expect"]); ?>"></td>
				<td><input id="opencode-<?php echo ($vo["id"]); ?>" defaultValue="<?php echo ($vo["opencode"]); ?>" class="input-text input-change" type="text" style="width:160px" name="" value="<?php echo ($vo["opencode"]); ?>"></td>
				<td><input id="opentime-<?php echo ($vo["id"]); ?>" defaultValue="<?php echo (date('Y-m-d H:i:s',$vo["opentime"])); ?>" class="input-text input-change" type="text" style="width:160px" name="" value="<?php echo (date('Y-m-d H:i:s',$vo["opentime"])); ?>"></td>
				<td><?php echo ($vo["source"]); ?></td>
				<td class="td-manage">
                <button onClick="baocun(<?php echo ($vo["id"]); ?>);" class="btn btn-secondary-outline radius size-S" type="button">保存</button>
                <button onClick="chongzhi(<?php echo ($vo["id"]); ?>);" class="btn btn-secondary-outline radius size-S" type="button">重置开奖</button>
                </td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
    <div class="cl pd-5 bg-1 bk-gray mt-20">
        <div class="l" style="padding:0"><a href="javascript:;" deleteall-url="<?php echo U('kjdeleteall');?>" title="删除" class="btn btn-danger-outline radius">删除</a></div>
        <div class="r">
            <div class="pageNav l" style="padding:0"><?php echo ($pageshow); ?></div>
            <div class="r">共有数据：<strong><?php echo ($total); ?></strong> 条 </div>
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
$("input.input-change").blur(function(){
	var defaultvalue = $(this).attr('defaultValue'),
		value        = $(this).val();
	if(defaultvalue!=value){
		$(this).addClass('danger');
	}else{
		$(this).removeClass('danger');
	}
});
function baocun($id){
	var opencode  = $("#opencode-"+$id),
		opentime  = $("#opentime-"+$id),
		url       = "<?php echo url('kjbaocun');?>";
	layer.confirm('确定修改吗？',function(index){
		$.post(url,{'id':$id,'opencode':opencode.val(),'opentime':opentime.val()}, function(json){
			if(json.status==1){
				opencode.attr('defaultValue',opencode.val()).removeClass('danger').addClass('success');
				opentime.attr('defaultValue',opentime.val()).removeClass('danger').addClass('success');
				layer.msg(json.info,{icon:1,time:2000});
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
};
function chongzhi($id){
	var url       = "<?php echo url('kjchongzhi');?>";
	layer.confirm('重置开奖针对部分投注未开奖的将会重新开奖，已经开奖的开奖结果不变？',function(index){
		$.post(url,{'id':$id}, function(json){
			if(json.status==1){
				layer.msg(json.info,{icon:1,time:2000});
			}else if(json.status==0){
				layer.msg(json.info,{icon:2,time:3000});
			}
			
		}, "json");
	});
};
</script>
</body>
</html>