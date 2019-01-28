<style lang='scss' scoped>

</style>
<template>
    <div>
        <div class="pb-8">
            <h2 class="font-sans tracking-wide font-light text-4xl pb-4">Blog</h2>
            <p class="font-sans tracking-wide font-light pb-4">Our way to muse about the state of hosting, what is going on with the project and what is going on in the community.</p>
            <div v-for="post in posts">
                <div class="pt-4 pb-4">
                    <h2 class="font-sans tracking-wide font-light text-2xl pb-4">{{ post.title }}</h2>
                    <p class="font-sans tracking-wide font-light pb-4">
                        <small>Author: {{ post.author }}</small> |
                        <small>Published At: {{ post.publishedAt|date }}</small> |
                        <small>Reading Time: {{ post.readTime }} mins</small>
                    </p>
                    <p class="font-sans tracking-wide font-light pb-4">{{ post.headline}}</p>
                    <router-link :to="{ name: 'Post', params: { slug: post.slug }}" class="no-underline text-white">
                        <button class="bg-logo-dark hover:bg-logo-darker text-white font-bold py-2 px-4 rounded">
                            Read More
                        </button>
                    </router-link>
                </div>
            </div>
            <div class="inline-block w-2/3" v-if="posts.length > 5">
                <ul class="list-reset">
                    <li v-if="currentPage > 1" class="inline-block w-16"><p class="cursor-pointer font-sans tracking-wide font-light pb-4" @click.prevent="getPreviousPage">< Prev</p></li>
                    <li class="inline-block w-16"><p class="font-sans tracking-wide font-light pb-4">Page {{ currentPage }}</p></li>
                    <li class="inline-block w-16"><p class="cursor-pointer font-sans tracking-wide font-light pb-4" @click.prevent="getNextPage">Next ></p></li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';
  import readTime from 'reading-time';

  export default {
    created() {

    },

    mounted() {
      this.getPosts();
    },

    data() {
      return {
        posts: [],
        links: [],
        currentPage: 1,
        lastPage: '',
        search: '',
      };
    },

    methods: {
      getPosts() {
        axios.get('/api/blog/posts').then(response => {
          this.posts = response.data.data;
          this.links = response.data.meta.pagination;
        }).catch(error => {
          console.log(error);
        });
      },

      getPreviousPage() {
        axios.get(this.links.previous).then(response => {
          this.posts = response.data.data;
          this.links = response.data.meta.pagination.links;
          this.currentPage = this.currentPage - 1;
        }).catch(err => {
          console.log(err);
        });
      },

      getNextPage() {
        axios.get(this.links.next).then(response => {
          this.posts = response.data.data;
          this.links = response.data.meta.pagination.links;
          this.currentPage = this.currentPage + 1;
        }).catch(err => {
          console.log(err);
        });
      },
    },

    filters: {
      date(value) {
        return moment(value.date).format('MMM Do YYYY');
      }
    },

    components: {},
  };
</script>