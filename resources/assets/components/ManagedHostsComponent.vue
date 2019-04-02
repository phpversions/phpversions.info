<style lang='scss' scoped>
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Managed Hosting</h2>
        <input class="mb-4 w-1/5 shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Search Hosts" v-model="search">
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left font-sans tracking-wide font-light text-2xl">Host</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Last Scanned</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Default Version</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Supported Versions</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Security Versions</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">EOL Versions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="host in hosts">
                <td class="font-sans tracking-wide font-light pb-2">{{ host.host }}</td>
                <td class="font-sans tracking-wide font-light">{{ host.scannedAt|date }}</td>
                <td class="font-sans tracking-wide font-light">{{ host.default }}</td>
                <td class="font-sans tracking-wide font-light text-green">{{ host.events.data[0].supportedVersions | string }}</td>
                <td class="font-sans tracking-wide font-light text-yellow-dark">{{ host.events.data[0].securityVersions | string }}</td>
                <td class="font-sans tracking-wide font-light text-red">{{ host.events.data[0].eolVersions | string }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';
  import VersionCheck from './VersionCheckComponent.vue';

  export default {
    metaInfo: {
      title: 'PHPVersions.info',
      templateTitle: '%s | Managed Hosts',
      meta: [
          { charset: 'utf-8' },
          { name: 'viewport', content: 'width=device-width, initial-scale=1' }
      ],
      links: [
        {rel: 'canonical', href: 'https://phpversions.info/managed-hosts'}
      ],
      htmlAttrs: {
        lang: 'en',
      },
    },
    created() {
      this.getSharedHosts();
    },

    computed: {
      searchedHosts() {
        return this.hosts.filter(host => {
          return host.host.toLowerCase().includes(this.search.toLowerCase());
        });
      },
    },

    data() {
      return {
        search: '',
        hosts: [],
      };
    },

    methods: {
      getSharedHosts() {
        return axios.get('/api/hosts/managed').then(response => {
          this.hosts = response.data.data;
        }).catch(error => {
          if (error.statusCode() === 500) {
            router.push('Home');
          }
        });
      }
    },

    components: {
      VersionCheck
    },

    filters: {
      date(value) {
        return moment(value.date).format('M-d-YYYY');
      },

      string(value) {
        return value.toString();
      }
    }
  };
</script>