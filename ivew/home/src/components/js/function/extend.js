
import Vue from 'vue'
import router from '../routes/index'
import {crop} from "./crop"
import {apiData} from '../api/apiData'

//layer 、filterXSS引入失败，刷新
if((typeof(layer)||typeof(filterXSS))=='undefined'){
  location.href=location.href
}
;(function(){
  try {
    sessionStorage.setItem('TextLocalStorage', 'hello world');
    sessionStorage.getItem('TextLocalStorage');
    sessionStorage.removeItem('TextLocalStorage');
  } catch(e) {
    alert('您的浏览器太旧或开启了无痕模式，请升级浏览器或退出无痕模式，给您带来的不便，表示抱歉！');
    localStorage={setItem:function(d){},getItem:function(d){}};
    sessionStorage={setItem:function(d){},getItem:function(d){}};
  }
})()

/**
 * [format 为Date对象追加format方法]
 * @param  {[string]} format [设置要输出的目标格式 如"yyyy-MM-dd hh:mm:ss" ]
 * @return {[string]}        [按格式输出的时间字符串]
 * 示例console.log(new Date().format("yyyyMd hh:mm:ss")) 输出2016816 14:12:17;
 */
Date.prototype.format = function(format) {
  var date = {
    "M+": this.getMonth() + 1,
    "d+": this.getDate(),
    "h+": this.getHours(),
    "m+": this.getMinutes(),
    "s+": this.getSeconds(),
    "q+": Math.floor((this.getMonth() + 3) / 3),
    "S+": this.getMilliseconds()
  };
  if (/(y+)/i.test(format)) {
    format = format.replace(RegExp.$1, (this.getFullYear() + '').substr(4 - RegExp.$1.length));
  }
  for (var k in date) {
    if (new RegExp("(" + k + ")").test(format)) {
      format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? date[k] : ("00" + date[k]).substr(("" + date[k]).length));
    }
  }
  return format;
}

//正则替换  参数s1:正则表达式(请将关键字符转义),如"\\[微笑\\]"  参数s2:新文本
String.prototype.replaceAll=function(s1,s2){
  try{
    return this.replace(new RegExp(s1,"gm"),s2)
  }catch(ex){
    return this
  }
}

String.prototype.formatTime=function(format){
  var d = new Date(Date.parse(this.replace(/-/g,  "/")))
  if(!format){
    var now = new Date()
    var nd = new Date()
    nd.setDate(nd.getDate()+1)
    var pd = new Date()
    pd.setDate(pd.getDate()-1)
    format='yyyy-M-d h:mm'
    if(d.getFullYear()==now.getFullYear() && d.getMonth()==now.getMonth() && d.getDate()==now.getDate())
      format='今天 h:mm'
    else if(d.getFullYear()==pd.getFullYear() && d.getMonth()==pd.getMonth() && d.getDate()==pd.getDate())
      format='昨天 h:mm'
    else if(d.getFullYear()==nd.getFullYear() && d.getMonth()==nd.getMonth() && d.getDate()==nd.getDate())
      format='明天 h:mm'
    else if(d.getFullYear()==now.getFullYear())
      format='M-d h:mm'
  }
  return d.format(format)
}


Vue.prototype.formatTime=function(start,end,pre,format){
  if(start && end){
    return start.formatTime(format)+' 至 '+end.formatTime(format)
  }
  else if(start){
    return start.formatTime(format)+(!pre?' 开始':'')
  }
  else if(end){
    return end.formatTime(format)+(!pre?' 结束':'')
  }
  else{
    return ''
  }
}

// document.body.oncontextmenu=function(){ return false;}//防止右键
//document.addEventListener('touchstart',function(e){},false);//让css的:active生效
// document.cookie = "Site="+location.hostname.replace('.com','')
window.rem = document.body.clientWidth/18;
//window.em = Math.sqrt((rem-20)*.9)+20
document.querySelector("html").style.fontSize=rem+'px';
//document.body.style.fontSize=rem+'px'
// 修改默认配置XSS 添加STYLE
var XssList=filterXSS.whiteList;
for(var x in XssList){
  XssList[x].push('style')
}
// filterXSS.whiteList=XssList

