const groupInfo = resolve => require(['../views/groupInfo'], resolve);
const groupMember = resolve => require(['../views/groupMember'], resolve);
const groupRecord = resolve => require(['../views/groupRecord'], resolve);
const groupMessage = resolve => require(['../views/groupMessage'], resolve);
const groupInvite = resolve => require(['../views/groupInvite'], resolve);
const publishTopic = resolve => require(['../views/publishTopic'], resolve);
const publishActivity = resolve => require(['../views/publishActivity'], resolve);
const enrollActivity = resolve => require(['../views/enrollActivity'], resolve);
const referTask = resolve => require(['../views/referTask'], resolve);
const activityMember = resolve => require(['../views/activityMember'], resolve);
const activityMemberView = resolve => require(['../views/activityMemberView'], resolve);
const joinGroup = resolve => require(['../views/joinGroup'], resolve);
const groupManage = resolve => require(['../views/groupManage'], resolve);
const createGroup = resolve => require(['../views/createGroup'], resolve);
const groupData = resolve => require(['../views/groupData'], resolve);
const joinWay = resolve => require(['../views/joinWay'], resolve);
const groupCard = resolve => require(['../views/groupCard'], resolve);
const setManager = resolve => require(['../views/setManager'], resolve);
const joinActivity = resolve =>require(['../views/joinActivity'],resolve);
const inviteList = resolve => require(['../views/inviteList'], resolve);
var routes = [
  {
    path: "/createGroup",
    name: "创建社群",
    meta: {
      title: "创建社群",
      back:-1,
      user: true,
    },
    component: createGroup
  },
  {
    path: "/groupInfo/:gid",
    name: "群资料",
    meta: {
      title: "群资料",
      link:'/index',
      user: true,
      back: -1,
      bg:true,
      group:1
    },
    component: groupInfo
  },
  {
    path: "/joinGroup/:gid",
    name: "加入社群",
    meta: {
      title: "加入社群",
      back:-1,
      user: true
    },
    component: joinGroup
  },
  {
    path: "/groupMember/:gid",
    name: "成员管理",
    meta: {
      title: "成员管理",
      back:-1,
      user: true,
    },
    component: groupMember
  },
  {
    path: "/setManager/:gid",
    name: "设置管理员",
    meta: {
      title: "设置管理员",
      back:-1,
      user: true,
      backRefresh: true
    },
    component: setManager
  },
  {
    path: "/groupManage/:gid",
    name: "社群管理",
    meta: {
      title: "社群管理",
      back:-1,
      user: true
    },
    component: groupManage
  },
  {
    path: "/groupRecord",
    name: "聊天记录",
    meta: {
      title: "聊天记录",
      back:-1,
      user: true
    },
    component: groupRecord
  },
  {
    path: "/groupMessage/:gid",
    name: "群通知",
    meta: {
      title: "群通知",
      back:-1,
      user: true
    },
    component: groupMessage
  },
  {
    path: "/groupInvite/:gid",
    name: "群邀请卡",
    meta: {
      title: "群邀请卡",
      back:-1
    },
    component: groupInvite
  },
  {
    path: "/publishTopic/:gid",
    name: "发布话题",
    meta: {
      title: "发布话题",
      back:-1,
      user: true
    },
    component: publishTopic
  },
  {
    path: "/editTopic/:id",
    name: "编辑讨论",
    meta: {
      title: "编辑讨论",
      back:-1,
      user: true
    },
    component: publishTopic
  },
  {
    path: "/publishActivity/:gid",
    name: "发布活动",
    meta: {
      title: "发布活动",
      back:-1,
      user: true
    },
    component: publishActivity
  },
  {
    path: "/editActivity/:id",
    name: "编辑活动",
    meta: {
      title: "编辑活动",
      back:-1,
      user: true
    },
    component: publishActivity
  },
  {
    path: "/enrollActivity/:aid",
    name: "活动报名",
    meta: {
      title: "活动报名",
      back:-1,
      user: true
    },
    component: enrollActivity
  },
  {
    path: "/referTask",
    name: "完成任务",
    meta: {
      title: "完成任务",
      back:-1,
      user: true
    },
    component: referTask
  },
  {
    path: "/activityMember/:id",
    name: "成员列表",
    meta: {
      title: "成员列表",
      back:-1,
      user: true
    },
    component: activityMember
  },
  {
    path: "/activityMemberView",
    name: "成员详情",
    meta: {
      title: "成员详情",
      back:-1,
      user: true
    },
    component: activityMemberView
  },
  {
    path: "/groupData/:gid",
    name: "群数据",
    meta: {
      title: "群数据",
      back:-1,
      user: true,
    },
    component: groupData
  },
  {
    path: "/joinWay/:gid",
    name: "基本设置",
    meta: {
      title: "基本设置",
      back:-1,
      user: true,
    },
    component: joinWay
  },
  {
    path: "/groupCard/:gid",
    name: "群名片",
    meta:{
      title: "群名片",
      back:-1,
      user: true
    },
    component: groupCard
  },
  {
    path:'/joinActivity/:aid',
    name:'活动详情',
    meta:{
      title:'活动详情',
      name:'活动详情',
      back:-1,
      user:true
    },
    component: joinActivity
  },
  {
    path: "/inviteList",
    name: "我的邀请码",
    meta:{
      title: "我的邀请码",
      back:-1,
      user: true
    },
    component: inviteList
  }
]

module.exports = routes
