## Contributing

We use Jekyll for this, which yep, trollolol is Jekyll. This is done purely because GitHub Pages isis free and easy, and who cares.

## Getting Started

* [Install](http://jekyllrb.com/docs/installation/) the `jekyll` gem
* Read up about its [Usage](http://jekyllrb.com/docs/usage/) and [Configuration](http://jekyllrb.com/docs/configuration/)
* Run the server locally with `jekyll serve` which will watch for changes by default

## Our Custom Data

Send a PR adding or updating records in `./data/shared_hosts.yml`, listing which versions of PHP they support, and which 
version is installed by default when new plans are created. 

If you do not know the exact patch version then use `??`, but please try to contribute exact numbers if possible.

Try to focus on shared hosting not DIY dedicated servers where it's just down to whatever the distro feels like
bundling by default.

Please ensure that hosting company names are in alphabetical order.
