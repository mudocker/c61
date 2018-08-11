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

<title>存款方式添加/修改</title>
</head>
<body>
<article class="page-container">
	<form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form" id="AjaxPostForm">
		<?php if(isset($info)): ?><input name="id" type="hidden" value="<?php echo ($info[$_pk]); ?>"><?php endif; ?>
        
                
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否线上支付：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="isonline" type="radio" id="isonline-1" value="1" <?php if($info['isonline'] == 1): ?>checked<?php endif; ?>>
					<label for="state-1">是</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="isonline-0" name="isonline" value="-1" <?php if($info['isonline'] == -1): ?>checked<?php endif; ?>>
					<label for="state-0">否</label>
				</div>
			</div>
		</div>
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标识：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($info["paytype"]); ?>" placeholder="标识" name="paytype">
			</div>
		</div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($info["paytypetitle"]); ?>" placeholder="支付方式名称" name="paytypetitle">
			</div>
		</div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">副名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo ($info["ftitle"]); ?>" placeholder="副名称" name="ftitle">
			</div>
		</div>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">充值金额设置：</label>
			<div class="formControls col-xs-8 col-sm-9">
最低充值:
<input class="input-text" name="minmoney" value="<?php echo ($info["minmoney"]); ?>" style="width:90px;" type="text">元
&nbsp;&nbsp;
最高充值:<input class="input-text" name="maxmoney" value="<?php echo ($info["maxmoney"]); ?>" style="width:90px;" type="text">元
 
			</div>
		</div>
        <div id="payconfigs"></div>
		<link rel="stylesheet" href="../Template/admin/resources/ui/lib/KindEditor/themes/default/default.css" />
		<script charset="utf-8" src="../Template/admin/resources/ui/lib/KindEditor/kindeditor-min.js"></script>
		<script charset="utf-8" src="../Template/admin/resources/ui/lib/KindEditor/lang/zh-CN.js"></script>
		<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="remark"]', {
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : [
						'source','fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
						'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
						'insertunorderedlist', '|', 'emoticons', 'image', 'link']
				});
			});
		</script>
        
        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">支付说明：</label>
			<div class="formControls col-xs-8 col-sm-9">
                <textarea name="remark" style="width:100%;height:200px;visibility:hidden;"><?php echo ($info["remark"]); ?></textarea>
			</div>
		</div>
                
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
			<div class="formControls col-xs-8 col-sm-9 skin-minimal">
				<div class="radio-box">
					<input name="state" type="radio" id="state-1" value="1" <?php if($info['state'] == 1): ?>checked<?php endif; ?>>
					<label for="state-1">启用</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="state-0" name="state" value="-1" <?php if($info['state'] == -1): ?>checked<?php endif; ?>>
					<label for="state-0">禁用</label>
				</div>
			</div>
		</div>
        
        
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;确定&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

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

<script id="payisonline0" type="text/html">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">收款人姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["bankname"]); ?>" placeholder="收款人姓名" name="configs[bankname]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">收款人账号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["bankcode"]); ?>" placeholder="收款人账号" name="configs[bankcode]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否二维码支付：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="configs[isewm]" type="radio" id="isewm-1" value="1" <?php if($configs['isewm'] == 1): ?>checked<?php endif; ?>>
				<label for="state-1">是</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="isewm-0" name="configs[isewm]" value="-1" <?php if($configs['isewm'] == -1): ?>checked<?php endif; ?>>
				<label for="state-0">否</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">二维码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["ewmurl"]); ?>" placeholder="二维码" name="configs[ewmurl]" id="ewmurl">
			<input id="btn_ewmurl"  class="btn btn-default uk-button" type="button" value="选择文件">
		</div>
	</div>
</script>
<script id="payisonline1" type="text/html">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">商户标识：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["merchantid"]); ?>" placeholder="商户标识" name="configs[merchantid]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">商家密钥1：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["merchantkey1"]); ?>" placeholder="商家密钥1" name="configs[merchantkey1]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">商家密钥2：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["merchantkey2"]); ?>" placeholder="商家密钥2" name="configs[merchantkey2]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">前台跳转地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["redirecturl"]); ?>" placeholder="前台跳转地址" name="configs[redirecturl]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">前台通知地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["hrefbackurl"]); ?>" placeholder="前台通知地址" name="configs[hrefbackurl]">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">异步通知地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="<?php echo ($configs["returnbackurl"]); ?>" placeholder="异步通知地址" name="configs[returnbackurl]">
		</div>
	</div>
</script>
<script>
$(function(){
	var isonline = $("input[name='isonline']:checked").val();
	chengeonlinepay(isonline);
});
$("input[name='isonline']").change(function(){
	chengeonlinepay($("input[name='isonline']:checked").val());
})
function chengeonlinepay(value){
	if(value==1){
		var html = $("#payisonline1").html();
		$("#payconfigs").html(html);
	}else if(value==-1){
		var html = $("#payisonline0").html();
		$("#payconfigs").html(html);
	}else{
		$("#payconfigs").html('');
	}
}
</script>
<script>
	KindEditor.ready(function(K) {
		var editor = K.editor({
			uploadJson: "<?=(is_ssl()?'https://':'http://').$_SERVER["HTTP_HOST"].U('Uploads/upload',array('allowext'=>'gif|jpg|jpeg|png|bmp','size'=>2));?>",
			allowFileManager : false
		});

		var btn_ewmurlReadyTime = null;

		btn_ewmurlReadyTime = setInterval(function () {
				if($('#btn_ewmurl').length <= 0){
					return;
				}else{
					K("#btn_ewmurl").click(function() {
						editor.loadPlugin('image', function() {
							editor.plugin.imageDialog({
								imageUrl : K("#ewmurl").val(),
								clickFn : function(url, title, width, height, border, align) {
									K("#ewmurl").val(url);
									editor.hideDialog();
								}
							});
						});
					});
					clearInterval(btn_ewmurlReadyTime);
				}
			}
			, 1000);
	});
</script>
</body>
</html>