import VueRouter from 'vue-router';
import HomeComponent from '../components/HomeComponent.vue';
import CurrentPhpVersionComponent from '../components/CurrentPhpVersionComponent.vue';
import OperatingSystemComponent from '../components/OperatingSystemComponent.vue';
import SharedHostsComponent from '../components/SharedHostsComponent.vue';

const routes = [
  { path: '/', component: HomeComponent, name: 'Home' },
  { path: '/shared-hosts', component: SharedHostsComponent, name: 'SharedHosts'},
  { path: '/operating-systems', component: OperatingSystemComponent, name: 'OperatingSystems'},
  { path: '/new-and-shiny', component: CurrentPhpVersionComponent, name: 'CurrentVersion'},
];

export default new VueRouter({
  routes,
  hashbang: false,
  linkActiveClass: 'active',
  mode: 'history',
});