import * as types from './mutation-types'
import { UserCreateGroup, GetMerchantGroup,ListGroupItem } from '../api/groupApi'

export default {
  messageToTop({commit}, index){
    commit(types.MESSAGE_TO_TOP,  index)
  },
  saveData({ commit }, options){
    commit(types.SAVE_DATA, options)
  },
  saveJsonData({ commit }, options){
    commit(types.SAVE_JSON_DATA, options)
  },
  pushData({ commit }, options){
    commit(types.PUSH_DATA, options)
  },
  unshiftData({ commit }, options){
    commit(types.UNSHIFT_DATA, options)
  },
  clearData({ commit }, options){
    commit(types.CLEAR_DATA, options)
  },
  loading({ commit }, options){
    commit(types.LOADING, options)
  },
  getGroup({commit, state}){
    if(state.fparent == 0){
      UserCreateGroup().then((data)=>{
        state.turning = false
        if(data.Code === 1) {
          commit(types.GET_GROUP,  data.BackData)
        } else{
          layer.msgWarn(data.StrCode)
        }
      })
    } else {
      GetMerchantGroup().then((data)=>{
        state.turning = false
        let arr = []
        if(data.Code ===1){
          data.StrCode.ingroup.forEach(v=>{
            data.StrCode.models.forEach((val,index)=>{
              if(v.id==val.id){
                data.StrCode.models[index]['isJoin']=true;
                arr.push(data.StrCode.models[index])
                data.StrCode.models.splice(index,1)
              }
            })
          })
          data.StrCode.models.unshift(...arr)
          commit(types.GET_GROUP, data.StrCode.models)
        }else {
          layer.msgWarn(data.StrCode)
        }
      })
    }
  },
  initItems({commit}){
    commit(types.INIT_ITEM)
  },
  getItems({commit, state},options){
    let init = options.init || false;
    if(init) {
      commit(types.LOADING, true)
      options.page = 0;
    }
    ListGroupItem({
      gid:options.gid,
      page:options.page,
    }).then((data)=>{
      state.turning = false
      if(data.Code===1){
        if(data.StrCode){
          data.StrCode.list.forEach(v=>{
            v.uids =v.uids.split(',');
            if(v.state==null) v.state=2;
            data.StrCode.lastmsg.map(item=>{ //遍历最新消息列表
              if(item.chat_id == v.item_id){
                v.message = item.message;
                if((v.message.substr(0,2)=='[#'&&v.message.substr(-2,2)=='#]')||(v.message.substr(0,2)=='{#'&&v.message.substr(-2,2)=='#}')) v.message = '图片'

              }
            })
            v.showAit = false;
            if(window.localStorage['atiMsg']){
              let arr = JSON.parse(window.localStorage['atiMsg']);
              arr.map(item=>{ //遍历缓存的@消息
                if (item.chat_id == v.item_id) v.showAit = true;

              })
            }
          });
          let item = data.StrCode.list;
          commit(types.GET_ITEMS, item)
        }
      }else if(data.Code==-2){
        layer.msgWarn('您还不是该群成员，两秒后返回首页')
        setTimeout(()=>{router.push('/index')},2000)
      }else layer.msgWarn(data.StrCode)

    })

  }
}
