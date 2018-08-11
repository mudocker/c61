const dealDetail = resolve => require(['../views/dealDetail'], resolve);
const recharge = resolve => require(['../views/recharge'], resolve);
const setPayPwd = resolve => require(['../views/setPayPwd'], resolve);


var routes =[
  {
  path: "/dealDetail",
  name: "收支明细",
  meta: {
    title: "收支明细",
    back:-1,
    user: true
  },
  component: dealDetail
  },
  {
    path: "/recharge",
    name: "余额充值",
    meta: {
      title: "余额充值",
      back:-1,
      user: true
    },
    component: recharge
  },
  {
    path: "/setPayPwd",
    name: "设置支付密码",
    meta: {
      title: "设置支付密码",
      back:-1,
      user: true
    },
    component: setPayPwd
  },
]













module.exports = routes
