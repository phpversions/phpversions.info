## Contributing

We use Jekyll for this, which yep, trollolol is Jekyll. This is done purely because GitHub Pages isis free and easy, and who cares.

## Getting Started

* [Install](http://jekyllrb.com/docs/installation/) the `jekyll` gem
* Read up about its [Usage](http://jekyllrb.com/docs/usage/) and [Configuration](http://jekyllrb.com/docs/configuration/)
* Run the server locally with `jekyll serve` which will watch for changes by default

## Our Custom Data

Send a PR adding or updating records in `./data/shared_hosts.yml`, listing which versions of PHP they support, and which 
version is installed by default when new plans are created. 

We use a semver-based sorting algorithm as PHP has been semver-ish for a while now. That means if the numbers you put into `default` are not proper SemVer, then it'll fall over.

Please ensure that hosting company names are in alphabetical order, and look out for duplicates by updating your branch before you commit.