function Xss(data){
  var k,nk,t,mayBeXss
  for(var i in data){
    k=data[i];
    t=typeof(k)
    if (t==="object") {
      k=Xss(k);
      if (k[1]) {
        mayBeXss=mayBeXss||{}
        mayBeXss[i]=k[1]
      }
      k=k[0]
    }
    if (t==="string") {
      nk=filterXSS(k)
      if (k!==nk) {
        mayBeXss=mayBeXss||{}
        mayBeXss[i]={old:k,new:nk}
      }
      k=nk
    }
    data[i]=k
  }
  return [data,mayBeXss]
}
window._catch = function(data){
  var str=[],k;
  for(var i in data){
    k=data[i];
    if (typeof(k)==="object") {
      // k= encodeURIComponent(JSON.stringify(k));
      if(k!=null)
        k=k.toString()
    }
    str.push(i+'='+k)
  }
  str=str.join('&')
  var fetchUrl = state.UserName||data.UserName
  fetchUrl = fetchUrl?'/catch?U='+fetchUrl:'/catch'
  fetch(fetchUrl, {
    credentials:'same-origin',
    method: 'POST',
    cache: 'no-store',
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: str
  })
}

function FetchCatch(opt) {
  var {msg, resolve, T, S,str}=opt
  // layer.alert(msg) 先不提示
  layer.closeAll()
  if (state.turning) {
    state.turning = false
  }
  resolve({Code:-1,StrCode:msg})
  //delete opt.resolve
  //_catch(opt)
}
var fetchArr=[]
window._fetch = function (data){
  data = Xss(data)
  data=data[0]

  data.bug=1;
  var str=[],k;
  for(var i in data){
    k=data[i];
    if (typeof(k)==="object") k= encodeURIComponent(JSON.stringify(k));
    str.push(i+'='+k)
  }
  str=str.join('&')
  // 防止一秒内的完全相同请求
  var now = new Date().getTime()
  for (var i = 0; i < fetchArr.length; i++) {
    if(fetchArr[i].length<3||fetchArr[i][0]+1000<now){
      fetchArr.shift();
      i--;
    }else if(fetchArr[i][1]===str){
      return {then:function(callback){
        callback && callback(fetchArr[i][2])
      }}
    }
  }
  fetchArr.unshift([now,str])
  return new Promise(function(resolve, reject){
    //var st = state.turning&&setTimeout(function(){
    //  var msg = '请求超时，请重试'
    //  FetchCatch({msg},resolve)
    //  reject()
    //},10000)
    //process.env.API_HOST +
    var fetchUrl = '/index.php?'+(data.app||data.group||data.friend||data.item||'');
    fetch(fetchUrl, {
      /*credentials:'same-origin',*/
      credentials: "include",
      method: 'POST',
      cache: 'no-store',
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: str
    }).then((res)=>{
      //state.turning&&clearTimeout(st)
      var T = (new Date().getTime()-now)/1000
      var H={}
      try{
        for (var pair of res.headers.entries()) {
          pair[0]=pair[0].toLowerCase()
          if (['a','x-sec'].indexOf(pair[0])>-1) {
            H[pair[0]]=pair[1]
          }
        }
      }catch(e){
        H={'x-sec':'I','a':'E'}
      }
      var S=(!H['a'])?null:( H['a']+(H['x-sec']?('_'+H['x-sec']):''))
      if (res.status!==200) {
        var msg ='网络错误';//(res.statusText||'网络错误') + res.status;
        FetchCatch({
          msg,
          resolve,
          T,  //fetch耗时,
          S,
          str
        })
        return
      }
      res.text().then(json=>{
        if (data.app==='GetImageCode') {
          //获取验证码的不需要转换成json
          resolve(json)
          return
        }
        try{
          json = JSON.parse(json)
          fetchArr[0].push(json)
        }catch(error){
          // 解析成json数据失败
          // if (json[0]==='<') {
          //     // 可能是一些高防拦截等需要重发
          //     _fetch(data,option).then(json=>{
          //         resolve(json)
          //     })
          // }else{
          var msg = json||"网络数据解析错误"
          FetchCatch({
            msg,
            resolve,
            T,  //fetch耗时,
            S,
            str
          })
          // }
        }
        if (typeof(json)==='string') return
        json = Xss(json)
        if(json[1]) {
          // console.log(json[1]);
        }
        json=json[0]
        // console.log(json);
        var notRes
        if (data.app==="GetInitData") {
          if (json.Code===1||json.Code===0) {
            var Data = RootApp.SetFilter(json.BackData);
            RootApp.SaveInitData(Data)
            if(JSON.stringify(json.CacheData) !== "{}"){
              localStorage.setItem('CacheData',JSON.stringify(Object.assign(CacheData,json.CacheData)))
            }
          }
        }
        ;(function(){
          switch(json.Code){
            case 0://未登录
              if(window._meta&&window._meta.user){
                if (state.UserName) {
                  layer.alert("您已自动退出，请重新登录", function() {
                    RootApp.Logout()
                    router.replace("/login")
                  })
                }else{
                  router.replace('/login')
                }
                notRes = true
              }
              else if (state.UserName){
                RootApp.Logout()
              }
              break;
            case -7://系统维护
              store.commit('SetMaintain', json.BackData)
              router.push("/maintain")
              notRes=true
              break;
            case -8://账号冻结
              layer.alert("您的账号已被冻结，详情请咨询客服。",function(){
                RootApp.Logout()
                var meta = RootApp._route.matched[0]
                meta = meta&&meta.meta
                router.push("/login")
              })
              notRes=true
              break;
            case -1:
              if (json.StrCode === '空') {
                // 出现意外错误，需要补发接口
                _fetch(data,option).then(json=>{
                  resolve(json)
                })
                notRes=true
              }
              break;
          }
          if (data.app && data.app.search('Verify')===0 && json.Code>-1) {
            state.UserVerify=data.app.replace('Verify','')+','
          }
        })()
        notRes||resolve(json)
      }).catch(error => {
        var msg = error.toString()
        FetchCatch({
          msg,
          resolve,
          T,  //fetch耗时
          S,
          str //fetch的body
        })
        throw error
      })
    }).catch(error => {
      //state.turning&&clearTimeout(st)
      var msg =  error.toString()
      FetchCatch({
        msg,
        resolve,
        str //fetch的body
      })
      throw error
    })
  })
}

