<style lang='scss' scoped>

</style>
<template>
    <div>
        <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Contributors</h2>
        <p class="font-sans p-4 tracking-wide leading-normal">This project wouldn't be what it is today without the help of these contributors. They have helped us collect data, keep it up to date and make sure others know what platforms are offering for today.</p>
        <input class="mb-4 w-1/5 shadow appearance-none border rounded py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="Search Contributors" v-model="search">
        <div class="flex flex-wrap">
            <div class="flex-1 w-1/5 flex-none p-2" v-for="contributor in searchedContributors">
                <div class="bg-logo-dark mx-auto shadow-lg rounded-lg overflow-hidden">
                    <div class="sm:items-center px-6 py-4">
                        <img class="block h-16 sm:h-24 rounded-full mx-auto mb-4 sm:mb-0 mr-auto ml-auto" :src="contributor.image" :alt="contributor.name">
                        <div class="text-center sm:text-left sm:flex-grow">
                            <div class="mb-4">
                                <p class="text-center text-xl leading-tight font-sans tracking-wide ">{{ contributor.user }}</p>
                            </div>
                            <div class="text-center">
                                <a :href="contributor.repo" accesskey="1">
                                    <button class="text-xs text-center font-sans tracking-wide font-semibold rounded-full px-4 py-1 leading-normal bg-white hover:border hover:border-white border border-logo-dark text-logo-dark hover:bg-logo-dark hover:text-white">Github</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    created() {

    },

    mounted() {
      this.getContributors();
    },

    computed: {
      searchedContributors() {
        return this.contributors.filter(contributor => {
          return contributor.user.toLowerCase().includes(this.search.toLowerCase());
        });
      },
    },

    data() {
      return {
        search: '',
        contributors: [],
      };
    },

    methods: {
      getContributors() {
        axios.get('/api/contributors').then(response => {
          this.contributors = response.data.data;
        }).catch(error => {
          console.log(error);
        })
      }
    },

    components: {},
  };
</script>