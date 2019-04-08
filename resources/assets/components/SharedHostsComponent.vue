<style lang='scss' scoped>
    tr:nth-child(even) {
        background-color: #f2f2f2
    }
</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Shared Hosting</h2>
        <p class="font-sans tracking-wide font-light pb-4"> Shared hosting is the most common type of hosting. It means that multiple websites owned by various people are all jammed onto the same server. These are often the slowest to update PHP versions because of the potential for breaking many sites. Still, manual upgrade options should be offered to move from one PHP version to another, and automatic updates at the patch level (0.0.X) should be provided.</p>
        <input class="mb-4 w-1/5 shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Search Hosts" v-model="search">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-sans tracking-wide font-light text-2xl">Host</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Last Scanned</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Default Version</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Latest Version</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Supported Versions</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Security Versions</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">EOL Versions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="host in searchedHosts">
                    <td class="font-sans tracking-wide font-light pb-2">{{ host.host }}</td>
                    <td class="font-sans tracking-wide font-light">{{ host.scannedAt|date }}</td>
                    <td class="font-sans tracking-wide font-light">{{ host.default }}</td>
                    <td class="font-sans tracking-wide font-light text-green">{{ host.events.data[0].latestVersion}}</td>
                    <td class="font-sans tracking-wide font-light text-green">{{ host.events.data[0].supportedVersion}}</td>
                    <td class="font-sans tracking-wide font-light text-yellow-dark">{{ host.events.data[0].securityVersion }}</td>
                    <td class="font-sans tracking-wide font-light text-red">{{ host.events.data[0].eolVersions | string }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
  import { sort }  from 'lodash';
  import axios from 'axios';
  import moment from 'moment';
  import VersionCheck from './VersionCheckComponent.vue';

  export default {
    created() {
      this.getSharedHosts();
    },

    computed: {
      searchedHosts() {
        return this.hosts.filter(host => {
          return host.host.toLowerCase().includes(this.search.toLowerCase());
        }).sort(host => {

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
        return axios.get('/api/hosts/shared').then(response => {
          this.hosts = response.data.data;
        }).catch(error => {
          console.log(error);
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