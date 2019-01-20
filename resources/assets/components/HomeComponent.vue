<style lang='scss' scoped>

</style>
<template>
    <div>
        <p class="font-sans tracking-wide text-grey-darker leading-normal pb-4 font-2xl">Don't get stuck on crap old versions of PHP just because your host does not support it. Keep using the newest version, and if you gotta switch... maybe you gotta switch.</p>
        <div class="flex content-start flex-wrap mb-8 shadow-md">
            <div class="w-1/4 p-2 bg-pink no-decoration hover:bg-pink-dark">
                <router-link :to="{ path: '/shared-hosts' }" class="no-underline hover:text-white">
                    <div class="font-sans text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Shared Hosting</h2></div>
                    <div class="font-sans text-white text-center p-4 tracking-wide tracking-wide leading-normal">Need a standard bit of web hosting? Something all set up for you and you just gotta throw your code up there?</div>
                    <div class="font-sans text-white text-center p-2 tracking-wide tracking-wide leading-normal">Maybe a bit of SSH, but just a bit? Take a look at these.</div>
                </router-link>
            </div>
            <div class="w-1/4 p-2 bg-indigo no-decoration hover:bg-indigo-dark">
                <router-link :to="{ path: '/paas-hosts' }" class="no-underline hover:text-white">
                    <div class="font-sans text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">PaaS</h2></div>
                    <div class="font-sans text-white text-center p-4 tracking-wide tracking-wide leading-normal">Gotta get that Git-push fancy goodness, with simple addons?</div>
                    <div class="font-sans text-white text-center p-2 tracking-wide tracking-wide leading-normal">Heroku started a trend years ago, and now we have a lot of Platform-as-a-Service systems that take minimal effort to get working.</div>
                </router-link>
            </div>
            <div class="w-1/4 p-2 bg-logo-dark no-decoration hover:bg-logo-darker">
                <router-link :to="{ path: '/managed-hosts' }" class="no-underline hover:text-white">
                    <div class="font-sans text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Managed Hosting</h2></div>
                    <div class="font-sans text-white text-center p-4 tracking-wide leading-normal">Not interested in managing servers yourself?</div>
                    <div class="font-sans text-white text-center p-2 tracking-wide leading-normal">Managed hosting providers will keep your server and software up-to-date for you.</div>
                </router-link>
            </div>
            <div class="w-1/4 p-2 bg-blue no-decoration hover:bg-blue-dark">
                <router-link :to="{ path: '/operating-systems' }" class="no-underline hover:text-white">
                    <div class="font-sans text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Operating Systems</h2></div>
                    <div class="font-sans text-white text-center p-4 tracking-wide leading-normal">Want to know which Linux distribution or OS X version come with what version of PHP?</div>
                    <div class="font-sans text-white text-center p-2 tracking-wide leading-normal">Sure, you can upgrade the version, but some folks don't know how, so maybe starting out right is a good move.</div>
                </router-link>
            </div>
        </div>
        <div>
            <h2 class="font-sans tracking-wide text-grey-darker font-bold font-3xl pb-4">FAQ</h2>

            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold pb-2">I work for a hosting company that isn't on here, can we get listed?</span><br>
                Sure why not! Shout at <a href="https://twitter.com/matthewtrask">@matthewtrask</a> on Twitter, or send a pull request to the GitHub repo.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold pb-2">Where do you get the data from?</span><br>
                This used to be entirely manual, which was a horrendous to keep up to date. Now we parse phpinfo() on public URLs that hosts make available, like this:
                <br><br/>
                <span class="pt-4 pb-4 italic">http://php70.webhosting.be/phpinfo.php</span>
                <br><br>
                Not all hosts have them so some are still entirely manual. Either way, sending us patch version changes, changes in the default versions, or new public phpinfo URLs can be done via updating hosts.yml.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold pb-2">How do I contribute?</span><br>
                Read the contributing guide on GitHub.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold pb-2">Do you intend to implement X or Y?</span><br>
                I have a bit of a todo list, and I would love help if you're bored.
            </p>
        </div>
    </div>
</template>
<script>
  import axios from 'axios';

  export default {
    metaInfo: {
      title: 'PHPVersions.info',
      meta: [
          { charset: 'utf-8' },
          { name: 'viewport', content: 'width=device-width, initial-scale=1' }
      ],
      links: [
        {rel: 'canonical', href: 'https://phpversions.info'}
      ],
      htmlAttrs: {
        lang: 'en',
      },
    },

    created() {

    },

    mounted() {

    },

    data() {
      return {

      };
    },

    methods: {},

    components: {},
  };
</script>