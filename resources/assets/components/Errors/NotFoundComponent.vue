<style lang='scss' scoped>

</style>
<template>
    <div>
        <div class="pb-4">
            <h1 class="font-sans font-light tracking-wide text-5xl pb-2 text-center">Oh No!</h1>
            <div>
                <p class="tracking-wide font-light font-sans text-center pb-4 pt-4">
                    You seemed to have stumbled on a link that doesn't go anywhere.
                </p>
                <p class="tracking-wide font-light font-sans text-center">
                   To go back home: <router-link :to="{ path: '/' }">Click Here</router-link>
                </p>
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

    },

    data() {
      return {};
    },

    methods: {},

    components: {},
  };
</script>