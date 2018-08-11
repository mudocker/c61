<?php
namespace Mobile\Controller;
use Think\Controller;
class IndexController extends CommonController {
	public function __construct(){
		parent::__construct();
	}
	function index(){
		
		$_t = time();
		$cplist = M('caipiao')->where(array('isopen'=>1))->cache(300)->order('allsort asc')->limit(11)->select();
		$gglist = M('Gonggao')->field('id,title,oddtime')->cache(300)->order("id DESC")->find();
		$this->assign('gglist',$gglist);
		$this->cplist  = $cplist;
		$this->display();
	}

	function lotteryHall()
	{
		$cplist = M('caipiao')->where(array('isopen'=>1))->order('allsort asc')->cache(300)->select();
		$cplist2 = M('caipiao')->where(array('isopen'=>1))->order('listorder asc')->cache(300)->select();
		$this->assign('cplist',$cplist);
		$this->assign('cplist2',$cplist2);
		$this->display();
	}

}
?>