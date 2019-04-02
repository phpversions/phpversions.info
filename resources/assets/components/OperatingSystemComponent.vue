<style lang='scss' scoped>
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Operating Systems</h2>
        <p class="font-sans tracking-wide font-light pb-4"> Operating systems are used for both running your computer, and running web servers. Whilst you are not going to base your laptop buying decision based on which PHP version it has by default, knowing what versions are on what operating systems can save you some trouble in the future.</p>
        <p class="font-sans tracking-wide font-light pb-4">  More importantly, picking an OS for your web server with the right version is going to save arsing around trying to install (sometimes unofficial) repos to get it up to date. </p>
        <input class="mb-4 w-1/5 shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Search Hosts" v-model="search">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-sans tracking-wide font-light text-2xl">Distribution</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Family</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Default</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="distribution in searchedOperatingSystems">
                    <td class="font-sans tracking-wide font-light">{{ distribution.distribution }}</td>
                    <td class="font-sans tracking-wide font-light">{{ distribution.family }}</td>
                    <td class="font-sans tracking-wide font-light" v-bind:class="{ 'text-green': distribution.supported === true, 'text-red': distribution.supported === false }">{{ distribution.default }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';

  export default {
    created() {
      this.getOperatingSystems();
    },

    mounted() {

    },

    computed: {
      searchedOperatingSystems() {
        return this.operatingSystems.filter(os => {
          return os.distribution.toLowerCase().includes(this.search.toLowerCase());
        }).map(os => {
          if (os.default >= process.env.MIX_LOWEST_SUPPORTED_VERSION) {
            return Object.assign({ supported: true }, os);
          } else {
            return Object.assign({ supported: false }, os);
          }
        });
      },

      supportedVersions() {
        return this.operatingSystems.map(os => {

        })
      }
    },

    data() {
      return {
        search: '',
        operatingSystems: [],
      };
    },

    methods: {
      getOperatingSystems() {
        return axios.get('/api/hosts/distros').then(response => {
          this.operatingSystems = response.data.data;
        }).catch(error => {
          if (error.statusCode() === 500) {
            router.push('Home');
          }
        });
      }
    },

    components: {},


  };
</script>