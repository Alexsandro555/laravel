
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.CKEDITOR_BASEPATH = '/js/ckeditor/';
require('ckeditor');
window.Vue = require('vue');

//import wysiwyg from "vue-wysiwyg";

/*Vue.use(wysiwyg, {
    hideModules: ["bold"],
    image: {
        uploadURL: "../storage/app/img"
    }
});*/

//window.Vue.use(wysiwyg, {});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
//Vue.component('textarea-wysiwyg', require('./components/Textarea_wysiwyg.vue'));
Vue.component('ck-wysiwyg', require('./Components/Ck_wysiwyg.vue'));

// create a root instance
new Vue({
    el: '#app',
    /*data: {
        myHTML: ''
    }*/
});





