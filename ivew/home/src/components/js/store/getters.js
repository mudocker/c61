const getters = {
  PhotoPath: state=>state.constant.ImgHost+state.constant.PhotoPath,
  WithdrwHtml: state=>"login",
  NoDataDom: msg => state.tpl.noData.join("msg"),
  turning: state => state.turning,   //loading
  UserName: state => state.UserName, //用户名
  UserNickName: state => state.UserNickName, //昵称
  UserPhoto: state => state.UserPhoto, //用户头像
  Mobile: state => state.Mobile,  //手机号
  Uid: state => state.Uid,  //用户id
  clientId: state => state.clientId,  //聊天id
  UserChatList: state => state.UserChatList,  //消息列表
  ImgHost: state => state.constant.ImgHost,  //图片根地址
  PersonalInfo: state => state.PersonalInfo,
  newMsg: state => state.newMsg,  //新消息
  newMsgNum : state => state.newMsgNum,  //新好友消息数
  chatMsgNum : state => state.chatMsgNum,  //新聊天消息数
  Friend: state => state.Friend, //好友列表
  login2path: state => state.login2path,  //登陆前的路由
  UserCreateGroup: state => state.UserCreateGroup, //创建的群组
  UserJoinGroup: state => state.UserJoinGroup,  //加入的群组
  UserSetting: state => state.UserSetting, //用户设置
  groupManager: state => state.groupManager, //群成员
  fparent: state => state.fparent, //用户权限
  userParentGroup: state => state.userParentGroup,
  groupMaster: state => state.groupMaster,
  systemMsgNum: state => state.systemMsgNum,
  systemMsg: state => state.systemMsg,
  groupUser: state => state.groupUser,
  groupInfo: state => state.groupInfo,
  roleId: state => state.roleId
}

export default getters
