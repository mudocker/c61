<?php
namespace Kaijiang\Controller;
use Think\Controller;
class KjController extends Controller {
	public function _initialize(){
		header("Content-type: text/html; charset=utf-8");
// 		if(!IS_CLI)exit('IS NOT CMD_CLI,ERROR...');
	}
	function _t($str='',$num=20,$pad =' '){
		$str = iconv('UTF-8','gbk',$str);
		return str_pad($str,$num,$pad);
	}
	function _title($title='启动结算任务'){
		echo "\n";
		echo $this->_t(str_pad('-',5,'-').$title,22,'-');
		echo "\n";
	}
	function check($totalzxnum=0,$runcount=0){
		$playidArr = ['tmlmda','tmlmxiao','tmlmdan','tmlmshuang','tmlmdadan','tmlmdashuang','tmlmxiaodan','tmlmxiaoshuang','tmlmheda','tmlmhexiao','tmlmhedan','tmlmheshuang','tmlmweida','tmlmweixiao','tmlmjiaqin','tmlmyeshou','tmlmhongbo','tmlmlvbo','tmlmlanbo',
			'zm1lmda','zm1lmxiao','zm1lmdan','zm1lmshuang','zm1lmdadan','zm1lmdashuang','zm1lmxiaodan','zm1lmxiaoshuang','zm1lmheda','zm1lmhexiao','zm1lmhedan','zm1lmheshuang','zm1lmweida', 'zm1lmweixiao','zm1lmjiaqin','zm1lmyeshou','zm1lmhongbo','zm1lmlvbo','zm1lmlanbo',
			'zm2lmda','zm2lmxiao','zm2lmdan','zm2lmshuang','zm2lmdadan','zm2lmdashuang','zm2lmxiaodan','zm2lmxiaoshuang','zm2lmheda','zm2lmhexiao','zm2lmhedan','zm2lmheshuang','zm2lmweida','zm2lmweixiao','zm2lmjiaqin','zm2lmyeshou','zm2lmhongbo','zm2lmlvbo','zm2lmlanbo',
			'zm3lmda','zm3lmxiao','zm3lmdan','zm3lmshuang','zm3lmdadan','zm3lmdashuang','zm3lmxiaodan','zm3lmxiaoshuang','zm3lmheda','zm3lmhexiao','zm3lmhedan','zm3lmheshuang','zm3lmweida','zm3lmweixiao','zm3lmjiaqin','zm3lmyeshou','zm3lmhongbo','zm3lmlvbo','zm3lmlanbo',
			'zm4lmda','zm4lmxiao','zm4lmdan','zm4lmshuang','zm4lmdadan','zm4lmdashuang','zm4lmxiaodan','zm4lmxiaoshuang','zm4lmheda','zm4lmhexiao','zm4lmhedan','zm4lmheshuang','zm4lmweida','zm4lmweixiao','zm4lmjiaqin','zm4lmyeshou','zm4lmhongbo','zm4lmlvbo','zm4lmlanbo',
			'zm5lmda','zm5lmxiao','zm5lmdan','zm5lmshuang','zm5lmdadan','zm5lmdashuang','zm5lmxiaodan','zm5lmxiaoshuang','zm5lmheda','zm5lmhexiao','zm5lmhedan','zm5lmheshuang','zm5lmweida','zm5lmweixiao','zm5lmjiaqin','zm5lmyeshou','zm5lmhongbo','zm5lmlvbo','zm5lmlanbo',
			'zm6lmda','zm6lmxiao','zm6lmdan','zm6lmshuang','zm6lmdadan','zm6lmdashuang','zm6lmxiaodan','zm6lmxiaoshuang','zm6lmheda','zm6lmhexiao','zm6lmhedan','zm6lmheshuang','zm6lmweida','zm6lmweixiao','zm6lmjiaqin','zm6lmyeshou','zm6lmhongbo','zm6lmlvbo','zm6lmlanbo',
		];
	    if($runcount==0){
			$this->_title();
		}
		$memberdb    = D('member');
		$fuddetaildb = D('fuddetail');
		$touzhudb    = D('touzhu');
		$DB_PREFIX = C('DB_PREFIX');
		$sql = "select a.*,b.name,b.expect,b.opencode from {$DB_PREFIX}touzhu as a left join {$DB_PREFIX}kaijiang as b on a.cpname = b.name and a.expect = b.expect where a.isdraw = 0 and b.opencode!='' order by a.id desc limit 10";
		$touzhulist = M()->query($sql);

		$_ZJARRAY = [];
		foreach($touzhulist as $k=>$item){
			$_kjfile = $dir = COMMON_PATH. "Lib/kaijiang/{$item['typeid']}.class.php";
			if($_kjfile){
				$class = "\\Lib\\kaijiang\\{$item[typeid]}";
				$_obj  = new $class();
				$playid= $item['playid'];
				$item['iszjokcount'] = 0;
				if(in_array($playid,$playidArr) && $item['typeid']=='lhc'){
					if(strstr($playid,'tmlm')){
						$playsonid = substr($playid,2,(strlen($playid)-2));
						$key = 6;
					}else{
						$playsonid = substr($playid,3,(strlen($playid)-2));
						$key = substr($playid,2,1)-1;
					}
					$opencodes = explode(',',$item['opencode']);
					$item['iszjokcount'] = $_obj->$playsonid($opencodes[$key],$item['tzcode'],$playsonid);
				}else{
					if(method_exists($_obj,$playid)){//如果类方法存在
						$item['iszjokcount'] = $_obj->$playid($item['opencode'],$item['tzcode']);
					}
				}
			}
			//处理中奖信息
			$memint = $touzhuint = $fudint = 0;
			$iskj = $touzhudb->where(['id'=>$item['id']])->getField('isdraw');
			if($iskj!=0){
				continue;
			}
            $item['iszjcount'] = $item['iszjokcount'];
			if($item['iszjcount']>=1){//中
				$_typeid0 = $item['typeid'];
				if(strstr($item["mode"],'|')){
					$num = count(explode('|',$item['mode']));
					for($i=0;$i<$num;$i++){
						if($item["iszjcount"][$i]>0){
							$item['zjcount'] += $item["iszjcount"][$i];
						}
					}
				}else{
					$item['zjcount']=$item['iszjokcount'];
				}
				$okamount = self::$_typeid0($item);
				$userinfo = [];
				$userbalance = $memberdb->where(['id'=>$item['uid']])->getField('balance');
				//事务开始
				$memberdb->startTrans();
				$memint = $memberdb->where(['id'=>$item['uid']])->setInc('balance',$okamount);//账户增加金额
				//修改投注为中奖状态
				$touzhuint = $touzhudb->where(['id'=>$item['id']])->setField(['isdraw'=>1,'okcount'=>$item['zjcount'],'okamount'=>$okamount,'opencode'=>$item['opencode']]);

				//账变记录
				$fdata = [];
				$fdata['trano'] = $item['trano'];
				$fdata['uid'] = $item['uid'];
				$fdata['username'] = $item['username'];
				$fdata['type'] = 'reward';
				$fdata['typename'] = '返奖';
				$fdata['amount'] = $okamount;
				$fdata['amountbefor'] = $userbalance;
				$fdata['amountafter'] = $userbalance + $okamount;
				$fdata['oddtime'] = time();
				$fdata['remark'] = $item['cptitle'] .'第'. $item['expect'] . '期-' . $item['playtitle'];
				$fudint = $fuddetaildb->data($fdata)->add();

				if($memint && $touzhuint && $fudint){
					$memberdb->commit();//提交事物
					$_ZJARRAY[] = $item['username'] . "-" .$item['cptitle'] .'第'. $item['expect'] . '期-' . "中奖金额：".$okamount;
				}else{
					$memberdb->rollback();//事物回滚
				}

			}else if($item['iszjcount']<1){//未中
				$okamount = -$item['amount'];
				$touzhuint = $touzhudb->where(['id'=>$item['id']])->setField(['isdraw'=>-1,'okcount'=>0,'okamount'=>0,'opencode'=>$item['opencode']]);
				$_ZJARRAY[] = $item['username'] . "-" .$item['cptitle'] .'第'. $item['expect'] . '期-' . "未中奖,输：".$okamount;
			}
			$touzhulist[$k] = $item;
		}
		if($_ZJARRAY){
			$return = implode("\n",$_ZJARRAY);
		}else{
			 $return =  "未结算";
		}
		 echo auto_charset($return."\n",'utf-8','gbk');
		 sleep(2);
		$runcount++;
		if($runcount==10){
			$runcount=0;
			echo auto_charset("休眠3s",'utf-8','gbk');
			sleep(3);
		}
		if($totalzxnum<120){
			self::check($totalzxnum+1,$runcount);
		}
	}
	protected function lhc($res){
		$okamount = 0;
		if(strstr($res["mode"],'|')){
			$mode = explode('|',$res["mode"]);
			if($res['iszjokcount'][1]!="") {
				$okamount += $mode[1] * $res['iszjokcount'][1] * $res['beishu'] * $res['yjf'];
			}
			if($res['iszjokcount'][0]!=""){
				$okamount += $mode[0]*$res['iszjokcount'][0]*$res['beishu']*$res['yjf'];
			}
		}else{
			$okamount = ($res['amount']/$res['itemcount'])*$res['mode']*$res['zjcount'];
		}
		return $okamount;
	}
	protected function ssc($res){
		$okamount =$res['mode']*$res['zjcount']*$res['beishu']*$res['yjf'];
		return $okamount;
	}
	protected function k3($res){
		$okamount = ($res['amount']/$res['itemcount'])*$res['mode']*$res['zjcount'];
		return $okamount;
	}
	protected function x5($res){
		$okamount = 0;
		if(strstr($res["mode"],'|')){
			$amount = explode('|',$res["mode"]);
			for($i=0;$i<count($amount);$i++){
				if($res['iszjokcount'][$i]!=0){
					$okamount = $amount[$i]*$res['iszjokcount'][$i]*$res['beishu']*$res['yjf'];
			 }
			}
		}else{
			$okamount =$res['mode']*$res['zjcount']*$res['beishu']*$res['yjf'];
		}
		return $okamount;
	}
	protected function pk10($res){
		$okamount =$res['mode']*$res['zjcount']*$res['beishu']*$res['yjf'];
		return $okamount;
	}
	protected function dpc($res){
		$okamount =$res['mode']*$res['zjcount']*$res['beishu']*$res['yjf'];
		return $okamount;
	}
	protected function keno($res){
		$okamount = 0;
		if(strstr($res["mode"],'|')){
			$mode = explode('|',$res["mode"]);
			for($i=0;$i<count($mode);$i++){
				if($res['iszjokcount'][$i]!=""){
					$okamount += $mode[$i]*$res['iszjokcount'][$i]*$res['beishu']*$res['yjf'];
				}
			}
		}else{
			$okamount =$res['mode']*$res['zjcount']*$res['beishu']*$res['yjf'];
		}
		return $okamount;

	}
	protected function xy28($res){

	}
//删除两天前的开奖
	protected function delete2daykj(){
		$day = date('Y-m-d',time());
		$odaytime = strtotime($day)-86400*2;
		$map = [];
		$map['opentime'] = ['elt',$odaytime];
		M('kaijiang')->where($map)->delete();
	}
	protected function gettrano($rand=4){
		$rand = (intval($rand)>0 and intval($rand)<=6)?intval($rand):4;
		$trano = strtoupper(self::rand_string(3,0)).date('ymdHis').self::rand_string($rand,1);
		return $trano;
	}
	protected function rand_string($len=6,$type=0,$addChars='') {
		$String      = new \Org\Util\String;
		$randString  = $String->randString($len,$type,$addChars);
		return $randString;
	}
}