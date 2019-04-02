<style lang='scss' scoped>

</style>
<template>
    <td class="font-sans tracking-wide font-light">
        <div>{{ hasVersion }}</div>
    </td>
</template>
<script>
  import axios from 'axios';

  export default {
    props: ['host', 'version'],

    data() {
      return {
        semver: null,
        eolVersions: [],
      };
    },

    computed: {
      // rename this
      hasVersion() {
        
      },
    },
  };
</script>