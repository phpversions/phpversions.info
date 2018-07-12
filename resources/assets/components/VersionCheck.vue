<style lang='scss' scoped>

</style>
<template>
    <td class="font-sans tracking-wide font-light">
        <div v-if="hasVersion" class="fa fa-check">CHECK</div>
    </td>
</template>
<script>
  import axios from 'axios';

  export default {
    props: ['host', 'version'],

    computed: {
      hasVersion() {
        debugger;
      }
    },


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