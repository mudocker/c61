import axios from 'axios'
import axiosx from './axiosx'


export default {
    install(Vue){
      debugger;
      axiosx.mcreate(Vue,axios);
      axiosx.post();
      axiosx.get();
     // axiosx.response();
    }
}



























/*


$axios.interceptors.request.use(
  config => {
    //    if (store.state.token) config.headers.Authorization = `token ${store.state.token}`;
    return config;
  },
  error => {return Promise.reject(error);});*/
