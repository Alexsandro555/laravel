
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//window.CKEDITOR_BASEPATH = '/js/ckeditor/';
//require('ckeditor');
window.Vue = require('vue');
//import VeeValidate from 'vee-validate';
//import VeeValidateMessagesRU from "vee-validate/dist/locale/ru";
//import VueAxios from 'vue-axios'
//import Autocomplete from 'v-autocomplete'
//import 'v-autocomplete/dist/v-autocomplete.css'
//import ToggleButton from 'vue-js-toggle-button'
import VueCarousel from 'vue-carousel';

//import wysiwyg from "vue-wysiwyg";

/*Vue.use(wysiwyg, {
    hideModules: ["bold"],
    image: {
        uploadURL: "../storage/app/img"
    }
});*/

//VeeValidate.Validator.addLocale(VeeValidateMessagesRU);
//Vue.use(VeeValidate, {locale: 'ru'});
//Vue.use(VueAxios, axios);
//Vue.use(Autocomplete)

//Vue.use(ToggleButton)
Vue.use(VueCarousel);

//window.Vue.use(wysiwyg, {});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//Vue.component('textarea-wysiwyg', require('./components/Textarea_wysiwyg.vue'));
//Vue.component('ck-wysiwyg', require('./Components/Ck_wysiwyg.vue'));
//Vue.component('table-generator', require('./Components/generatorTables/index.vue'));
//Vue.component('my-autocomplete', require('./components/My-autocomplete.vue'));
Vue.component('uploader', require('./components/Uploader.vue'));

// create a root instance
new Vue({
    el: '#app',
    /*data: {
        myHTML: ''
    }*/
});





