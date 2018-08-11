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
<title>系统预开a奖彩管理</title>
</head>
<body>
<nav class="breadcrumb">
	<div class="l">
		<form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="l">
<span class="select-box clearfix" style="width:150px; background:#fff; text-align:center; margin:0 auto"><select class="select" onChange="javascipt:window.location.href=this.value">
		<?php if(is_array($cpcategory)): foreach($cpcategory as $cpk=>$cptype): ?><optgroup label="<?php echo ($cptype); ?>">
			<?php if(is_array($cplist)): $i = 0; $__LIST__ = $cplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cpv): $mod = ($i % 2 );++$i; if($cpk == $cpv['typeid']): ?><option value="<?php echo U('yukaijiang',['name'=>$cpv['name']]);?>" <?php if($cpv['name'] == $name): ?>selected<?php endif; ?>><?php echo ($cpv["title"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</optgroup><?php endforeach; endif; ?>
	</select>
</span>
		</form>
		<a href="<?php echo U('yukaijianghistory');?>" class="btn radius l" style="margin-left:10px;line-height:1.6em;margin-top:3px">历史ab开奖</a>
	</div>
	<div class="r">
		<a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷k新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</div>

</nav>
<div class="page-container">
	<div class="mt-5">
		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
			<tr class="text-c">
				<th width="40">彩种</th>
				<th width="60">期号</th>
				<th width="100">开奖a号码</th>
				<th width="80">开奖时间</th>
				<th width="60">管理人</th>
				<th width="60">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($openlist)): $i = 0; $__LIST__ = $openlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['isbc'] == 1): ?><tr class="text-c success"><?php else: ?><tr class="text-c "><?php endif; ?>
				<td><?php echo ($vo["cptitle"]); ?></td>
				<td><?php echo ($vo["expect"]); ?><input id="expect-<?php echo ($vo["expect"]); ?>" type="hidden" value="<?php echo ($vo["expect"]); ?>"><input id="name-<?php echo ($vo["expect"]); ?>" type="hidden" value="<?php echo ($vo["name"]); ?>"></td>
				<td>
					<?php
 $opencodes = array(); $opencodes = explode(',',$vo['opencode']); ?>
					<!--时时彩-->
					<?php if(($typeid) == "ssc"): ?><div style="margin:0 auto;width:26em;">
						<?php $__FOR_START_16518__=0;$__FOR_END_16518__=5;for($i=$__FOR_START_16518__;$i < $__FOR_END_16518__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:auto;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_6041__=0;$__FOR_END_6041__=10;for($j=$__FOR_START_6041__;$j < $__FOR_END_6041__;$j+=1){ ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php } ?>
						</select><?php } ?>
					</div><?php endif; ?>
					<!--11选5-->
					<?php if(($typeid) == "x5"): ?><div style="margin:0 auto;width:26em;">
						<?php $__FOR_START_32071__=0;$__FOR_END_32071__=5;for($i=$__FOR_START_32071__;$i < $__FOR_END_32071__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:auto;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_23134__=0;$__FOR_END_23134__=12;for($j=$__FOR_START_23134__;$j < $__FOR_END_23134__;$j+=1){ if($j<10)$j='0'.$j?>
								<?php if(($j) != "0"): ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php endif; } ?>
						</select><?php } ?>
					</div><?php endif; ?>


					<!--PK10-->
					<?php if(($typeid) == "pk10"): ?><div style="margin:0 auto;width:40em;">
						<?php $__FOR_START_10612__=0;$__FOR_END_10612__=10;for($i=$__FOR_START_10612__;$i < $__FOR_END_10612__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:40px;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_20031__=0;$__FOR_END_20031__=11;for($j=$__FOR_START_20031__;$j < $__FOR_END_20031__;$j+=1){ if($j<10)$j='0'.$j?>
								<?php if(($j) != "0"): ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php endif; } ?>
						</select><?php } ?>
					</div><?php endif; ?>


					<!--快乐8-->
					<?php if(($typeid) == "keno"): ?><div style="margin:0 auto;width:40em;">
						<?php $__FOR_START_11933__=0;$__FOR_END_11933__=20;for($i=$__FOR_START_11933__;$i < $__FOR_END_11933__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:40px;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_13068__=0;$__FOR_END_13068__=81;for($j=$__FOR_START_13068__;$j < $__FOR_END_13068__;$j+=1){ if($j<10)$j='0'.$j?>
								<?php if(($j) != "0"): ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php endif; } ?>
						</select>
						<?php if($i==9) echo'<br />'; } ?>
					</div><?php endif; ?>


					<!--快3-->
					<?php if(($typeid) == "k3"): ?><div style="margin:0 auto;width:20em;">
						<?php $__FOR_START_24338__=0;$__FOR_END_24338__=3;for($i=$__FOR_START_24338__;$i < $__FOR_END_24338__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:auto;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_5205__=0;$__FOR_END_5205__=7;for($j=$__FOR_START_5205__;$j < $__FOR_END_5205__;$j+=1){ if(($j) != "0"): ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php endif; } ?>
						</select><?php } ?>
					</div><?php endif; ?>
					<!--低频彩-->
					<?php if(($typeid) == "dpc"): ?><div style="margin:0 auto;width:20em;">
						<?php $__FOR_START_9955__=0;$__FOR_END_9955__=3;for($i=$__FOR_START_9955__;$i < $__FOR_END_9955__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:auto;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_15978__=0;$__FOR_END_15978__=10;for($j=$__FOR_START_15978__;$j < $__FOR_END_15978__;$j+=1){ ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php } ?>
						</select><?php } ?>
					</div><?php endif; ?>
					<!--lhc-->
					<?php if(($typeid) == "lhc"): ?><div style="margin:0 auto;width:40em;">
						<?php $__FOR_START_26848__=0;$__FOR_END_26848__=7;for($i=$__FOR_START_26848__;$i < $__FOR_END_26848__;$i+=1){ ?><select id="opencode<?php echo ($i+1); ?>-<?php echo ($vo["expect"]); ?>" style="padding:2px 1px;width:40px;float:left;margin:1px 2px;">
							<option value="">第<?php echo ($i+1); ?>球</option>
							<?php $__FOR_START_3931__=0;$__FOR_END_3931__=50;for($j=$__FOR_START_3931__;$j < $__FOR_END_3931__;$j+=1){ if($j<10)$j='0'.$j?>
							<?php if(($j) != "0"): ?><option value="<?php echo ($j); ?>" <?php if($opencodes[$i] == $j): ?>selected<?php endif; ?>><?php echo ($j); ?></option><?php endif; } ?>
						</select><?php } ?>
					</div><?php endif; ?>
				</td>
				<td><?php echo ($vo["opentime"]); ?><input id="opentime-<?php echo ($vo["expect"]); ?>" type="hidden" value="<?php echo ($vo["opentime"]); ?>"></td>
				<td id="stateadmin-<?php echo ($vo["expect"]); ?>"><?php echo ($vo["stateadmin"]); ?></td>
				<td class="td-manage">
					<button onClick="baocun(<?php echo ($vo["expect"]); ?>);" class="btn btn-secondary-outline radius size-S">保存</button>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
			var sysname="<?php echo ($admininfo['username']); ?>";
			var
				opencode1  = $("#opencode1-"+$id),
				opencode2  = $("#opencode2-"+$id),
				opencode3  = $("#opencode3-"+$id),
				opencode4  = $("#opencode4-"+$id),
				opencode5  = $("#opencode5-"+$id),
				opencode6  = $("#opencode6-"+$id),
				opencode7  = $("#opencode7-"+$id),
				opencode8  = $("#opencode8-"+$id),
				opencode9  = $("#opencode9-"+$id),
				opencode10  = $("#opencode10-"+$id),
				opencode11  = $("#opencode11-"+$id),
				opencode12  = $("#opencode12-"+$id),
				opencode13  = $("#opencode13-"+$id),
				opencode14  = $("#opencode14-"+$id),
				opencode15  = $("#opencode15-"+$id),
				opencode16  = $("#opencode16-"+$id),
				opencode17  = $("#opencode17-"+$id),
				opencode18  = $("#opencode18-"+$id),
				opencode19  = $("#opencode19-"+$id),
				opencode20  = $("#opencode20-"+$id),
				name  = $("#name-"+$id),
				opentime  = $("#opentime-"+$id),
				url       = "<?php echo url('ykjbaocun');?>";
			layer.confirm('确定修改吗？',function(index){
				$.post(url,{'expect':$id,
					'opencode1':opencode1.val(),
					'opencode2':opencode2.val(),
					'opencode3':opencode3.val(),
					'opencode4':opencode4.val(),
					'opencode5':opencode5.val(),
					'opencode6':opencode6.val(),
					'opencode7':opencode7.val(),
					'opencode8':opencode8.val(),
					'opencode9':opencode9.val(),
					'opencode10':opencode10.val(),
					'opencode11':opencode11.val(),
					'opencode12':opencode12.val(),
					'opencode13':opencode13.val(),
					'opencode14':opencode14.val(),
					'opencode15':opencode15.val(),
					'opencode16':opencode16.val(),
					'opencode17':opencode17.val(),
					'opencode18':opencode18.val(),
					'opencode19':opencode19.val(),
					'opencode20':opencode20.val(),
					'name':name.val(),'opentime':opentime.val()}, function(json){
					if(json.status==1){
						opencode1.parents("tr").addClass('success');
						$("#stateadmin-"+$id).text(sysname);
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