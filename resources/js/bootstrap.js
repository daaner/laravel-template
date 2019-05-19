
// == Vue
window.Vue = require("vue");

// == VueX
import Vuex from 'vuex'
import state from "./store/state";
import mutations from "./store/mutations";
import actions from "./store/actions";

const store = new Vuex.Store({
    state,
    getters: {},
    mutations,
    actions
});
window.store = store;


// == lodash
// window._ = require("lodash");


// == popper
// window.Popper = require("popper.js").default;

// == jquery
// try {
//   window.$ = window.jQuery = require("jquery");
//   // require("bootstrap");
// } catch (e) {}

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
}
