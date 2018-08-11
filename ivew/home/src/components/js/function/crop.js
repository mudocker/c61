export function crop(fileObj, cb, toWidth, toHeight) {
  if (!/\.(gif|jpg|jpeg|png|bmp|GIF|JPG|PNG)$/.test(fileObj.value)) {
    layer.msgWarn('图片类型必须是.gif,jpeg,jpg,png,bmp中的一种')
    return false
  }
  var reader = new FileReader()
  reader.onload = (e) => {
    var img = new Image
    img.onload = () => {
      var canvas = document.createElement('canvas')
      var imgWidth = img.width
      var imgHeight = img.height
      //context.drawImage(img,sx,sy,swidth,sheight,x,y,width,height);
      if(toWidth && toHeight){
        var scaleWidth=toWidth
        var scaleHeight=toHeight
        var imgScale=imgWidth/imgHeight;
        var cropScale=scaleWidth/scaleHeight;
        if(imgScale>cropScale){
          scaleWidth=parseInt(scaleHeight*imgScale);
        }
        else{
          scaleHeight=parseInt(scaleWidth/imgScale)
        }
        //canvas.width = scaleWidth
        //canvas.height = scaleHeight
        canvas.width = toWidth
        canvas.height = toHeight
        var ctx = canvas.getContext('2d')
        ctx.drawImage(img, 0, 0, scaleWidth, scaleHeight)

      }
      else{
        var maxWidth=400
        var maxHeight=700
        toWidth=imgWidth
        toHeight=imgHeight
        if(imgWidth>imgHeight){
          if(toWidth>maxWidth){
            var scale=imgWidth/imgHeight;
            toWidth=maxWidth;
            toHeight=parseInt(toWidth/scale)
          }
        }
        else{
          if(toHeight>maxHeight){
            var scale=imgHeight/imgWidth;
            toHeight=maxHeight;
            toWidth=parseInt(toHeight/scale)
          }
        }
        canvas.width = toWidth
        canvas.height = toHeight
        var ctx = canvas.getContext('2d')
        ctx.drawImage(img, 0, 0, toWidth, toHeight)
      }
      var data = canvas.toDataURL('image/jpeg', 0.4)
      //在指定图片格式为 image/jpeg 或 image/webp的情况下，可以从 0 到 1 的区间内选择图片的质量

      // canvas = document.createElement('canvas')
      // canvas.width = 100
      // canvas.height = 100
      // ctx = canvas.getContext('2d')
      // ctx.drawImage(img, 0, 0, canvas.width, canvas.height)
      // var smallData = canvas.toDataURL('image/png', 1)
      cb(data)
    }
    // 判断图片是否是base64
    //var s = this.img.substr(0, 4)
    //if (s !== 'data') {
    //img.crossOrigin = 'anonymous'
    //}
    img.src = e.target.result
  }
  reader.readAsDataURL(fileObj.files[0])
}
