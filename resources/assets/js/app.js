require('./bootstrap');

import router from './routes.js';

const app = new Vue({
  el: '#app',
  router,
});
