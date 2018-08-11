import store from '../store'
export function connect(vm) {
    if(vm.ws){
      if(vm.ws.readyState==0||vm.ws.readyState==1)
        // vm.ws.close() 防止登陆后进入关闭
      vm.ws=null
    }
    // console.log('connect')
    // 创建websocket
    vm.ws = new WebSocket(process.env.WS_ADDRESS);
    window.WS = vm.ws;
    //vm.ws = new WebSocket('ws://192.168.0.108:7272/')
    vm.ws.onopen = function(e){
      // console.log(e)
      //   vm.ws.send('{"type":"login","client_name":"'+state.UserName+'","room_id":"'+vm.$route.params.cid+'"}')
    }
    //接收服务端发过来的消息
    vm.ws.onmessage = function(e){
      //consoe.log(vm.ws.readyState)
      //  console.log(e)
      if(!e.data)return
      var data = eval(`(${e.data})`);
      if(data.type=='ping') {
        vm.ws.send('1')
      } else if (data.type=='init'){
        console.log(e)
        // store.state.clientId = data.client_id;
        store.dispatch('saveData',{name: 'clientId',data: data.client_id})
        state.clientId = data.client_id;
        _fetch({
          app:"BindSockerApi",
          client_id:data.client_id,
        }).then((data)=>{
          if(data.Code===1) {
            // console.log("login")
          } else {
            console.log(data)
          }
        })
      } else{
        console.log(data)
        vm.eventHub.$emit(data.type,data);
      }
    }
    vm.ws.onclose = function() {
      console.log('close')
      setTimeout(()=>{
        if(location.pathname.toLowerCase() =='/login') return;
        layer.confirm(`您已断开连接，是否重连？`,['确定','取消'], ()=>{
          window.location.reload()
        })
      },1000)
      // store.dispatch('clearData',{name: 'clientId',data: null})
      // if(vm.eventHub) vm.eventHub.$emit('connect')
      //state.clientId=null
    }
    vm.ws.onerror = function(e) {
      // layer.msgWarn('连接服务器出错')
      console.log('error')
      // store.dispatch('clearData',{name: 'clientId',data: null})
      // if(vm.eventHub) vm.eventHub.$emit('connect')
      //state.clientId=null
    }
  }
