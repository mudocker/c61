<template>
         <form  class="form_class" >
             <el-row><einput :result.sync="params.name" title="用户"   :span="20" /></el-row><br>
             <el-row><einput :result.sync="params.pass" title="密码" type="medium"  :span="20" /></el-row><br>
             <el-row>
                 <ebutton @click="alert(1)" title="忘记密码"  :span="7" :offset="4"/>
                 <ebutton @click="login" title="登录" :span="5" :offset="4"/>
             </el-row>
        </form>

</template>
<script>


    import api from '@/components/js/plugins/api';
    export default {
        data () {
            return {
                params:{
                    name:'test',
                    pass:'test',
                }
            }
        },
        methods:{
            login(){

                  this.post(api.user.login,this.params,function (res) {
                    Vue.router.push( Vue.config.apiUrl)
                  },function (res) {
                    debugger
                    console.log(res);
                  });
            },
        }
    }
</script>

<style scoped>
    @import './css/common.css';
    @import './css/login.css';
    .form_class{
        margin-left: 235px;
    }
</style>