// 获取图形码接口专用
window._fetchT=function _fetchT(data){
  return _fetch(data)
}
window._App=location.host.toLowerCase().search("app.")>-1//是否APP
;(function(){
  var versions = function() {
    var u = navigator.userAgent,
      app = navigator.appVersion;
    return {
      // trident: u.indexOf('Trident') > -1, //IE内核
      // presto: u.indexOf('Presto') > -1, //opera内核
      // webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
      // gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
      mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
      ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
      android: u.indexOf('Android') > -1 || u.indexOf('Adr') > -1, //android终端
      // iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
      // iPad: u.indexOf('iPad') > -1, //是否iPad
      // webApp: u.indexOf('Safari') == -1, //是否web应该程序，没有头部与底部
      // weixin: u.indexOf('MicroMessenger') > -1, //是否微信 （2015-01-22新增）
      // qq: u.match(/\sQQ/i) == " qq" //是否QQ
    };
  }()
  if (_App&&versions.ios) {
    //iosApp专用代码
    var img=document.createElement("img")
    img.src="http://static.ydbimg.com/API/YdbOnline.js"
    img.onerror=function(){
      var script = document.createElement("script");
      script.src=img.src
      document.body.appendChild(script);
      var inter=setInterval(function(){
        if(typeof (YDBOBJ) !='undefined'){
          (new YDBOBJ()).SetHeadBar(0)
          clearInterval(inter)
        }
      },100)
    }
  }
})()

//如果检测到copy事件
// document.addEventListener('copy', function(e){
//   var el = e.target
//   var btn = [].filter.call(el.parentNode.children, child=>(child !== el))[0]
//   if(btn.className.indexOf('copy') > -1){
//     layer.msgWarn('已将内容复制到剪切板')
//   }
// })

window.audioplayer = function(v) {
  var id='player'
  var audio = document.getElementById(id);
  if (!audio) {
    audio = document.createElement('audio')
    audio.id = id
    document.body.appendChild(audio);

    var mp3 = document.createElement('source')
    mp3.src = '/static/voice.mp3'//file['mp3'];
    mp3.type = 'audio/mp3'
    audio.appendChild(mp3)

  }
  audio.volume = v
  audio.currentTime = 0
  audio.play()
}

window.getCropData = crop //图片选框工具

window.apiData = apiData


