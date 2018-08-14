import Vue from 'vue'
import App from './App'
import router from './router'
import Vuex from 'vuex'

import 'element-ui/lib/theme-chalk/index.css'
import eleme from 'element-ui'
import elemez from '@/components/js/plugins/elemez'
import axiosz from '@/components/js/plugins/axiosz'
Vue.config.productionTip = false;
Vue.config.apiUrl='http://l.cn/start.php/';
Vue.use(Vuex);
Vue.use(eleme);
Vue.use(elemez);
Vue.use(axiosz);

let vm=new Vue({el: '#app', router,
    components:    {App},
    template:      '<App/>'
})
