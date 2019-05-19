require('./bootstrap')

// == VueAxios
import VueAxios from 'vue-axios'
Vue.use(VueAxios, axios)

// == VModal
import VModal from 'vue-js-modal/dist/ssr.nocss'
// import VModal from 'vue-js-modal'
Vue.use(VModal)


//Vanilla
require('./vanilla/backtotop')
// require('./vanilla/mmenu')

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


// Bearer token
axios.defaults.headers.common["Authorization"] = "Bearer " + cookies.get('apiToken')


// == Vue initialization
const app = new Vue({
  el: '#app',
  store,

  //костыль для вуя по гамбургеру
  mounted() {
    const hamburger = document.querySelector('.menu-button');
    const menu = document.querySelector('#mobilemenu');

    const toggleMenu = () => {
      menu.classList.toggle('show');
    }

    hamburger.addEventListener('click', e => {
      e.stopPropagation();
      toggleMenu();
    });

    document.addEventListener('click', e => {
      const target = e.target;
      const its_menu = target == menu || menu.contains(target);
      const its_hamburger = target == hamburger;
      const menu_is_active = menu.classList.contains('show');

      if (!its_menu && !its_hamburger && menu_is_active) {
        toggleMenu();
      }
    })
  }
});
