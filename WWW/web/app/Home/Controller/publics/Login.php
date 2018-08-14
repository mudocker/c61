<?php
namespace xl\app\Home\Controller\publics;

use Home\Controller\CommonController;
use xl\app\Common\Lib\TaobaoIP;


class Login extends CommonController
{
    private static $result,$member;
                                                                                                                             //登录信息不完整
  static  function paramAbort(){
     !IS_POST and json_return(["sign"=>false,"message"=>"非法操作"]);
      $param = I('post.');
      (!$param['name'] || !$param['pass'] ) and json_return(["sign"=>false,"message"=>"登录信息不完整"]);
    }
                                                                                                                               //规范用户名,密码
    static function usernamePwdAbort(){
             $param = I('post.');
            if(!$param['name'] || strlen($param['name'])<3){  //如果用户名不存在 或 少于3位则返回错误
                $return = [];
                $return['sign']    = false;
                $return['message'] = '请输入正确用户名!';
                json_return($return);
            }
            if(!$param['pass'] && !preg_match("/^[\w\W]{4,16}$/",$param['pass'])){ //验证密码
                $return = [];
                $return['sign']    = false;
                $return['message'] = '密码需为4-16位';
                json_return($return);
            }
    }
                                                                                                                              //httpclient登录与结果
    static function httpLogin(){
            $post = I('post.');
            $data = [];
            $data['username'] = $post['name'];
            $data['nocode']   = $post['nocode'];
            $data['password'] = $post['pass'];
            $data['loginip']  = get_client_ip();
            $data['source']   = 'pc';
            static::$member= M('Member')->field('id,loginip,logintime')->cache(300)->where("username='{$post['name']}'")->find();
            $params['data'] = $data;
            $api = new \Lib\api;
            static::$result  = $api->sendHttpClient('Api/Member/signin',$params);

    }

    static function ret(){
        $result=&static::$result;
        if(is_array($result) && $result['sign']==true){
            $return['sign']    = 200;
            $return['message'] = '登陆成功';
            if($result['auth']['member_auth_id'] && $result['auth']['member_sessionid']){                             //保存登陆信息
                session('member_sessionid',$result['auth']['member_sessionid']);
                session('member_auth_id',$result['auth']['member_auth_id']);
                $lastlogin['lastip'] =  static::$member['loginip'] ;
                $lastlogin['lasttime'] = date("Y-m-d H:i:s", static::$member['logintime']) ;
                $lastlogin['login_address'] =TaobaoIP::getAddress($lastlogin['lastip']);
                session('lastlogin',$lastlogin);
                $return['data']['islogin'] = '1';
            }
            static::ajax($return);
        }else{
            $result['sign']    = false;
            $result['message'] = $result['message']?$result['message']:'登陆失败';
            self::ajax($result);
        }

    }

}