<style lang='scss' scoped>

</style>
<template>
    <div>
        <p class="font-sans tracking-wide text-grey-darker leading-normal pb-4 font-2xl">Don't get stuck on crap old versions of PHP just because your host does not support it. Keep using the newest version, and if you gotta switch... maybe you gotta switch.</p>
        <div class="flex content-start flex-wrap pb-8">
            <div class="w-1/4 p-2 bg-pink-lighter">
                <div class="text-grey-darker text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Shared Hosting</h2></div>
                <div class="font-sans text-grey-darker text-center p-4 tracking-wide tracking-wide leading-normal">
                    Need a standard bit of web hosting? Something all set up for you and you just gotta throw your code up there?</div>
                <div class="font-sans text-grey-darker text-center p-2 tracking-wide tracking-wide leading-normal">
                    Maybe a bit of SSH, but just a bit? Take a look at these.</div>
            </div>
            <div class="w-1/4 p-2 bg-indigo-lighter">
                <div class="font-sans text-grey-darker text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">PaaS</h2></div>
                <div class="font-sans text-grey-darker text-center p-4 tracking-wide tracking-wide leading-normal">Gotta get that Git-push fancy goodness, with simple addons?</div>
                <div class="font-sans text-grey-darker text-center p-2 tracking-wide tracking-wide leading-normal">Heroku started a trend years ago, and now we have a lot of Platform-as-a-Service systems that take minimal effort to get working.</div>
            </div>
            <div class="w-1/4 p-2 bg-teal-lighter">
                <div class="text-grey-darker text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Managed Hosting</h2></div>
                <div class="font-sans text-grey-darker text-center p-4 tracking-wide leading-normal">Not interested in managing servers yourself?</div>
                <div class="font-sans text-grey-darker text-center p-2 tracking-wide leading-normal">Managed hosting providers will keep your server and software up-to-date for you.</div>
            </div>
            <div class="w-1/4 p-2 bg-blue-lighter">
                <div class="text-grey-darker text-center p-2"><h2 class="font-sans tracking-wide text-white font-light font-3xl">Operating Systems</h2></div>
                <div class="font-sans text-grey-darker text-center p-4 tracking-wide leading-normal">Want to know which Linux distribution or OS X version come with what version of PHP?</div>
                <div class="font-sans text-grey-darker text-center p-2 tracking-wide leading-normal">Sure, you can upgrade the version, but some folks don't know how, so maybe starting out right is a good move.</div>
            </div>
        </div>
        <div>
            <h2 class="font-sans tracking-wide text-grey-darker font-bold font-3xl pb-4">FAQ</h2>

            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold">I work for a hosting company that isn't on here, can we get listed?</span>
                Sure why not! Shout at @matthewtrask on Twitter, or send a pull request to the GitHub repo.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold">Where do you get the data from?</span>
                This used to be entirely manual, which was a horrendous to keep up to date. Now we parse phpinfo() on public URLs that hosts make available, like this:
                <br><br/>
                <span class="pt-4 pb-4 italic">http://php70.webhosting.be/phpinfo.php</span>
                <br><br>
                Not all hosts have them so some are still entirely manual. Either way, sending us patch version changes, changes in the default versions, or new public phpinfo URLs can be done via updating hosts.yml.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold">How do I contribute?</span>
                Read the contributing guide on GitHub.
            </p>
            <p class="pb-4 font-sans text-grey-darker tracking-wide">
                <span class="font-bold">Do you intend to implement X or Y?</span>
                I have a bit of a todo list, and I would love help if you're bored.
            </p>
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
      return {

      };
    },

    methods: {},

    components: {},
  };
</script>