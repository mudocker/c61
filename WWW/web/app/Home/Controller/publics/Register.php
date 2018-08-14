<?php
namespace xl\app\Home\Controller\publics;


use Home\Controller\CommonController;

class Register extends CommonController
{
    private static $result;

    static  function hasLoginAbort(){
    if($_SESSION['userinfo']){
    //    static::error('你已经登录,请先退出再注册',U('Index/index'));
    exit();
    }
    }
                                                                                                                        //推荐码
    static function referralCode(){
    $post = I('post.');
    if(isset($post['reccode']) && is_numeric($post['reccode'])){
       $apiparam=array();
       $apiparam['where'] = ['uid'=>$post['reccode']];
       $_api = new \Lib\api;
       $result = $_api->sendHttpClient('Api/Member/getuserinfo',$apiparam);
       if($result['sign']==false){
           unset($result['data']);
           $result['sign']    = false;
           $result['message'] = '推荐码验证失败';
           cookie('tgid',NULL);
           static::ajax($result);
       }
       if($result['sign']==false){
           unset($result['data']);
           $result['sign']    = false;
           $result['message'] = '推荐码验证失败';
           cookie('tgid',NULL);
           static::ajax($result);
       }
       if($result['data']['proxy']!=1){
           unset($result['data']);
           $result['sign']    = false;
           $result['message'] = '推荐码无效';
           cookie('tgid',NULL);
           static::ajax($result);
       }
    }
    }

    static function pwd(){
    $post = I('post.');
    if(!$post['password'] || !preg_match("/^[\w\W]{4,16}$/",$post['password'])){
       $result = [];
       $result['sign']    = false;
       $result['message'] = '请输入4-16位的密码';
       static::ajax($result);
    }

       if(!$post['cpassword'] && !preg_match("/^[\w\W]{6,16}$/",$post['cpassword'])){
           $result = [];
           $result['sign']    = false;
           $result['message'] = '请输入6-16位的重复密码';
           static::ajax($result);exit;
       }
       if($post['cpassword']!=$post['password']){
           $result = [];
           $result['sign']    = false;
           $result['message'] = '两次密码输入不一致';
           static::ajax($result);
       }
    }

    static function payPwd(){

       $post['tradepassword']=trim($_POST['tradepassword']);
       if(!$post['tradepassword'] || !preg_match("/^[\w\W]{4,16}$/",$post['tradepassword'])){
           $result = [];
           $result['sign']    = false;
           $result['message'] = '请输4-16位交易密码';
           static::ajax($result);
       }

    }

    static function QQTEL(){
        $post = I('post.');
        if(isset($post['qq'])){
            if(!preg_match("/^[1-9][0-9]{4,9}$/",$post['qq'])){
                $result = [];
                $result['sign']    = false;
                $result['message'] = '请输5-10位的QQ号码';
                static::ajax($result);
            }
        }
        if(isset($post['tel'])){
            if(!preg_match("/^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/",$post['tel'])){
                $result = [];
                $result['sign']    = false;
                $result['message'] = '请输入正确的手机号码!';
                static::ajax($result);
            }
        }
    }

    static function usernameAbort(){
        $post = I('post.');
            $_paten = "/\/|\~|\!|\@|\#|\\$|\%|\^|\&|\*|\(|\)|\_|\+|\{|\}|\:|\<|\>|\?|\[|\]|\,|\.|\/|\;|\'|\`|\-|\=|\\\|\|/";
            if(!$post['username'] || preg_match($_paten,$post['username']) || mb_strlen($post['username'],'utf-8')<2 || mb_strlen($post['username'],'utf-8')>12){
                $result = [];
                $result['sign']    = false;
                $result['message'] = '用户名为2-12位';
                static::ajax($result);exit;
            }
            $apiparam=[];
            $result=[];
            $apiparam['username'] = $post['username'];
            $_api = new \Lib\api;
            $result = $_api->sendHttpClient('Api/Member/checkuername',$apiparam);
            if(!$result || $result['sign']==false){
                $result = [];
                $result['sign']    = false;
                $result['message'] = $result['message']?$result['message']:'注册用户名验证失败';
                static::ajax($result);
            }
            if($result['data']['ishas']==1){
                $result = [];
                $result['sign']    = false;
                $result['message'] = '用户名已被注册';
                static::ajax($result);
            }

    }

    static function verifyAbort(){
        $post = I('post.');
        $verify = new \Think\Verify(['reset' => false]);
        !$verify->check($post['code']) and  static::ajax(["sign"=>false,"message"=>"验证码错误"]);
    }

    static function httpSaveModel($linkinfo){
        $post = I('post.');
            $data = [];
            $ip = get_client_ip();
            $data['username'] = $post['username'];
            $data['parentid'] = $post['reccode'];
            $data['password'] = $post['password'];
            $data['tradepassword'] = $post['tradepassword'];
            $data['face'] = "/resources/images/face/".rand(1,25).".jpg";
            $data['qq'] = $post['qq'];
            $data['phone'] = $data['tel'] = $post['tel']?$post['tel']:'';
            $data['proxy'] = (isset($post['proxy']) && in_array($post['proxy'],[1,0]))?intval($post['proxy']):0;
            $data['isnb'] = 0;
            $data['regip'] = $ip;
            $data['source'] = 'PC版注册';
            $data['loginsource'] = 'PC';
            if($linkinfo && $_POST['linkid']){
                $data['source'] = '推广链接注册';
                $data['linkid'] = $_POST['linkid'];
            }
            $data['regtime'] = time();
            $apiparam=array();
            $apiparam['data'] = $data;
            $_api = new \Lib\api;
            $result = $_api->sendHttpClient('Api/Member/register',$apiparam);
            if(is_array($result) && $result['sign']==true && $result['data']['regisok']==1){
                $return['sign']    = true;
                $return['message'] = '注册成功';
                //保存登陆信息
                if($result['auth']['member_auth_id'] && $result['auth']['member_sessionid']){
                    session('member_sessionid',$result['auth']['member_sessionid']);
                    session('member_auth_id',$result['auth']['member_auth_id']);
                    $return['islogin'] = '1';
                }
               static::ajax($result);
            }else{
                $result['message'] = $result['message']?$result['message']:'注册失败';
               static::ajax($result);
            }


    }
}