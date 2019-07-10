require('./bootstrap')

// == VueAxios
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

// == VModal
import VModal from 'vue-js-modal/dist/ssr.nocss'
// import VModal from 'vue-js-modal'
Vue.use(VModal)


//Vanilla вне экземпляра Vue
require('./vanilla/backtotop')

window.Noty = require('noty')


// == VueTheMask
// import VueTheMask from 'vue-the-mask'
// Vue.use(VueTheMask)


// == ElementUI
// import ElementUI from 'element-ui'
// Vue.use(ElementUI)
// import lang from 'element-ui/lib/locale/lang/ru-RU'
// import locale from 'element-ui/lib/locale'
// locale.use(lang)


// == cookies
import cookies from 'js-cookie'


// == vue-moment
// const moment = require('moment');
// require('moment/locale/ru');
// Vue.use(require('vue-moment'),{
//     moment
// });


//Vue
Vue.component('login-component', require('./components/LoginComponent.vue').default)
Vue.component('register-component', require('./components/RegisterComponent.vue').default)


require('./modules')


// Bearer token
axios.defaults.headers.common["Authorization"] = "Bearer " + cookies.get('apiToken')


// == Vue initialization
const app = new Vue({
  el: '#app',
  store,

  //Vanilla в экземпляре Vue
  mounted() {
    require('./vanilla/mmenu');

  }
});
