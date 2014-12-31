# PHP Versions

As a PHP developer, we are often stuck with hosts that support insanely old versions of PHP. This means that some
projects end up supporting those insanely old versions, and we all get stuck in this "Mexican Standoff" situation.

Some developers force their requirements to be much higher than these default versions in a bid to force the hosting
companies to upgrade, but in reality we just end up with people reducing their software to try and get it onto old 
servers.

Let's keep close tabs on who is offering which versions of PHP, so we can help those less in the know find 
good companies to host their stuff on.

## Contributing

Send a PR adding or updating records in `./data/hosts.yml`, listing which versions of PHP they support, and which 
version is installed by default when new plans are created. 

If you do not know the exact patch version then use `??`, but please try to contribute exact numbers if possible.

Try to focus on shared hosting not DIY dedicated servers where it's just down to whatever the distro feels like
bundling by default.

Please ensure that hosting company names are in alphabetical order.

## TODO 

As well as updating any `??` in that data file, I also want to get numbers for these folks. 

* Infomaniak
* Linode
* LiquidWeb
* ManageWP
* online.net
* Rackspace
* SiteGround
* WPengine
* Active24.cz
