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
<title>计划任务</title>
</head>
<body>
<div class="page-container">
    <p class="c-danger">计划任务由采集开奖服务器执行</p>
    <p class="c-danger">数据库自动备份保留近7天的备份,如需使用自动备份的数据进行还原请联系平台技术人员操作</p>
    <p class="c-danger">为避免同时执行过多计划任务影响数据库效率，同一个小时的计划应该隔开5分钟</p>
    <p class="c-danger">设置更改正常5分钟内生效</p>
    <form action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" method="post" class="form form-horizontal validate-form" id="AjaxPostForm">
        <div class="tabBar cl"><span>常规计划任务</span></div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th bgcolor="#f9f9f9" width="150">项目名称</th>
                <th bgcolor="#f9f9f9">计划开始时间</th>
                <th bgcolor="#f9f9f9">备注</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                <th>每日消费赠送活动</th>
                <td>
                    每天：
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_rixiaofei_shi]">
                    <?php $__FOR_START_21606__=0;$__FOR_END_21606__=24;for($i=$__FOR_START_21606__;$i < $__FOR_END_21606__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_rixiaofei_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                </select>
                </span>
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_rixiaofei_fen]">
                    <?php $__FOR_START_13223__=1;$__FOR_END_13223__=60;for($i=$__FOR_START_13223__;$i < $__FOR_END_13223__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_rixiaofei_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分</option><?php } ?>
                </select>
                </span>
                </td>
                <td>赠送前一天(系统设置->赠送活动)</td>
            </tr>

            <tr class="text-c">
                <th>日亏损赠送活动</th>
                <td>
                    每天：
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_rikuisun_shi]">
                    <?php $__FOR_START_4180__=0;$__FOR_END_4180__=24;for($i=$__FOR_START_4180__;$i < $__FOR_END_4180__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_rikuisun_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                </select>
                </span>
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_rikuisun_fen]">
                    <?php $__FOR_START_15357__=1;$__FOR_END_15357__=60;for($i=$__FOR_START_15357__;$i < $__FOR_END_15357__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_rikuisun_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分</option><?php } ?>
                </select>
                </span>
                </td>
                <td>赠送前一天(系统设置->赠送活动)</td>
            </tr>

            <tr class="text-c">
                <th>每月消费赠送活动</th>
                <td>
                    每月1号：
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_yuexiaofei_shi]">
                    <?php $__FOR_START_20722__=0;$__FOR_END_20722__=24;for($i=$__FOR_START_20722__;$i < $__FOR_END_20722__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_yuexiaofei_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                </select>
                </span>
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_yuexiaofei_fen]">
                    <?php $__FOR_START_25411__=1;$__FOR_END_25411__=60;for($i=$__FOR_START_25411__;$i < $__FOR_END_25411__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_yuexiaofei_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分</option><?php } ?>
                </select>
                </span>
                </td>
                <td>赠送上一个月(系统设置->赠送活动)</td>
            </tr>

            <tr class="text-c">
                <th>月亏损赠送活动</th>
                <td>
                    每月1号：
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_yuekuisun_shi]">
                    <?php $__FOR_START_24000__=0;$__FOR_END_24000__=24;for($i=$__FOR_START_24000__;$i < $__FOR_END_24000__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_yuekuisun_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                </select>
                </span>
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_yuekuisun_fen]">
                    <?php $__FOR_START_6905__=1;$__FOR_END_6905__=60;for($i=$__FOR_START_6905__;$i < $__FOR_END_6905__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_yuekuisun_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分</option><?php } ?>
                </select>
                </span>
                </td>
                <td>赠送上一个月(系统设置->赠送活动)</td>

            </tr>

            <tr class="text-c">
                <th>代理下线会员投注返点发放</th>
                <td>
                    每天：
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_dailifandian_shi]">
                    <?php $__FOR_START_2622__=0;$__FOR_END_2622__=24;for($i=$__FOR_START_2622__;$i < $__FOR_END_2622__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_dailifandian_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                </select>
                </span>
                <span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_dailifandian_fen]">
                    <?php $__FOR_START_28831__=1;$__FOR_END_28831__=60;for($i=$__FOR_START_28831__;$i < $__FOR_END_28831__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_dailifandian_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分</option><?php } ?>
                </select>
                </span>
                </td>
                <td>发放前一天(系统设置->赠送活动)</td>

            </tr>

            <tr class="text-c">
                <th>数据库库自动备份</th>
                <td>

                    <!--<span class="select-box" style="width:80px">
                    <select class="select" name="jihua[jihua_dbautoback_shi]">
                        <?php $__FOR_START_5612__=0;$__FOR_END_5612__=8;for($i=$__FOR_START_5612__;$i < $__FOR_END_5612__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_dbautoback_shi'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>点</option><?php } ?>
                    </select>
                    </span>-->
                    <span class="c-danger">影响服务器性能已取消</span>
                    <!--每：<span class="select-box" style="width:80px">
                    <select class="select" name="jihua[jihua_dbautoback_fen]">
                        <?php $__FOR_START_28085__=10;$__FOR_END_28085__=121;for($i=$__FOR_START_28085__;$i < $__FOR_END_28085__;$i+=5){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_dbautoback_fen'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>分钟</option><?php } ?>
                    </select>
                    </span>-->

                </td>
                <td>7天以前的备份数据自动删除</td>

            </tr>

            </tbody>
        </table>

        <div class="tabBar cl"><span>自动清理计划任务</span></div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th bgcolor="#f9f9f9" width="150">项目名称</th>
                <th bgcolor="#f9f9f9">保留时间</th>
                <th bgcolor="#f9f9f9">备注</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-c">
                <th>开奖数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_kaijiang_days]">
                    <?php $__FOR_START_3146__=1;$__FOR_END_3146__=61;for($i=$__FOR_START_3146__;$i < $__FOR_END_3146__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_kaijiang_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留1天的开奖</td>
            </tr>
            <tr class="text-c">
                <th>投注数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_touzhu_days]">
                    <?php $__FOR_START_30651__=45;$__FOR_END_30651__=91;for($i=$__FOR_START_30651__;$i < $__FOR_END_30651__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_touzhu_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留45天</td>
            </tr>
            <tr class="text-c">
                <th>代理佣金数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_fandian_days]">
                    <?php $__FOR_START_9432__=1;$__FOR_END_9432__=61;for($i=$__FOR_START_9432__;$i < $__FOR_END_9432__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_fandian_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留1天</td>
            </tr>
  <!--          <tr class="text-c">
                <th>晋级奖励数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_jinjijiangli_days]">
                    <?php $__FOR_START_12337__=1;$__FOR_END_12337__=61;for($i=$__FOR_START_12337__;$i < $__FOR_END_12337__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_jinjijiangli_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留1天</td>
            </tr>-->
            <tr class="text-c">
                <th>每日加奖数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_fanshui_days]">
                    <?php $__FOR_START_8982__=1;$__FOR_END_8982__=61;for($i=$__FOR_START_8982__;$i < $__FOR_END_8982__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_fanshui_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留1天</td>
            </tr>
            <tr class="text-c">
                <th>账变记录数据清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_fuddetail_days]">
                    <?php $__FOR_START_21655__=45;$__FOR_END_21655__=91;for($i=$__FOR_START_21655__;$i < $__FOR_END_21655__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_fuddetail_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留45天</td>
            </tr>
            <tr class="text-c">
                <th>会员日志清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_memlog_days]">
                    <?php $__FOR_START_13956__=7;$__FOR_END_13956__=31;for($i=$__FOR_START_13956__;$i < $__FOR_END_13956__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_memlog_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留7天</td>
            </tr>
            <tr class="text-c">
                <th>管理员日志清理</th>
                <td>
                    保留<span class="select-box" style="width:80px">
                <select class="select" name="jihua[jihua_adminlog_days]">
                    <?php $__FOR_START_7789__=7;$__FOR_END_7789__=31;for($i=$__FOR_START_7789__;$i < $__FOR_END_7789__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($setlist['jihua_adminlog_days'] == $i): ?>selected<?php endif; ?>><?php echo ($i); ?>天</option><?php } ?>
                </select>
                </span>
                </td>
                <td>最少保留7天</td>
            </tr>
            </tbody>
        </table>
        <input class="btn btn-success radius size-L btn-block" type="submit" value="保存计划设置">
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