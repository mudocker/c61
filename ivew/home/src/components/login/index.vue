<template>
    <div>
        <pheader></pheader>
        <div class="login_main">
            <div class="login_bg">
                <div class="login_title"><h2 class="margin_0">用户登录</h2></div>
                <div class="login_input"><iform></iform></div>
            </div>
        </div>
        <pfooter></pfooter>
    </div>
</template>
<script>
    import pheader from '@/components/public/header';
    import pfooter from '@/components/public/footer';
    import iform from './form';
    import api from '@/components/js/plugins/api';
    export default {
        components:{
            pheader,
            pfooter,
            api,
            iform
        }
    }
</script>

<style scoped>
    @import './css/common.css';
    @import './css/login.css';

</style>
