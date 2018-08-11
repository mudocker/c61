Vue.component('mselect',{
    template: '<el-col :span="span" ><label style="height: 20px;width:80px ;padding-right:2px;text-align:right ;height: 25px;line-height:25px" >{{title}}:</label>' +
    '<select v-model="sresult" placeholder="请选择"  style="width: 150px;height: 25px;line-height:25px"><option v-for="item in items"' +
    ' :key="item.value" :label="item.label" :value="item.value">{{ item.label }} </option></select></el-col>',
    props: {
        title:'',
        items: '',
        result:'',
        span: {
            default:4,
        },
        size: {
            default: 'large'
        }
    },
    methods:{
        change(value){
            this.$emit('input', value);
        }
    },
    data(){
        return{ sresult:this.result, }
    },
    watch:{
        sresult(v){
            this.$emit('update:result', v) },
    }
});
/*<einput
    :result.sync="other.duration" title="窗口自动关闭时间" type="medium"/>*/
Vue.component('einput',{
    template: '<el-col :span="span"><el-input    style="width: 250px;" v-model="result" :size="size">' +
    '<template slot="prepend">{{title}}</template> </el-input></el-col>',

    props:{
        title:'',
        result:'',
        type:{default:'',},
        offset: {default:1,},
        span: {default:4,},
        size: {default:'small',},
    },
    data(){
        return{
            result:this.result,
        }
    },
    watch:{
        result(val){ this.$emit('update:result', val); },
    }
});
/*<minput v-for="item in options" :title="item.label"  :result.sync="form[other.row_index][item.key]"  span="10"/>*/
Vue.component('minput',{
    template:'<el-col :span="span" :offset="offset"> <label style="height: 20px;width:80px ;padding-right:2px;text-align:right " v-if="title!=\'\'">{{title}}:</label>' +
    '<input v-model="result" style="height: 20px;width:200px" :type="type" /></el-col>',
    props:{
        title:'',
        result:'',
        type:{default:'',},
        offset: {default:'',},
        span: {default:4,}
    },
    data(){
        return{
            result:this.result,
        }
    },
    watch:{
        result(val){ this.$emit('update:result', val); },
    }
});
/*
<cinput  :result.sync="form[other.row_index][item.key]" />
*/
Vue.component('cinput',{
    template:'<input v-model="result"  :type="type" />',
    props:{
        result:'',
        type:{default:'',},
    },
    data(){
        return{
            result:this.result,
        }
    },
    watch:{
        result(val){ this.$emit('update:result', val); },
    }
});
Vue.component('mdInput',{
    template: '<div><el-col :span="span"><el-input  v-model="one" :size="sInput"  v-on:change="one" > <template slot="prepend">{{title}}</template> </el-input></el-col>' +
    '<el-col :span="span2"><el-input  v-model="two" :size="sInput"   /></el-col></div>',
    props: {
        title:'',
        one:'',
        two:'',
        sInput:{
            default: 'small',
        },
        span: {
            default:3,
        },
        span2: {
            default:2,
        }
    },
    methods:{
        change(value){
            this.$emit('input', value);
        }
    }
});
Vue.component('ma',{
    template:'<el-col ' +
    ':span="span" :offset="offset"><a :href="src" style="margin-top:5px;width:100px;height: 30px ;line-height:30px;border-radius: 5px;display: block;border: 1px solid grey;text-align: center">{{title}}</a></el-col>',
    props: {
        src:'',
        offset:{
            default:0,
        },
        span: {
            default:3,
        },
        title:'',
    },
    methods:{
        change(rep){
            this.$emit('change',rep);
        },
    }

});
/*<ebutton
 @click="save(urls.add,'add')" title="新增" offset="4"/>*/
Vue.component('ebutton', {
    template: '<el-col :span="span" :offset="offset"><el-button  :type="type" v-on:click="click">{{ title }}</el-button></el-col>',
    props: {
        title:'',
        span: {
            default:2,
        },
        offset: {
            default:0,
        },
        type: {
            default:'primary',
        }
    },
    methods: {
        click: function () {
            this.$emit('click');
        }
    },
});
Vue.component('currency-input', { template:'<span><input v-on:input="$emit(\'input\', $event.target.value)"></span>', });
Vue.component('ebtn', {
    template: '<el-button :size="size" :type="type" v-on:click="$emit(\'click\')"  >{{ title }}</el-button>',
    props: {
        title:'',
        size: {
            default:"mini",
        },
        type: {
            default:"",
        },
    }
});
Vue.component('mtime',{
    template: '<div><el-col :span="span"><el-date-picker  v-model="model" :type="type"  range-separator=":"' +
    '  start-placeholder="从"  end-placeholder="到" :size="size" style="width:200px" text="title" @change="change" ></el-date-picker></el-col></div>',
    props: {
        title:'',
        model:'',
        type:{
            default: 'datetimerange',
        },
        size: {
            default: 'small',
        },
        span: {
            default: 4,
        }
    },
    methods:{
        change(value){
            this.$emit('input', JSON.stringify(value));

        }
    }
});
Vue.component('edialog',{
    template:'<el-dialog  :visible.sync="show"  :width="width"  :before-close="handleClose" ><slot></slot></el-dialog>',
    props: {
        width:{ default:'30%' },
        show:{ default:false }
    },
    data(){
        return{ show:this.show, }
    },
    watch:{
        show(v){   this.$emit('update:show', v)  },
    },

    methods:{
        handleClose(done) {
            this.show=false;
        }
    }

});
// <epage :param.sync="pageForm" v-on:success="success"/>
Vue.component('epage',{
    template:'<el-row> <el-col><div class="block"><el-pagination @size-change="size" @current-change="current" :current-page="page" :page-size="pageSize"    layout="total, sizes, prev, pager, next, jumper" :total="param.total"></el-pagination></div></el-col></el-row> ',
    props: {

        param:{

        },
    },
    data(){
        return {
            page:1,
            pageSize:10,
        }
    },
    methods:{
        success(rep){
            this.$emit('success',rep);
        },
        size(val){

            this.pageSize=val;
            this.search();
        },
        current(val){

            this.page=val;
            this.search();
        },
        search(){

            this.param.page=this.page;
            this.param.pageSize=this.pageSize;
            this.post(this.param.url, this.param,this.success);
        }
    }
});
/*
<mselect
    :items="roles" :result.sync="form[other.row_index]['permission']" title="部门"/>

roles=[ { "value": "1", "label": "技术组" } ]
    */
