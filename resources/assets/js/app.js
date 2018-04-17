
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

/**
 * Laravel Passport
 */
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

/**
 * Navigation
 */
Vue.component('nav-search', require('./components/NavSearch'));

/**
 * Misc
 */
Vue.component('random-qoute', require('./components/RandomQuote'));
Vue.component('sponsor-form', require('./components/SponsorForm'));
Vue.component('notification-widget', require('./components/NotificationWidget'));
Vue.component('home-search', require('./components/HomeSearch'));

/**
 * Event Shared
 */
Vue.component('create-event', require('./components/CreateEvent'));
Vue.component('create-live', require('./components/CreateLive'));
Vue.component('speaker-list', require('./components/SpeakerList'));

/**
 * Hackathons
 */
Vue.component('hackathon-list', require('./components/Hackathons'));
Vue.component('create-hackathon', require('./components/CreateHackathon'));
// Vue.component('single-hackathon', require('./components/SingleHackathon'));

/**
 * Meetups
 */
Vue.component('meetup-list', require('./components/Meetups'));
Vue.component('create-meetup', require('./components/CreateMeetup'));
// Vue.component('single-meetup', require('./components/SingleMeetup'));

/**
 * Conferences
 */
Vue.component('conference-list', require('./components/Conferences'));
Vue.component('create-conference', require('./components/CreateConference'));
Vue.component('single-conference', require('./components/SingleConference'));

/**
 * Vue
 *
 * @type {boolean}
 */
Vue.config.productionTip = false;

import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyArfHX_NeTDW6Oe6cxpifW2EmBRxhm1Tqw',
    }
});

/**
 * App
 */
const app = new Vue({
    el: '#app',
    data() {
        return {
            currentUser: window.Laravents.currentUser
        }
    }
});
