import routes from './routes/routes'
import routers from './routes'
import store from './store'
import Va from './plugins/va'
import axios from "axios"
import Mint from 'mint-ui';
import VueTouch from 'vue-touch'
import '../static/mint-ui/style.css'
import '../static/font/icon.css'
import {connect} from "./function/webSocket"
import layerT from "./components/layerT"
import "./function/extend"
import * as filters from './filters' // 全局filter
import { LogOut } from "./api/apiData"
import "../static/font/emoji.js"  //emoji
import mixins from './mixins'