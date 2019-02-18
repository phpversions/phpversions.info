import VueRouter from 'vue-router';
import HomeComponent from '../components/HomeComponent.vue';
import AboutComponent from '../components/AboutComponent.vue';
import ContributorsComponent from '../components/ContributorsComponent.vue';
import CurrentPhpVersionComponent from '../components/CurrentPhpVersionComponent.vue';
import OperatingSystemComponent from '../components/OperatingSystemComponent.vue';
import SharedHostsComponent from '../components/SharedHostsComponent.vue';
import ManagedHostsComponent from '../components/ManagedHostsComponent.vue';
import PaasHostsComponent from '../components/PaasHostsComponent.vue';
import VulnerabilitiesComponent from '../components/VulnerabilitiesComponent.vue';
import PostsComponent from '../components/Blog/PostsComponent.vue';
import PostComponent from '../components/Blog/PostComponent.vue';
import ServerErrorComponent from '../components/Errors/ServerErrorComponent.vue';
import NotFoundComponent from '../components/Errors/NotFoundComponent.vue';

const routes = [
  { path: '/', component: HomeComponent, name: 'Home' },
  { path: '/about', component: AboutComponent, name: 'About'},
  { path: '/contributors', component: ContributorsComponent, name: 'Contributors'},
  { path: '/shared-hosts', component: SharedHostsComponent, name: 'SharedHosts'},
  { path: '/managed-hosts', component: ManagedHostsComponent, name: 'ManagedHosts'},
  { path: '/paas-hosts', component: PaasHostsComponent, name: 'PaasHosts'},
  { path: '/operating-systems', component: OperatingSystemComponent, name: 'OperatingSystems'},
  { path: '/new-and-shiny', component: CurrentPhpVersionComponent, name: 'CurrentVersion'},
  { path: '/vulnerabilities', component: VulnerabilitiesComponent, name: 'Vulnerabilities'},
  { path: '/blog', component: PostsComponent, name: 'Posts' },
  { path: '/blog/:slug', component: PostComponent, name: 'Post'},
  { path: '/server-error', component: ServerErrorComponent, name: 'ServerError'},
  { path: '*', component: NotFoundComponent, name: 'NotFound'},
];

export default new VueRouter({
  routes,
  mode: 'history',
});