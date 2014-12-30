# PHP Host Versions

As a PHP developer, we are often stuck with hosts that support insanely old versions of PHP. This means that some
projects end up supporting those insanely old versions, and we all get stuck in this "Mexican Standoff" situation.

Some developers force their requirements to be much higher than these default versions in a bid to force the hosting
companies to upgrade, but in reality we just end up with people reducing their software to try and get it onto old 
servers.

Let's stop this cycle. Pick a host which supports the latest versions.

Host                         |  5.2  |  5.3  |  5.4  |  5.5  |  5.6  | Default?  | Manual Upgrade | Auto Upgrade
---------------------------- | ----- | ----- | ----- | ----- | ----- | --------- | -------------- | ------------
[1&1]                        |   -   |   -   |   -   |  .20  | .??-beta | 5.5.20 |                | 
[Bluehost (shared)]          |  .??  |  .??  |  .??  |   -   |   -   | 5.4.??    |                | 
[Crucial (Split Shared)]     |   -   |  .29  |  .36  |  .20  |  .4   | 5.3.29    |                | 
[Cyon.ch]                    |   -   |   -   |  .??  |  .??  |  .??  | 5.??.??   |                | 
[Dreamhost]                  |   -   |  .27  |  .20  |  .17  |  .0   | 5.4.20    |                | 
[Gandi (Simple Hosting)]     |   -   |   -   |  .35  |   -   |   -   | 5.4.35    |                | 
[GoDaddy (cPanel for Linux)] |   -   |  .??  |  .??  |  .??  |   -   | 5.5.??    | Yes            | 
[Google App Engine]          |   -   |   -   |  .??  |   -   |   -   | 5.4.??    |                |
[Heroku]                     |   -   |   -   |   -   |  .20  |  .4   | 5.6.4     | Yes            | 
[HostEurope]                 |   -   |  .29  |  .36  |   -   |   -   | 5.3.29    |                | 
[HostGator (shared)]         |  .17  |  .28  |  .35  |  .19  |   -   | 5.4.35    |                | Yes
[Hostmonster]                |  .??  |   -   |  .??  |   -   |   -   | 5.4.??    |                | 
[MediaTemple (GS)]           |   -   |  .29  |   -   |  .18  |   -   | 5.3.29    |                | 
[Namecheap]                  |  .??  |  .??  |  .??  |  .??  |   -   | 5.3.??    |                | 
[ServerGrove]                |  .??  |  .29  |  .??  |  .16  |   -   | 5.5.16    |                | 
[Site5]                      |  .17  |  .29  |  .35  |   -   |   -   | 5.3.29    |                | 
[OVH]                        |  .17  |  .29  |  .34  |  .18  |  .2   | 5.4.34    |                | 


[1&1]: http://www.1and1.com/web-hosting#info-list
[Bluehost (shared)]: http://www.bluehost.com/shared
[Crucial (Split Shared)]: http://www.crucialwebhost.com/hosting/split-shared/
[Cyon.ch]: http://www.cyon.ch/webhosting/#shared-2
[Dreamhost]: http://www.dreamhost.com/hosting/shared/
[Gandi (Simple Hosting)]: https://www.gandi.net/hebergement/simple?language=php&db=mysql
[GoDaddy (cPanel for Linux)]: https://www.godaddy.com/hosting/web-hosting.aspx?isc=hos1gbr21&ci=9009
[Google App Engine]: https://cloud.google.com/appengine/
[Heroku]: https://devcenter.heroku.com/articles/php-support#php-runtimes
[HostEurope]: https://www.hosteurope.de/en/
[HostGator (shared)]: http://www.hostgator.com/shared
[Hostmonster]: https://www.hostmonster.com/
[MediaTemple (GS)]: http://mediatemple.net/webhosting/shared/
[Namecheap]: https://www.namecheap.com/hosting/shared.aspx
[ServerGrove]: http://servergrove.com/sharedhosting
[Site5]: http://www.site5.com/hosting/web/#programming_languages
[OVH]: https://www.ovh.ie/web-hosting/

## Contributing

Send a PR with information about hosting companies, listing which versions of PHP they support, and which version
is installed by default when new plans are created. If you do not know the exact patch version then use `.??`, but please try to contribute exact numbers if possible.

Try to focus on shared hosting not DIY dedicated servers where it's just down to whatever the distro feels like bundling by default.

Please ensure that hosting company names are in alphabetical order.

## TODO 

As well as updating any `??` in that table, I also want to get numbers for these folks. 

* Infomaniak
* Linode
* LiquidWeb
* ManageWP
* online.net
* Rackspace
* SiteGround
* WPengine
* Active24.cz

When this gets a bit further I'll turn it into a website. Ideas for the domain name on the back of a postcard.
