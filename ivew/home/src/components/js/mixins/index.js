export default {
  methods: {
	  back(){
		  this.$router&&this.$router.go(-1)
	  },
    jump(url){
      this.$router.push(url)
    },
    wait(){
      layer.msgWarn('该功能暂未开放')
    }
  }
}
