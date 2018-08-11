export function setState(key) {
  function getLocalDate(str){
    var s = localStorage.getItem(str);
    try{
      s = JSON.parse(s);
    }catch(e){}
    if (str=="SiteConfig"&&s) {
      SetIndexTitle(s)
    }
    return s;
  }
  for (var i = key.length - 1; i >= 0; i--) {
    var value=getLocalDate(key[i])
    if (value!==null) {
      switch(key[i]){
        case 'SiteConfig':
          if (!(value.Style&&value.Style.Id)) value=''
          break;
        default:
          if(LocalCacheArr.indexOf(key[i])>-1){
            // 判断与LocalCacheData的同步
            var cache = value
            var hasVersion = !!LocalCacheData[key[i]]
            var hasCache = !!cache
            var needDelete = hasVersion ^ hasCache  //异或
            if(needDelete){
              localStorage.removeItem(key[i])  //删除对应的缓存
              delete LocalCacheData[key[i]]
              localStorage.setItem("LocalCacheData",JSON.stringify(LocalCacheData))
            }
          }
          break
      }
    }
    else if(CacheData[key[i]] != undefined) CacheData[key[i]] = null;
    state[key[i]]=value
  }
}
