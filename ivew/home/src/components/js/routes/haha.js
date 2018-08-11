const personalView = resolve => require(['../views/personalView'], resolve);
const personalInfo = resolve => require(['../views/personalInfo'], resolve);
const setPwd = resolve => require(['../views/setPwd'], resolve);
const about = resolve => require(['../views/about'], resolve);
const login = resolve => require(['../views/login'], resolve);
const register = resolve => require(['../views/register'], resolve);
const forgetPwd = resolve => require(['../views/forgetPwd'], resolve);
const setting = resolve => require(['../views/setting'], resolve);
const collection = resolve => require(['../views/collection'], resolve);
const wallet = resolve => require(['../views/wallet'], resolve);
const tradeDetail = resolve => require(['../views/tradeDetail'], resolve);
const backList = resolve => require(['../views/backList'], resolve);
const newFriends = resolve => require(['../views/newFriends'], resolve);
// const searchFriends = resolve => require(['../views/searchFriends'], resolve);
const addFriends = resolve => require(['../views/addFriends'], resolve);
const personalMore = resolve => require(['../views/personalMore'], resolve);

var routes = [
    {
        path: "/personalInfo",
        name: "个人信息",
        meta: {
            title: "个人信息",
            back:-1,
            user: true,
        },
        component: personalInfo
    },
    {
        path: "/setPwd",
        name: "修改密码",
        meta: {
            title: "修改密码",
            back:-1,
            user: true
        },
        component: setPwd
    },
    {
        path: "/about",
        name: "关于我们",
        meta: {
            title: "关于我们",
            back:-1,
            user: true
        },
        component: about
    },
    {
        path: "/login",
        name: "登录",
        meta: {
            title: "登录",
        },
        component: login
    },
    {
        path: "/register",
        name: "注册",
        meta: {
            title: "注册",
            back:-1,
        },
        component: register
    },
    {
      path: "/forgetPwd",
      name: "忘记密码",
      meta: {
        title: "忘记密码",
        back:-1
      },
      component: forgetPwd
    },
    {
        path: "/setting",
        name: "设置",
        meta: {
            title: "设置",
            back:-1,
            user: true,
        },
        component: setting
    },
    {
        path: "/collection",
        name: "收藏",
        meta: {
            title: "收藏",
            back:-1,
            user: true,
        },
        component: collection
    },
    {
        path: "/personalView/:id",
        name: "个人详情",
        meta: {
            user: true,
            back: -1,
            backRefresh: true
        },
        component: personalView
    },
    {
      path: "/personalMore/:id",
      name: "更多",
      meta: {
        back:-1,
        user: true,
        title:'更多',
        backRefresh: true
      },
      component: personalMore
    },
    {
        path: "/wallet",
        name: "钱包",
        meta: {
            title: "钱包",
            back:-1,
            user: true,
            right: {
              name: '明细',
              url: '/dealDetail'
            }
        },
        component: wallet
    },
    {
      path: "/tradeDetail",
      name: "tradeDetail",
      meta: {
        title: "收支明细",
        back:-1,
        user: true,
      },
      component: tradeDetail
    },
    {
      path: "/backList",
      name: "黑名单列表",
      meta: {
        title: "黑名单列表",
        back:-1,
        user: true
      },
      component: backList
    },
    {
      path: "/newFriends",
      name: "新朋友",
      meta: {
        title: "新朋友",
        user: true,
        back:-1,
        // right: {
        //   name: '添加',
        //   url: '/searchFriends'
        // }
      },
      component: newFriends
    },
    // {
    //   path: "/searchFriends",
    //   name: "添加好友",
    //   meta: {
    //     title: "添加好友",
    //     user: true,
    //     back:-1,
    //   },
    //   component: searchFriends
    // },
    {
      path: "/addFriends/:id",
      name: "添加好友",
      meta: {
        title: "添加好友",
        user: true,
        back: -1
      },
      component: addFriends
    },
]

module.exports = routes
