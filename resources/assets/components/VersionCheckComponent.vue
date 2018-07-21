<style lang='scss' scoped>

</style>
<template>
    <td class="font-sans tracking-wide font-light">
        <div>{{ hasVersion }}</div>
    </td>
</template>
<script>
  import axios from 'axios';
  import { truncate } from 'lodash';

  export default {
    props: ['host', 'version'],

    computed: {
      hasVersion() {
        let eolVersions = [];
        this.host.events.data.forEach(event => {
          let semver = event.semver.slice(0, 3);
          if (typeof this.version === 'number') {
            console.log(semver, this.version);
            if (semver == this.version) {
              eolVersions =  event.semver;
            } else {
              eolVersions = 'X';
            }
          } else {
            if (this.version.includes(semver)) {
              eolVersions.push(event.semver);
            }
          }
        });
        if (typeof eolVersions === 'object') {
          return eolVersions.join(' ');
        }

        return eolVersions;
      },
    },
  };
</script>