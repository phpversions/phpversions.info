<style lang='scss' scoped>

</style>
<template>
    <div>

    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    created() {
      this.getHost();
    },

    mounted() {

    },

    data() {
      return {
        host: [],
      };
    },

    methods: {
      getHost() {
        axios.get(`/api/hosts/managed/${this.$route.params.slug}`).then(response => {
          this.host = response.data.data;
        }).catch(error => {
          console.error(error);
        })
      }
    },

    components: {},
  };
</script>