import md5 from "js-md5" /*https://www.npmjs.com/package/js-md5*/

export function num(val) {// 转成数字类型
  return +val
}

export function filNum(val){//数字整数长度大于7位去掉小数点部分
  return String(Math.floor(val)).length>7?Math.floor(val):val
}

export function avatar(val, time, path='uploads'){ //val uid值 /time 更新时间
  if(!val) return;
    time = !time || time == '0000-00-00 00:00:00'?'':new Date(time).getTime();
   val = val.toString();

  return _ImgPath + path +'/' + md5(val).substring(0,2) + '/'+ val +'.png?' + time

}

