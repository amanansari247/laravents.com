
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

require('./vue_libraries');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('random-qoute', require('./components/RandomQuote'));
Vue.component('sponsor-form', require('./components/SponsorForm'));
Vue.component('notification-widget', require('./components/NotificationWidget'));

Vue.component('home-search', require('./components/HomeSearch'));
Vue.component('meetup-list', require('./components/Meetups'));
Vue.component('speaker-list', require('./components/SpeakerList'));
Vue.component('hackathon-list', require('./components/Hackathons'));
Vue.component('conference-list', require('./components/Conferences'));

Vue.component('create-conference', require('./components/CreateConference'));

Vue.config.productionTip = false;

const app = new Vue({
    el: '#app',
    data() {
        return {
            currentUser: window.Laravents.currentUser
        }
    }
});
