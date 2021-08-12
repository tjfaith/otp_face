import Vue from 'vue'
import App from './App.vue'
import router from './router'
import loader from "vue-ui-preloader";

import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(loader);
Vue.use(VueAxios, axios)
// Importing the global file
import "@/assets/css/style.css"
 
Vue.config.productionTip = false
Vue.prototype.$hostname = "http://localhost/webApp/otp_face/api/";

new Vue({
  router,
  render: h => h(App) 
}).$mount('#app')
