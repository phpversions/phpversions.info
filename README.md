# PHP Host Versions

As a PHP developer, we are often stuck with hosts that support insanely old versions of PHP. This means that some
projects end up supporting those insanely old versions, and we all get stuck in this "Mexican Standoff" situation.

Some developers force their requirements to be much higher than these default versions in a bid to force the hosting
companies to upgrade, but in reality we just end up with people reducing their software to try and get it onto old 
servers.

Let's stop this cycle.

Send a PR with information about hosting companies, listing which versions of PHP they support, and which version
is installed by default. 

Host                         |  5.2  |  5.3  |  5.4  |  5.5  |  5.6  | Default?
---------------------------- | ----- | ----- | ----- | ----- | ----- | --------
[1&1]                        |   -   |   -   |   -   |  .??  | .??-beta | 5.5.??
[Bluehost (shared)]          |  .??  |  .??  |  .??  |   -   |   -   | 5.4.??
[Crucial (Split Shared)]     |   -   |  .29  |  .36  |  .20  |  .4   | 5.3.29
[Cyon.ch]                    |   -   |   -   |  .??  |  .??  |  .??  | 5.??.??
[Dreamhosts]                 |   -   |  .27  |  .20  |  .17  |  .0   | 5.4.20
[GoDaddy (cPanel for Linux)] |   -   |  .??  |  .??  |  .??  |   -   | 5.5.??
[MediaTemple (GS)]           |   -   |  .29  |   -   |  .18  |   -   | 5.3.29

[1&1]: http://www.1and1.com/web-hosting#info-list
[Bluehost (shared)]: http://www.bluehost.com/shared
[Crucial (Split Shared)]: http://www.crucialwebhost.com/hosting/split-shared/
[Cyon.ch]: http://www.cyon.ch/webhosting/#shared-2
[Dreamhost]: http://www.dreamhost.com/hosting/shared/
[GoDaddy (cPanel for Linux)]: https://www.godaddy.com/hosting/web-hosting.aspx?isc=hos1gbr21&ci=9009
[MediaTemple (GS)]: http://mediatemple.net/webhosting/shared/

## Contributing

Please ensure that hosting company names are in alphabetical order.
