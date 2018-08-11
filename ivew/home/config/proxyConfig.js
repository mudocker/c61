module.exports = {
  proxyList: {
		'/apis': {
			
			target: 'https://s.cn/index.php',
			changeOrigin: true,
/*			pathRewrite: {
				'^/apis': ''
			}*/
		}
  }
}