Vue.component('eselect',{
    template:' <el-col :span="span" :offset="offset"> <el-select v-model="result" placeholder="请选择" @change="change" :filterable="filterable">  ' +
    '<el-option v-for="item in items" :key="item.value" :label="item.label"  :value="item.value" ></el-option></el-select></el-col>',
    props: {
        result:'',
        filterable:{
            default:true,
        },
        span: {
            default:4,
        },
        offset: {
            default:0,
        },
        items:[],
    },

    methods:{
        change(rep){
            this.$emit('change',rep);
        },
        readme(){
            //  <mselect :items="other.menus" :result.sync="form[other.row_index]['fid']" title="模块" span="4"/>
        }
    },
    data(){
        return{ result:this.result, }
    },
    watch:{
        result(v){   this.$emit('update:result', v) },
    }


});
Vue.component('estatus',{
    template:'<el-table-column :label="title"><template slot-scope="scope"><el-switch v-model="status" active-value="1"/></template></el-table-column>',
    props: {
        title:{
            default:'状态',
        },
        status:'',
    },
    data(){
        return {
            page:1,
            pageSize:10,
        }
    },
    methods:{

    }

});
Vue.component('ecolop',{
    template: ' <el-table-column><template slot-scope="scope"><el-button v-on:click="add"  >{{ title }}</el-button> </template> </el-table-column>',
    props: {
        title:'',
    },
    methods: {
        add () {this.$emit('add');},
        edit(){},
    },
});
Vue.component('mtime',{
    template: '<div><el-col :span="span"><el-date-picker  v-model="model" :type="type"  range-separator=":"' +
    '  start-placeholder="从"  end-placeholder="到" :size="size" style="width:200px" text="title" @change="change" ></el-date-picker></el-col></div>',
    props: {
        title:'',
        model:'',
        type:{
            default: 'datetimerange',
        },
        size: {
            default: 'small',
        },
        span: {
            default: 4,
        }
    },
    methods:{
        change(value){
            this.$emit('input', JSON.stringify(value));

        }
    }
});
Vue.component('ealert',{
    template: '<el-col :span="span"><el-alert :title="title" :type="type" :description="description" ></el-col>',
    props:{
        title:'',
        type:{
            default:'error',
        },
        span:{
            default:10,
        },
        description:'',
    },

});
Vue.component('mcheckbox',{
    template:'<el-col :span="span" :offset="offset"  >  <input :type="type" :id="id" :value="value" :name="name" v-model="result" @change="change" :checked="checked" />  <label :for="id">{{title}}</label></el-col>',
    props:{
        id:'',
        title:'',
        result:'',
        type:{
            default:'checkbox',
        },
        name:{
            default:'',
        },
        checked:{default:false},
        value:'',
        offset: {default:0,},
        span: {default:4,}
    },
    data(){
        return{
            result:this.result,
        }
    },
    methods:{
        change(v){
            this.$emit('change', v);

        }
    },
    watch:{
        result(val){ this.$emit('update:result', val); },
    }
});

Vue.prototype.post=function (url,param,success,error="操作失败",catchCallback) {

    Vue.http.options.emulateJSON = true;

    this.$http.post(url, param).then(function (res) {

        var msg=res.body.msg!=undefined?res.body.msg:error;
        if ( res.body==null||res.body.code!=200) {
            if ( typeof error=="function")      return error(res);
            else if (false===error)              return'';
            else                                  alert(msg);
        }
        if(res.body.code==200){
            if (false===success)                     return'' ;
            else if ( typeof success=="function")  return success(res.data.result);
            else                                       alert(res.body.msg);
            
        }

    },function (res) {
        if (false===catchCallback)return;
        if (catchCallback==undefined||catchCallback==null) alert('操作异常');
        if ( typeof catchCallback=="function")catchCallback(res);

    });
};
Vue.prototype.formatDate=function(time) {
    if (time == 0 || time == '' || time == undefined) return '';
    var data = new Date(time * 1000);
    var month = (data.getMonth() + 1 < 10 ? '0' + (data.getMonth() + 1) : data.getMonth() + 1);
    var result = data.getFullYear() + '-' + month + '-' + data.getDate() + ' ' + data.getHours() + ':' + data.getMinutes() + ':' + data.getSeconds();
    return result;
};
Vue.prototype.json_encode=function(object) {

    return typeof object =='object'? JSON.stringify(object):object;
};
Vue.prototype.json_decode=function(str) {
    return typeof str =='string'? JSON.parse(str):str;
};
Vue.component('eop',{
    template:'<el-table-column label="操作" width="420"> <template slot-scope="scope"><slot></slot></template></el-table-column>',
});


Vue.component('ecol', {
    render: function (createElement) {
        var common='';
        common=this.$slots[this.keyname];
        if(common==undefined)common=this.$slots.common;
        return createElement('div',[
            createElement('div', common),
        ])
    },
    props: {
        keyname:'',
        row: '',
        item: '',
    }
});