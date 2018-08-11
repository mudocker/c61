//定义状态树
const state = {
  constant:{
    ImgHost: _ImgPath,
    PhotoPath: '/Images/Common',
    DefPhoto: 'avatar1.jpg',
    PageSize: 15
  },
  color:{
    blue:'#38f',
    red:'#dc3b40'
  },
  tpl:{
    noData:["<div class='fullPageMsg'><div class='fullPageIcon icon'>&#xe63c;</div><p>','</p></div>"],
    load:'<svg class="svgLoad" width="30px" height="30px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-default"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(0 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(30 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.08333333333333333s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(60 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.16666666666666666s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(90 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.25s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(120 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.3333333333333333s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(150 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.4166666666666667s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(180 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.5s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(210 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.5833333333333334s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(240 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.6666666666666666s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(270 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.75s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(300 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.8333333333333334s" repeatCount="indefinite"/></rect><rect  x="46.5" y="40" width="7" height="20" rx="5" ry="5" transform="rotate(330 50 50) translate(0 -30)">  <animate attributeName="opacity" from="1" to="0" dur="1s" begin="0.9166666666666666s" repeatCount="indefinite"/></rect></svg>'
  },
  turning:false,//是否在路由切换中
  _FomatConfig: Object.freeze(_FomatConfig),
  DAY_TIME: 24 * 60 * 60 * 1000,
  HOUR_TIME: 60 * 60 * 1000,
  MINUTE_TIME: 60 * 1000,
  SECOND_TIME: 1000,
  GMT_DIF:new Date().getTimezoneOffset()*60*1000,  //------之前为配置
  roleId: { //身份
    masterId: '11', //群主id
    managerId: '10', //管理id
    memberId: '8'  //成员id
  },
  emojis: [['大笑','撇嘴','闪眼','吐舌','色','呲牙','流泪','愉快','快哭了','无奈','难过','冷汗','调皮','抓狂','不开心','饥饿','酷','微笑'],
          ['媚眼','发怒','呲牙','鬼脸','晕','衰','哈哈','笑哭','眼镜','可爱','闭嘴','飞吻','奋斗','调戏','自信','傲慢','憨笑','鲜花']],
  UserName: null, //返回对应的账号,未登录用户返回空字符串
  UserRole: null, //返回对应的账号,未登录用户返回空字符串
  UserPhoto: null, //返回用户头像的图片地址
  UserNickName: null,
  UserBirthDay: null,
  UserSex: null,
  UserSign: null,
  UserInfo: null,
  UserSetting: {
    Voice: 1
  },
  // "UserMoney": null,
  Friend: null,
  Uid: null,
  Mobile: null,
  newMsg: null,
  newMsgNum: 0,
  chatMsgNum: 0,
  UserChatList: null,
  UserTemMsg: null,
  UserBackList: null,
  PersonalInfo: null,
  login2path: null, //保留登陆前地址
  groupManager: null,
  userParentGroup:null, //群列表
  groupList: [], //群item(话题/活动)列表
  fparent:0, //是否有上级商户
  groupMaster:null,
  clientId: null,
  systemMsgNum:0,
  systemMsg:null,
  groupUser:null, //群成员
  groupInfo:null, //群详情
  activityInfo: null, //活动详情
  personChat: null, //私聊标题
  page: 0  //临时翻页参数
}
export default state;

var _FomatConfig = {
  ImgCode: {
    Name: "验证码",
    Reg: /^[0-9a-zA-Z]{4}$/,
    ErrMsg:"验证码为4位字母数字的组合!",
  },
  SmsCode: {
    Name: "短信验证码",
    Reg: /^\d{4}$/
  },
  MailCode:{
    Name: "邮箱验证码",
    Reg: /^\d{4}$/
  },
  UserName: {
    Name: "账号",
    ErrMsg:"账号应为4-15个字符，可使用字母、数字，禁止以0开头",
    Reg: /^[\w|\d]{4,16}$/
  },
  Password: {
    Name: "密码",
    ErrMsg:"密码应为6-16位字符",
    Reg: /^[\w!@#$%^&*.]{6,16}$/
  },
  Mobile: {
    Name: "手机号",
    ErrMsg:"请输入13|15|18开头的11位手机号码",
    Reg: /^1[3|5|8]\d{9}$/,
  },
  RealName: {
    Name: "姓名",
    Reg: /^[\u4e00-\u9fa5 ]{2,10}$/,
  },
  BankNum: {
    Name: "银行卡号",
    Reg: /^\d{10,19}$/
  },
  Money: {
    Name: "金额",
    Reg: /^\d{1,}(\.\d{1,2})?$/,
    Between: [100, 500000] //100~50w之间
  },
  Mail:{
    Name:"邮箱",
    Reg:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
  }
}
