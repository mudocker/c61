class axiosx {
    static Vue;
    static axios;

    static  mcreate(Vue,axios){
      this.Vue=Vue;
      this.axios=axios.create({
        baseURL:this.Vue.config.apiUrl,
        timeout:10000,
        validateStatus: status => status>=100 && status<=505});
    };
    static post() {
      let that=this;
      this.Vue.prototype.post = function (url, params, success = false, pcatch = false, Vue) {
        var qs = require('qs');
        params = qs.stringify(params);
        that.axios.post(url, params)
          .then(res => {that.hsuccess(res, success, pcatch);}, res => {that.herror(res, pcatch);});
      };
    }
    static get(){
        let that=this;
        this.Vue.prototype.get=function (url,params,success=false,pcatch=false) {
            that.axios.get(url, params).then(
            res=>{that.hsuccess(res,success,pcatch);},
            res=>{that.herror(res,pcatch);});
        };
    }
    static response(){
      this.axios.interceptors.response.use(this.rsuccess,this.rerror);
    }


    static hsuccess (result, success, pcatch) {
    switch (result.data.sign) {
        case 200:
          switch (typeof pcatch) {
            case "function":   return success(result.data.result);
            case "string":      return alert(success);
            case  false:        return;
            default:             alert(result.data);
          }
          break;
        default:
          switch (typeof pcatch) {
                case "function":   return pcatch(result);
                case "string":      return alert(pcatch);
                case  false:        return;
                default:
                  alert(result.data);
              }
      }
    }                                                                       //post get 回调
    static herror(result, pcatch) {

    switch (typeof pcatch) {
      case  "function":    return pcatch(result);
      case "string":      return alert(pcatch);
      case  false:        return;
      default:            alert(result.data);
    }

    }
    static rsuccess(res){
    if (res.data && !res.data.success) {
        let data= res.data;
      Message({showClose: true, message: data.error.message.message ? data.error.message.message : data.error.message, type: "error"});
      return Promise.reject(res.data.error.message);
    }
    return res;
    };                                                                                            //response 回调
    static rerror(result){
    if (!window.localStorage.getItem("loginUserBaseInfo")) router.push({path: "/login"});                   // 若是接口访问的时候没有发现有鉴权的基础信息,直接返回登录页
    else {
      let lifeTime = JSON.parse(window.localStorage.getItem("loginUserBaseInfo")).lifeTime * 1000;           // 若是有基础信息的情况下,判断时间戳和当前的时间,若是当前的时间大于服务器过期的时间// 乖乖的返回去登录页重新登录
      let nowTime = new Date().getTime();                                                                          // 当前时间时间戳
      if (nowTime > lifeTime) {
        Message({showClose: true, message: "登录状态信息过期,请重新登录", type: "error"});
        router.push({path: "/login"});
      } else {
        switch (result.response.status) {
          case 403: router.push({path: "/error/403"});break;
          case 404: router.push({path: "/error/404"});break;
          case 500: router.push({path: "/error/500"});break;
          case 502: router.push({path: "/error/502"});break;
        }
      }
    }
    let errorInfo =  result.data.error ? result.data.error.message : result.data;
    return Promise.reject(errorInfo);
    };
}

export default axiosx







