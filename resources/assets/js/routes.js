import VueRouter from 'vue-router';
import HomeComponent from '../components/HomeComponent.vue';
import CurrentPhpVersionComponent from '../components/CurrentPhpVersionComponent.vue';

const routes = [
  { path: '/', component: HomeComponent, name: 'Home' },
  { path: '/new-and-shiny', component: CurrentPhpVersionComponent, name: 'CurrentVersion'},
];

export default new VueRouter({
  routes,
  hashbang: false,
  linkActiveClass: 'active',
  mode: 'history',
});