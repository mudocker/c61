const findGroup = resolve => require(['../views/findGroup'], resolve);
const chat = resolve => require(['../views/chat'], resolve);
const personalChat = resolve => require(['../views/personalChat'], resolve);

var routes =[
{
  path: "/findGroup",
  name: "发现社群",
  meta: {
    title: "发现社群",
    back:-1,
      user: true
  },
  component: findGroup
},
{
  path: "/chat/:cid",
  name: "chat",
  meta: {
    title: "群聊",
    back:-1,
    user: false,
    chat: true
  },
  component: chat
},
  {
    path: "/personalChat/:info",
    name: "私聊",
    meta: {
      title: "私聊",
      back:-1,
      user: true,
      chat: true
    },
    component: personalChat
  },
]
module.exports = routes
