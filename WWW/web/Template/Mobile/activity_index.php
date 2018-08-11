<include file="Public/header" />
<link rel="stylesheet" href="__CSS__/activity.css">
<body>
	<header data-am-widget="header"class="am-header am-header-default header nav_bg am-header-fixed">
		<h1 class="am-header-title activity_h1">
			活动中心
		</h1>
	</header>
	
	<div class="activity_list">
		<a href="{:U('Activity/promotion')}" class="am-cf am-block">
			<div class="activity_list1 am-fl">
				<em>1</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>晋级奖励</p>
				<em>会员每晋升一个等级，都能获得奖励，最高可达38888元。</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>

	<div class="activity_list">
		<a href="{:U('Activity/everydayPlus')}" class="am-cf am-block">
			<div class="activity_list1 am-fl bg_green">
				<em class="bg_green">2</em>
			</div>
			<div class="activity_list2 am-fl">
				<p>每日加奖</p>
				<em>每日加奖是根据会员昨日投注金额进行加奖，奖金无上限。</em>
			</div>
			<div class="activity_list3 am-fr">
				<i class="iconfont icon-arrowright"></i>
			</div>
		</a>
	</div>





	<include file="Public/footer" />
</body>
</html>