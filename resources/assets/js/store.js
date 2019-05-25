// Adds the promise polyfill for IE 11
require('es6-promise').polyfill();
/*
    import vue and vuex
 */
import Vue from 'vue';
import Vuex from 'vuex';
import { cafes } from './modules/cafes.js';


/*
    initial vuex
 */
Vue.use(Vuex);


/*
    export the data store
 */
export default new Vuex.Store({
    modules:{
        cafes
    }
})
