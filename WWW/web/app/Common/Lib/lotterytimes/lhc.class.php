<?php
namespace Lib\lotterytimes;
class lhc {
	function drawtimes(){
		$name = 'lhc';
		$cjnowtime = cjnowtime($name);
		$nowtime = time() + $cjnowtime;
		$total  = 120;
		if(S('draws')){
			$draws = S('draws');
		}else{
			$draws['2017115']=array('start'=>"2017-09-28:21:30:00","end"=>"2017-09-30:21:30:00");
			for($i=10;$i<=12;$i++){
				$url="http://1680660.com/smallSix/queryLotteryDate.do?ym=2017-".$i;//获取当月开奖时间
				$co= _curl($url);
				$RES = json_decode($co,true);
				$arr = $RES['result']['data']['kjDate'];
				foreach($arr as $k=>$v){
					$v[0]<10?$d='0'.$v[0] : $d=$v[0];
					if($v[1]!=0){
						$result["2017".$i.$d] = $v;
						$ymd = "2017-$i-$d";
						$starttime = end($draws)['end'];
						$endtime = date("$ymd 21:30:00");
						$draws[] = array('start'=>$starttime,"end"=>$endtime);
					}
				}
			}
			for($i=1;$i<=6;$i++){
				$i<10?$m='0'.$i:$m=$i;
				$url="http://1680660.com/smallSix/queryLotteryDate.do?ym=2018-".$m;//获取当月开奖时间
				$co= _curl($url);
				$RES = json_decode($co,true);
				$arr = $RES['result']['data']['kjDate'];
				foreach($arr as $k=>$v){
					$v[0]<10?$d='0'.$v[0] : $d=$v[0];
					if($v[1]!=0){
						$result["2018".$m.$d] = $v;
						$ymd = "2018-$m-$d";
						$starttime = end($draws)['end'];
						$endtime = date("$ymd 21:30:00");
						if("2018".$m.$d=="20180102"){
							$draws[2018001] = array('start'=>$starttime,"end"=>$endtime);
						}else{
							$draws[] = array('start'=>$starttime,"end"=>$endtime);
						}
					}
				}
			}
			S("draws",$draws,strtotime("2018-06-30 21:30:00")-time());
		}
		foreach($draws as $k=>$v){
			if($nowtime>strtotime($v['start']) && $nowtime<=strtotime($v['end'])){ //如果当前时间大于开始时间并且小于结束时间
				$nowqihao = $k;  //当前期号
			}
		}
		if(!$nowqihao){  //如果当前期号不存在
			$nowqihao = str_pad(1,3,0,STR_PAD_LEFT);
			$draws[1]['start']   = date('Y-m-d H:i:s',strtotime($draws[$total]['end']));
			$draws[1]['end']   = date('Y-m-d H:i:s',strtotime($draws[1]['end'])+86400);
			$nowdraws = [
				'expect'  => date('Ymd',strtotime($draws[1]['end'])).$nowqihao,
				'start'   => $draws[1]['start'],
				'end'     => $draws[1]['end']
			];
			$preqihao = str_pad($total,3,0,STR_PAD_LEFT);
			$predraws = [
				'expect' => date('Ymd',strtotime($draws[1]['start'])).$preqihao,
				'start'  => date('Y-m-d H:i:s',strtotime($draws[$total]['start'])),
				'end'    => date('Y-m-d H:i:s',strtotime($draws[$total]['end'])),
			];
		}else{   //如果当前期号存在
			$nowdraws = [
				'expect'  => $nowqihao,                //当前期号
				'start'  => $draws[$nowqihao]['start'],//当期开始时间
				'end'    => $draws[$nowqihao]['end'],  //当期结束时间
			];
			$preqihao = $nowqihao-1;
			$predraws = [
				'expect' => $preqihao,
				'start'  => $draws[$nowqihao]['start'],
				'end'    => $draws[$nowqihao]['end'],
			];
		}
		$return = [
			'lastFullExpect'  => $predraws['expect'],
			'lastExpect'      => substr($predraws['expect'],-3),
			'currFullExpect'  => $nowdraws['expect'],
			'currExpect'      => substr($nowdraws['expect'],-3),
			'remainTime'      => strtotime($nowdraws['end'])-time()-$cjnowtime,
			'openRemainTime'  => $cjnowtime,
		];
		return $return;
	}
}
?>