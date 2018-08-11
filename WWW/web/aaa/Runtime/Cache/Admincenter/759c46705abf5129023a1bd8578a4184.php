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
<title>统计概况</title>
</head>
<body>
<nav class="breadcrumb">
    <div class="l">
        <form method="get" action="<?php echo U(CONTROLLER_NAME.'/'.ACTION_NAME);?>" class="text-c">
            <input type="hidden" name="uid" value="<?php echo ($info["id"]); ?>">
            时间:<input class="input-text" type="text" style="width:100px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" name="sDate" value="<?php echo ($_sDate); ?>"> - <input class="input-text" type="text" style="width:100px;" onFocus="WdatePicker({dateFmt:'yyyyMMdd'})" value="<?php echo ($_eDate); ?>" name="eDate">

            用户名：<input class="input-text" type="text" style="width:100px;" value="<?php echo ($username); ?>" name="username">
            <input class="btn btn-default-outline radius" type="submit" value="查询">
        </form>
    </div>
    <div class="r">
        <a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </div>
</nav>
<div class="page-container">

    <div class="tabBar cl"><span>盈亏统计</span><small>&nbsp;&nbsp;(排除内部会员数据)&nbsp;&nbsp;投注盈亏 = (投注消费金额-返奖金额)&nbsp;&nbsp;&nbsp;&nbsp;充提盈亏 = 自动充值+手动加款金额-手动减款金额-提款金额</small></div>

    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th bgcolor="#f9f9f9">自动充值</th>
            <th bgcolor="#f9f9f9">手动加</th>
            <th bgcolor="#f9f9f9">手动减</th>
            <th bgcolor="#f9f9f9">总充值</th>
            <th bgcolor="#f9f9f9">提款</th>
            <th bgcolor="#f9f9f9">消费</th>
            <th bgcolor="#f9f9f9">中奖</th>
            <th bgcolor="#f9f9f9">活动</th>
            <th bgcolor="#f9f9f9">充提盈亏</th>
            <th bgcolor="#f9f9f9">投注盈亏</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c">
            <td><?php echo ($yingkuis["zidchongzhiall"]); ?></td>
            <td><?php echo ($yingkuis["sdjiachongzhiall"]); ?></td>
            <td><?php echo ($yingkuis["sdjianchongzhiall"]); ?></td>
            <td><?php echo ($yingkuis['zidchongzhiall'] + $yingkuis['sdjiachongzhiall'] -$yingkuis['sdjianchongzhiall']); ?></td>
            <td><?php echo ($yingkuis["tikuanall"]); ?></td>
            <td><?php echo ($yingkuis["touzhuall"]); ?></td>
            <td><?php echo ($yingkuis["zhongjiangall"]); ?></td>
            <td><?php echo ($yingkuis["huodongall"]); ?></td>
            <td><?php echo ($yingkuis["ctyingkui"]); ?></td>
            <td><?php echo ($yingkuis['tzyingkui']); ?></td>
        </tr>
        </tbody>
    </table>


    <div class="tabBar cl mt-20"><span>用户统计</span><small>&nbsp;&nbsp;&nbsp;&nbsp;此处为总计，不受查询时间影响（排除内部会员）</small></div>

    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th bgcolor="#f9f9f9">用户总数</th>
            <th bgcolor="#f9f9f9">代理人数</th>
            <th bgcolor="#f9f9f9">会员人数</th>
            <th bgcolor="#f9f9f9">当前在线</th>
            <th bgcolor="#f9f9f9">账户可用</th>
        </tr>
        </thead>
        <tbody>
        <tr class="text-c">
            <td><?php echo ($usertongji["usercountall"]); ?></td>
            <td><?php echo ($usertongji["userdailiall"]); ?></td>
            <td><?php echo ($usertongji["userputongall"]); ?></td>
            <td><?php echo ($usertongji["useronlineall"]); ?></td>
            <td><?php echo ($usertongji["userbalanceall"]); ?></td>
        </tr>
        </tbody>
    </table>


    <!-- <div class="tabBar cl mt-20" style="margin:0 auto;"><span>彩票统计</span><small>&nbsp;&nbsp;&nbsp;&nbsp;已排除内部会员、未开奖和已撤单数据</small></div>-->
    <div class="tabBar cl mt-20"><span><a href="?">全部</a></span><span><a href="?typeid=k3">快三</a></span><span><a
                href="?typeid=ssc">时时彩</a></span><span><a href="?typeid=x5">11选5</a></span><span><a href="?typeid=keno">快乐彩</a></span><span><a
                href="?typeid=PK10">PK10</a></span><span><a href="?typeid=dpc">低频彩</a></span></div>

    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th bgcolor="#f9f9f9">彩票名称</th>
            <th bgcolor="#f9f9f9">投注金额</th>
            <th bgcolor="#f9f9f9">中奖金额</th>
            <th bgcolor="#f9f9f9">下注盈亏</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($cplist)): $i = 0; $__LIST__ = $cplist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="text-c">
            <td><?php echo ($vo["title"]); ?></td>
            <td><?php echo ($vo['touzhuall']?$vo['touzhuall']:0); ?></td>
            <td><?php echo ($vo['zhongjiangall']?$vo['zhongjiangall']:0); ?></td>
            <td><?php echo ($vo['touzhuall'] - $vo['zhongjiangall']); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr class="text-c">
            <td>总计</td>
            <td><?php echo ($cpxiaoji['touzhuall']?$cpxiaoji['touzhuall']:0); ?></td>
            <td><?php echo ($cpxiaoji['zhongjiangall']?$cpxiaoji['zhongjiangall']:0); ?></td>
            <td><?php echo ($cpxiaoji['touzhuall'] - $cpxiaoji['zhongjiangall']); ?></td>
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

</body>
</html>