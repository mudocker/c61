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

<title>基本设置</title>
</head>
<body>
<div class="page-container">
	<form class="form form-horizontal" id="AjaxPostForm" method="post" action="<?php echo url('System/settingdo');?>" confirm="确定吗修改系统配置吗？">
		<div id="tab-system" class="HuiTab">
			<div class="tabBar cl"><span class="current">赠送活动</span></div>
            
            <div class="tabCon">
                
				<!--<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">注册赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
新注册用户赠送本人：<input type="text" class="input-text" name="info[newregamount]" value="<?php echo ($setlist["newregamount"]); ?>" style="width:60px;">元，0为关闭活动 
					</div>
				</div>-->
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">绑定银行赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
绑定银行账户赠送本人：<input type="text" class="input-text" name="info[bindcardamount]" value="<?php echo ($setlist["bindcardamount"]); ?>" style="width:60px;">元，0为关闭活动 (后台银行卡审核成功后赠送)
					</div>
				</div>
                
                
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">单次充值赠送活动(不累计)：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、单次充值满：<input type="text" name="info[activity_cz0_money]" class="input-text" value="<?php echo ($setlist["activity_cz0_money"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[activity_cz0_zsmoney]" class="input-text" value="<?php echo ($setlist["activity_cz0_zsmoney"]); ?>" style="width:60px;">%
<br><br>
2、单次充值满：<input type="text" name="info[activity_cz1_money]" class="input-text" value="<?php echo ($setlist["activity_cz1_money"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[activity_cz1_zsmoney]" class="input-text" value="<?php echo ($setlist["activity_cz1_zsmoney"]); ?>" style="width:60px;">%
<br><br>
3、单次充值满：<input type="text" name="info[activity_cz2_money]" class="input-text" value="<?php echo ($setlist["activity_cz2_money"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[activity_cz2_zsmoney]" class="input-text" value="<?php echo ($setlist["activity_cz2_zsmoney"]); ?>" style="width:60px;">%
<br><br>
4、单次充值满：<input type="text" name="info[activity_cz3_money]" class="input-text" value="<?php echo ($setlist["activity_cz3_money"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[activity_cz3_zsmoney]" class="input-text" value="<?php echo ($setlist["activity_cz3_zsmoney"]); ?>" style="width:60px;">%
<br><br>
5、单次充值满：<input type="text" name="info[activity_cz4_money]" class="input-text" value="<?php echo ($setlist["activity_cz4_money"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[activity_cz4_zsmoney]" class="input-text" value="<?php echo ($setlist["activity_cz4_zsmoney"]); ?>" style="width:60px;">%
<br><br>

					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">每日消费赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、日消费满：<input type="text" name="info[riCommissionBase0_0]" class="input-text" value="<?php echo ($setlist["riCommissionBase0_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riCommissionBase0_1]" class="input-text" value="<?php echo ($setlist["riCommissionBase0_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riCommissionBase0_2]" class="input-text" value="<?php echo ($setlist["riCommissionBase0_2"]); ?>" style="width:60px;">%
<br><br>
2、日消费满：<input type="text" name="info[riCommissionBase1_0]" class="input-text" value="<?php echo ($setlist["riCommissionBase1_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riCommissionBase1_1]" class="input-text" value="<?php echo ($setlist["riCommissionBase1_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riCommissionBase1_2]" class="input-text" value="<?php echo ($setlist["riCommissionBase1_2"]); ?>" style="width:60px;">%
<br><br>
3、日消费满：<input type="text" name="info[riCommissionBase2_0]" class="input-text" value="<?php echo ($setlist["riCommissionBase2_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riCommissionBase2_1]" class="input-text" value="<?php echo ($setlist["riCommissionBase2_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riCommissionBase2_2]" class="input-text" value="<?php echo ($setlist["riCommissionBase2_2"]); ?>" style="width:60px;">%

					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">每月消费赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、月消费满：<input type="text" name="info[yueCommissionBase0_0]" class="input-text" value="<?php echo ($setlist["yueCommissionBase0_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueCommissionBase0_1]" class="input-text" value="<?php echo ($setlist["yueCommissionBase0_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueCommissionBase0_2]" class="input-text" value="<?php echo ($setlist["yueCommissionBase0_2"]); ?>" style="width:60px;">%
<br><br>
2、月消费满：<input type="text" name="info[yueCommissionBase1_0]" class="input-text" value="<?php echo ($setlist["yueCommissionBase1_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueCommissionBase1_1]" class="input-text" value="<?php echo ($setlist["yueCommissionBase1_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueCommissionBase1_2]" class="input-text" value="<?php echo ($setlist["yueCommissionBase1_2"]); ?>" style="width:60px;">%
<br><br>
3、月消费满：<input type="text" name="info[yueCommissionBase2_0]" class="input-text" value="<?php echo ($setlist["yueCommissionBase2_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueCommissionBase2_1]" class="input-text" value="<?php echo ($setlist["yueCommissionBase2_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueCommissionBase2_2]" class="input-text" value="<?php echo ($setlist["yueCommissionBase2_2"]); ?>" style="width:60px;">%

					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">日亏损赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、日亏损满：<input type="text" name="info[riKuisunBase0_0]" class="input-text" value="<?php echo ($setlist["riKuisunBase0_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riKuisunBase0_1]" class="input-text" value="<?php echo ($setlist["riKuisunBase0_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riKuisunBase0_2]" class="input-text" value="<?php echo ($setlist["riKuisunBase0_2"]); ?>" style="width:60px;">%
<br><br>
2、日亏损满：<input type="text" name="info[riKuisunBase1_0]" class="input-text" value="<?php echo ($setlist["riKuisunBase1_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riKuisunBase1_1]" class="input-text" value="<?php echo ($setlist["riKuisunBase1_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riKuisunBase1_2]" class="input-text" value="<?php echo ($setlist["riKuisunBase1_2"]); ?>" style="width:60px;">%
<br><br>
3、日亏损满：<input type="text" name="info[riKuisunBase2_0]" class="input-text" value="<?php echo ($setlist["riKuisunBase2_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[riKuisunBase2_1]" class="input-text" value="<?php echo ($setlist["riKuisunBase2_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[riKuisunBase2_2]" class="input-text" value="<?php echo ($setlist["riKuisunBase2_2"]); ?>" style="width:60px;">%
<br><br>


					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">月亏损赠送活动：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、月亏损满：<input type="text" name="info[yueKuisunBase0_0]" class="input-text" value="<?php echo ($setlist["yueKuisunBase0_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueKuisunBase0_1]" class="input-text" value="<?php echo ($setlist["yueKuisunBase0_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueKuisunBase0_2]" class="input-text" value="<?php echo ($setlist["yueKuisunBase0_2"]); ?>" style="width:60px;">%
<br><br>
2、月亏损满：<input type="text" name="info[yueKuisunBase1_0]" class="input-text" value="<?php echo ($setlist["yueKuisunBase1_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueKuisunBase1_1]" class="input-text" value="<?php echo ($setlist["yueKuisunBase1_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueKuisunBase1_2]" class="input-text" value="<?php echo ($setlist["yueKuisunBase1_2"]); ?>" style="width:60px;">%
<br><br>
3、月亏损满：<input type="text" name="info[yueKuisunBase2_0]" class="input-text" value="<?php echo ($setlist["yueKuisunBase2_0"]); ?>" style="width:150px;">元，本人赠送：<input type="text" name="info[yueKuisunBase2_1]" class="input-text" value="<?php echo ($setlist["yueKuisunBase2_1"]); ?>" style="width:60px;">%，上家赠送：<input type="text" name="info[yueKuisunBase2_2]" class="input-text" value="<?php echo ($setlist["yueKuisunBase2_2"]); ?>" style="width:60px;">%
<br><br>


					</div>
				</div>
                
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">代理分红设置：</label>
					<div class="formControls col-xs-8 col-sm-9">
1、月下线亏损满：<input type="text" name="info[agentBonusBase0_0]" class="input-text" value="<?php echo ($setlist["agentBonusBase0_0"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[agentBonusBase0_1]" class="input-text" value="<?php echo ($setlist["agentBonusBase0_1"]); ?>" style="width:60px;">%
<br><br>
2、月下线亏损满：<input type="text" name="info[agentBonusBase1_0]" class="input-text" value="<?php echo ($setlist["agentBonusBase1_0"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[agentBonusBase1_1]" class="input-text" value="<?php echo ($setlist["agentBonusBase1_1"]); ?>" style="width:60px;">%
<br><br>
3、月下线亏损满：<input type="text" name="info[agentBonusBase2_0]" class="input-text" value="<?php echo ($setlist["agentBonusBase2_0"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[agentBonusBase2_1]" class="input-text" value="<?php echo ($setlist["agentBonusBase2_1"]); ?>" style="width:60px;">%
<br><br>
4、月下线亏损满：<input type="text" name="info[agentBonusBase3_0]" class="input-text" value="<?php echo ($setlist["agentBonusBase3_0"]); ?>" style="width:150px;">元，赠送：<input type="text" name="info[agentBonusBase3_1]" class="input-text" value="<?php echo ($setlist["agentBonusBase3_1"]); ?>" style="width:60px;">%
<br><br>


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
		$('.tabBar').find('span').click();
	}) 
</script>
</body>
</html>