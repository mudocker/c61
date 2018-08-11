import Vue from 'vue'
import Router from 'vue-router'
import routes from './routes'
// in development env not use Lazy Loading,because Lazy Loading too many pages will cause webpack hot update too slow.so only in production use Lazy Loading

Vue.use(Router);

export default new Router({
  routes,
  mode:'history',
  linkActiveClass:"on",
  scrollBehavior (to, from, savedPosition) {
      return savedPosition ? savedPosition:{ x: 0, y: 0 };

  }
  // exact: true
});
