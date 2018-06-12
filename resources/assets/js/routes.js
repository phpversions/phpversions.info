import VueRouter from 'vue-router';
import HomeComponent from '../components/home.vue';

const routes = [
  { path: '/', component: HomeComponent, name: 'Home' },
];

export default new VueRouter({
  routes,
});