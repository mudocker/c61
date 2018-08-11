import * as types from './mutation-types'
import Vue from 'vue'

export default {
  toggleLoading:(state, bool) =>{
    state.turning = bool
  },
  SaveInitData: (state,Data) => { //获取用户的必要信息放入state和localstorage
    for(var k in Data){
      state[k] = Data[k]
      if(CacheArr.indexOf(k)+1){
        if (Data[k]===null) {
          state[k]=Data[k]=''
        }else if (typeof(Data[k])=='object') {
          Data[k]=JSON.stringify(Data[k]);
        }
        localStorage.setItem(k,Data[k]);
      }
    }
  },
  ClearInitData:(state,arr)=>{  //删除全部对应的信息（X）
    for (var i = arr.length - 1; i >= 0; i--) {   //遍历相应数组（X）
      localStorage.removeItem(arr[i]) //删除ls内存储数组（X）
      state[arr[i]]=null  //清空vuex对应数据（X）
      delete CacheData[arr[i]] //删除缓存数据（X）
    }
    localStorage.setItem('CacheData',JSON.stringify(CacheData))
  },
  setTmpDifftime:(state, Difftime)=>{
    state.Difftime = Difftime
    localStorage.setItem('Difftime',Difftime)
  },
  setDifftime:(state, timeItemList)=>{
    var _shortest = timeItemList[0].interval,     //算获取最快的时间
      _index = 0
    timeItemList.forEach((item, index)=>{
      if(item.interval < _shortest){
        _shortest = item.interval
        _index = index
      }
    })

    var timeObj = timeItemList[_index],
      timeBegin = timeObj.timeBegin,
      timeEnd = timeObj.timeEnd,
      SerTime = timeObj.SerTime
    var Difftime = timeBegin + Math.floor((timeEnd - timeBegin)/2) - SerTime
    state.Difftime = Difftime
    localStorage.setItem('Difftime',Difftime)
  },
  SetMaintain:(state,d)=>{
    state.Maintain=d
  },
  [types.MESSAGE_TO_TOP](state , ret){
    var index = parseInt(ret);
    var arr = state.UserChatList;
    var item = arr.splice(index  , 1);
    arr.unshift(item[0]);//先删后置顶
    state.UserChatList = arr;
  },
  [types.SAVE_DATA](state , {name , data}){// name: key  data: value
    var Data = {};
    Data[name] = data;
    for(var k in Data){
      state[k] = Data[k];
      window.state[k] = Data[k]; //页面上都没用到state的话可去掉
      if(CacheArr.indexOf(k)+1){
        if (Data[k]===null) {
          state[k]=Data[k]='';
          window.state[k] = Data[k] = '';
        }else if (typeof(Data[k])=='object') {
          Data[k]=JSON.stringify(Data[k]);
        }
        localStorage.setItem(k,Data[k]);
      }
    }
  },
  [types.SAVE_JSON_DATA](state, data){ //data: json object
    for(var k in data){
      state[k] = data[k];
      window.state[k] = data[k];
      if(CacheArr.indexOf(k)+1){
        if (data[k]===null) {
          state[k]=data[k]='';
          window.state[k] = data[k] = '';
        }else if (typeof(data[k])=='object') {
          data[k]=JSON.stringify(data[k]);
        }
        localStorage.setItem(k,data[k]);
      }
    }
  },
  [types.PUSH_DATA](state, {name , data}){
    if(state[name] instanceof Array){
      state[name].push(data);
      // window.state[name].push(data);
    }
  },
  [types.UNSHIFT_DATA](state, {name , data}){
    if(state[name] instanceof Array){
      state[name].unshift(data);
      // window.state[name].push(data);
    }
  },
  [types.CLEAR_DATA](state, {name}){
    state[name] = null
    window.state[name] = null;
  },
  [types.LOADING](state, flag){
    // console.log('1:'+state.turning + '2:'+ flag)
    state.turning = flag
  },
  [types.GET_GROUP](state, data){
    if(data){
      state.userParentGroup = data;
      localStorage.setItem('userParentGroup',JSON.stringify(data));
    }
  },
  [types.GET_ITEMS](state, data){
    let arr = state.groupList;
    if(state.page == 0){
      arr = data;
    }else {
      arr.push(...data);
    }
    if(data.length<15){
      state.page = -1;
    } else{
      state.page = state.page+ 1;
    }
    state.groupList = arr;
  },
  [types.INIT_ITEM](state){
    state.page = 0;
    state.groupList = [];
  }
}
