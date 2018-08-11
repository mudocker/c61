import haha from './haha'
import ztzt from './ztzt'
import money from './money'
import group from './group'
// const index = () => import('@/views/index');
const index = resolve => require(['../views/index'], resolve);
const notfound = resolve => require(['../views/notfound'], resolve);
const maintain = resolve => require(['../views/maintain'], resolve);
const userCenter = resolve => require(['../views/userCenter'], resolve);
const friends = resolve => require(['../views/friends'], resolve);
const message = resolve => require(['../views/message'], resolve);
const systemMsg = resolve => require(['../views/systemMsg'],resolve);
var publicRoute = [
  {
    path: '*',
    redirect: '/notfound'
  }
]

var routes = [
  {
    path: '/index',
    name: '我的社群',
    meta:{
      title:'大牌驾到',
      nav:true,
      link:false,
      user:true,
      agent:false,
      keepAlive:1,
      more:1
      // {
      // createGroup:{
      //   url:"/createGroup",
      //   tit:"创建社群",
      //   icon:"/static/创建社群图标@2x.png"
      // },
      // findFriend:{
      //   url:"/searchFriends",
      //   tit:"添加好友",
      //   icon:"/static/添加好友图标_03.png"
      // },
      // findGroup:{
      //   url:"/findGroup",
      //   tit:"发现社群",
      //   icon:"/static/find.png"
      // }
      // }
    },
    component: index
  },

  {
    path: "/userCenter",
    name: "个人中心",
    meta: {
      nav:true,
      title: "个人中心",
      user: true,
      keepAlive:1,
    },
    component: userCenter
  },
  {
    path: '/',
    redirect: '/index',
  },
  {
    path: "/maintain",
    name: "系统维护",
    meta: {
      title: "系统维护"
    },
    component: maintain
  },
  {
    path: '/notfound',
    name: '404',
    meta:{
      hide:1
    },
    component: notfound
  },
  {
    path: "/message",
    name: "聊天",
    meta: {
      nav:true,
      title: "聊天",
      user: true,
    },
    component: message,
  },
  {
    path:"/friends",
    name:"好友",
    meta:{
      title:"好友",
      nav:true,
      user:true,
    },
    component: friends
  },
  {
    path:'/systemMsg',
    name:'系统消息',
    meta:{
      title:'系统消息'
    },
    component:systemMsg
  }
]

routes = routes.concat(ztzt).concat(haha).concat(publicRoute).concat(money).concat(group)


module.exports = routes
