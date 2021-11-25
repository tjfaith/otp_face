import Vue from 'vue'
import App from './App.vue'
import router from './router'
import loader from "vue-ui-preloader";
import axios from 'axios'
import VueAxios from 'vue-axios'
import Snackbar from 'vuejs-snackbar';
import VueSession from 'vue-session';

Vue.use(VueSession)
Vue.use(loader);
Vue.use(VueAxios, axios)

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


// Importing the global file 

Vue.config.productionTip = false
// Vue.prototype.$hostname = "http://localhost/webApp/otp_face/api/";
// Vue.prototype.$hostname = "https://www.omedim.com/2fa/api/";
Vue.prototype.$hostname = "https://www.eduplus.sch.ng/2fa/api/";

// import components ===============
import header from '@/components/header.vue'
import FaceEnroll from '@/components/faceEnrollment.vue'
import FaceLogin from '@/components/faceLogin.vue'

import './assets/tailwind.css'

// use compoenent ------------------------------------
Vue.component('snackbar', Snackbar);
Vue.component('app-header',header)
Vue.component('face-enroll', FaceEnroll)
Vue.component('face-login', FaceLogin)
new Vue({
  router,
  render: h => h(App) 
}).$mount('#app')
