<?php
namespace xl\app\Home\Controller\publics;

use Home\Controller\CommonController;


class ForgetPwd extends CommonController
{
    private static $result=false;

    static  function member(){
        $username =cookie('GetUserName');
        static::$result= M('member')->where(['username'=>$username])->find();
        !static::$result and  redirect(url('Public/forgetPaw'));
        return static::$result;
    }

    static  function pwd(){
        $pa     = I('pa');
        $pa1    = I('pa1');
        if(strlen($pa)<6){
            echo'<script>alert("密码至少设置6位字符！");window.location.href="'.url('Public/forgetPaw2').'";</script>';
            exit;
        }
        if($pa!=$pa1){
            echo'<script>alert("两次密码输入不一致！");window.location.href="'.url('Public/forgetPaw2').'";</script>';
            exit;
        }
    }

    static  function updatePwd(){
        $newpas = sys_md5(I('pa'),static::$result['key']);
        static::$result = M('member')->where(['id'=>static::$result['id']])->setField(['password'=>$newpas]);
        return static::$result;
    }


    static function ret(){
        if(static::$result){
            cookie('setPawIsOk',1);
            setcookie('nottel',null);
            redirect(url('Public/forgetPaw3'));
            exit;
        }else{
            echo'<script>alert("密码重置失败！");window.location.href="'.url('Public/forgetPaw2').'";</script>';
            exit;
        }
    }
}