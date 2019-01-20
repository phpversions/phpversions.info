<style lang='scss' scoped>

</style>
<template>
    <div>
        <div class="pb-8">
            <small class="font-sans tracking-wide font-light pb-8">
                <router-link :to="{ name: 'Posts' }">
                    Back To Posts
                </router-link>
            </small>
            <h2 class="font-sans tracking-wide font-light text-2xl pb-4">{{ post.title }}</h2>
            <p class="font-sans tracking-wide font-light pb-4"><small>Author: {{ post.author }}</small> | <small>Published At: {{ post.publishedAt|date }}</small></p>
            <p class="font-sans tracking-wide font-light pb-4">{{ post.headline}}</p>
            <p class="font-sans tracking-wide font-light pb-4">{{ post.post }}</p>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';
  import moment from 'moment';

  export default {
    created() {

    },

    mounted() {
      this.getPost();
    },

    data() {
      return {
        post: [],
      };
    },

    metaInfo() {
      return {
        title: `${this.post.title} | PhpVersions.org`,
        meta: [
          { charset: 'utf-8' },
          { name: 'viewport', content: 'width=device-width, initial-scale=1' },
          {
            'property': 'og:title',
            'content': `${this.post.title}`,
            'template': chunk => `${chunk} - Blog`, //or as string template: '%s - My page',
            'vmid': 'og:title'
          }
        ],
        links: [
          {rel: 'canonical', href: `https://phpversions.info/blog/${this.post.title}`}
        ],
        htmlAttrs: {
          lang: 'en',
        }
      };
    },

    methods: {
      getSlug() {
        return this.$route.params.slug;
      },

      getPost() {
        axios.get(`/api/blog/posts/${this.getSlug()}`).then(response => {
          this.post = response.data.data;
        }).catch(error => {
          console.log(error);
        })
      }
    },

    filters: {
      date(value) {
        return moment(value.date).format('MMM Do YYYY');
      }
    },

    components: {},
  };
</script>