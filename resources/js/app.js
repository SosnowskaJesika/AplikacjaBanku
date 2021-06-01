/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });

const integerConditions = (event) => (!/[0-9]/.test(event.key) && event.key !== 'Backspace' && event.key !== 'Tab');

if (document.getElementsByName('pesel').length) {

    document.getElementsByName('pesel')[0].addEventListener('keydown', function (event) {

        if (integerConditions(event)) {
            event.preventDefault();
        }
    })
}

if(document.getElementsByName('kwota').length) {

    document.getElementsByName('kwota')[0].addEventListener('keydown', function (event) {

        if (integerConditions(event)) {
            event.preventDefault();
        }
    })
}


const nameRegexp = /^[0-9+*\\\/\[\].?<>{}|!@#$%^&~`";:=_,]*$/;

if (document.getElementsByName('nazwisko').length) {

    document.getElementsByName('nazwisko')[0].addEventListener('keydown', function (event) {

        if (nameRegexp.test(event.key)) {
            event.preventDefault();
        }
    })
}

if (document.getElementsByName('imie').length) {

    document.getElementsByName('imie')[0].addEventListener('keydown', function (event) {

        if (nameRegexp.test(event.key)) {
            event.preventDefault();
        }
    })
}

console.log(document.getElementById('update-data'));

if (document.getElementById('update-data')) {

    document.getElementById('update-data').addEventListener('submit', (event) => {

        if (event.target.checkValidity()) {
            event.preventDefault();
            $.post('/panel/kreator-sukces', $(event.target).serialize(), function ({success}) {
                if (success === true) $('#success-modal').modal('show');
            });
        }
    });
}
