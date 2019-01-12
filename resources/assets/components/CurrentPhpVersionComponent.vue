<style lang='scss' scoped>

</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">PHP {{ currentVersion }}</h2>
        <p class="font-sans tracking-wide font-light pb-4">PHP 7.2 is out! After maturing like a fine artisanal cheese in through months of release candidates, it's now officially released and heading to a server near you.</p>

        <p class="font-sans tracking-wide font-light pb-4">Upgrading from PHP 7.1 is really easy, and installing locally is explained over on <a href="https://phptherightway.com">PHP The Right Way: Getting Started</a>. If you're feeling a bit more adventurous, you can install from source to see some of the features coming in PHP 7.3</p>
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left font-sans tracking-wide font-light text-2xl">Host</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl pr-2">Version</th>
                    <th class="text-left font-sans tracking-wide font-light text-2xl">Last Scanned</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="host in hosts" class="border border-b-2 border-solid border-grey-dark">
                    <td class="font-sans tracking-wide font-light"><a :href="host.url">{{ host.host }}</a></td>
                    <td class="font-sans tracking-wide font-light pr-2">{{ host.currentVersionEvent.data.version }}</td>
                    <td class="font-sans tracking-wide font-light">{{ host.scannedAt|date }}</td>
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
      this.getCurrentPhpVersionHosts();
    },

    mounted() {

    },

    data() {
      return {
        currentVersion: 7.2,
        hosts: [],
      };
    },

    methods: {
      getCurrentPhpVersionHosts() {
        return axios.get('/api/versions/current').then(response => {
          this.hosts = response.data.data;
        }).catch(error => {
          if (error.statusCode() >= 500) {
            router.push('ServerErrorComponent');
          }

          if (error.statusCode() >= 400) {
            router.push('HomeComponent');
          }
        })
      }
    },

    components: {},

    filters: {
      date(value) {
        return moment(value.date).format('M-d-YYYY');
      }
    }
  };
</script>