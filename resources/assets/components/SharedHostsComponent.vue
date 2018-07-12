<style lang='scss' scoped>

</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Shared Hosting</h2>
        <p class="font-sans tracking-wide font-light pb-4"> Shared hosting is the most common type of hosting. It means that multiple websites owned by various people are all jammed onto the same server. These are often the slowest to update PHP versions because of the potential for breaking many sites. Still, manual upgrade options should be offered to move from one PHP version to another, and automatic updates at the patch level (0.0.X) should be provided.</p>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-sans tracking-wide font-light text-2xl">Host</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Last Scanned</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Default Version</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">7.2</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">7.1</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">7.0</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">EOL</th>
                </tr>
            </thead>
            <tbody>
            <tr><td>DAFU</td></tr>
                <tr v-for="host in hosts">
                    <td class="font-sans tracking-wide font-light pb-2">{{ host.host }}</td>
                    <td class="font-sans tracking-wide font-light">{{ host.scannedAt|date }}</td>
                    <VersionCheck :host="host" :version="7.2" />
                    <VersionCheck :host="host" :version="7.1" />
                    <VersionCheck :host="host" :version="7.0" />
                    <td class="font-sans tracking-wide font-light">{{ host.events.data[0].semver }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';
  import VersionCheck from './VersionCheck.vue';

  export default {
    created() {
      this.getSharedHosts();
    },

    mounted() {

    },
    data() {
      return {
        hosts: [],
      };
    },

    methods: {
      getSharedHosts() {
        return axios.get('/api/hosts/shared').then(response => {
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
      }
    }
  };
</script>