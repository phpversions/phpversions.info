<style lang='scss' scoped>

</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">PHP Vulnerabilities</h2>
        <p class="font-sans tracking-wide font-light pb-4">PHP has had its share of vulnerabilities pop up. Check back here as we update this daily.</p>
        <input class="mb-4 w-1/5 shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Search CVEs" v-model="search">
        <table class="w-full table-auto">
            <thead>
            <tr>
                <th class="text-left font-sans tracking-wide font-light text-2xl w-1/5">CVE ID</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-4 w-1/6">Threat</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-4 w-2/3">Summary</th>
                <th class="text-left font-sans tracking-wide font-light text-2xl pr-4 w-1/3">Patched Versions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="vulnerability in mostRecentVulernabilities" class="pb-4">
                <td class="font-sans tracking-wide font-light " ><a :href="vulnerability.cveLink" class="no-underline" target="_blank">{{ vulnerability.cveId }}</a></td>
                <td class="font-sans tracking-wide font-light text-red" v-if="vulnerability.threat >= 7">{{ vulnerability.threat }}</td>
                <td class="font-sans tracking-wide font-light text-orange-dark" v-if="vulnerability.threat >= 4 && vulnerability.threat < 7">{{ vulnerability.threat }}</td>
                <td class="font-sans tracking-wide font-light text-yellow-dark" v-if="vulnerability.threat < 4">{{ vulnerability.threat }}</td>
                <td class="font-sans tracking-wide font-light">{{ vulnerability.summary }}</td>
                <td class="font-sans tracking-wide font-light">{{ vulnerability.versions }}</td>
            </tr>
            </tbody>
        </table>
        <div class="inline-block w-2/3" v-if="mostRecentVulernabilities.length > 10">
            <ul class="list-reset">
                <li v-if="currentPage > 1" class="inline-block w-16"><p class="cursor-pointer font-sans tracking-wide font-light pb-4" @click.prevent="getPreviousPage">< Prev</p></li>
                <li class="inline-block w-16"><p class="font-sans tracking-wide font-light pb-4">Page {{ currentPage }}</p></li>
                <li class="inline-block w-16"><p class="cursor-pointer font-sans tracking-wide font-light pb-4" @click.prevent="getNextPage">Next ></p>
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import { orderBy } from 'lodash';

  export default {
    created() {
        this.getVulnerabilities();
    },

    mounted() {

    },

    computed: {
      mostRecentVulernabilities() {
        if (this.search === '') {
          return orderBy(this.vulnerabilities, ['cveId'], ['desc']);
        } else {
          return this.vulnerabilities.filter(vulnerability => {
            return vulnerability.summary.toLowerCase().includes(this.search.toLowerCase());
          })
        }
      }
    },

    data() {
      return {
        vulnerabilities: [],
        links: [],
        currentPage: 1,
        lastPage: '',
        search: '',
      };
    },

    watch: {
      search() {
        if (this.search.length > 1) {
          this.searchRequest(this.search);
        } else {
          this.getVulnerabilities();
        }
      },
    },

    methods: {
      getVulnerabilities() {
        axios.get('/api/vulnerabilities').then(response => {
          this.vulnerabilities = response.data.data;
          this.links = response.data.meta.pagination.links;
        }).catch(err => {
          console.log(err);
        });
      },

      getPreviousPage() {
        axios.get(this.links.previous).then(response => {
          this.vulnerabilities = response.data.data;
          this.links = response.data.meta.pagination.links;
          this.currentPage = this.currentPage - 1;
        }).catch(err => {
          console.log(err);
        });
      },

      getNextPage() {
        axios.get(this.links.next).then(response => {
          this.vulnerabilities = response.data.data;
          this.links = response.data.meta.pagination.links;
          this.currentPage = this.currentPage + 1;
        }).catch(err => {
          console.log(err);
        });
      },
    },

    components: {},
  };
</script>