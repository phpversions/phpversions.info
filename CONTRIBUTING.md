## Contributing

We use Jekyll for this, which yep, trollolol is Ruby I know. We did this because hosting on GitHub Pages is easy, but comically enough now that we use custom plugins we've had to build it from `master` and push the HTML to `gh-pages`, making that decision rather pointless.

## Getting Started

* [Install](http://jekyllrb.com/docs/installation/) the `jekyll` gem
* Read up about its [Usage](http://jekyllrb.com/docs/usage/) and [Configuration](http://jekyllrb.com/docs/configuration/)
* Run the server locally with `jekyll serve` which will watch for changes by default

## Our Custom Data

Send a PR adding or updating records in `./data/`, listing which versions of PHP they support, and which
version is installed by default when new plans are created.

### Hosts

You can add and update hosts by editing the `./data/hosts.yml` file, which is written in [YAML](http://www.yaml.org/).

The format looks like this:

```
-
    name: 'ACME Hosting'
    url: 'https://www.example.com/hosting'
    type: shared
    default: 72
    versions:
        56:
            phpinfo: null
            patch: 36
            version: 5.6.36
            semver: 5.6.36
        71:
            phpinfo: null
            patch: 9
            version: 7.1.9
            semver: 7.1.9
        72:
            phpinfo: null
            patch: 0
            version: 7.2.0
            semver: 7.2.0
        73:
            phpinfo: null
            patch: 0
            version: 7.3.0
            semver: 7.3.0
```

The `name` field is the name of the hosting company as you'd like it to show to humans. We'll auto-escape any special HTML characters don't worry. 

The you have `type`, which can be `shared`, `managed` or `paas`. If you provide multiple, make multiple host entries, and change the name to contain "Shared" at the end or something logical like that.

The remaining stuff is `default`, which points to one of the `versions` below. Here are the supported versions:

- 56
- 70
- 71
- 72
- 73

Probably don't bother listing PHP 5.x versions because we'll probably remove them soon, _as should you as any sort of responsible hosting company!_ :) 

Moving forward, we will try to remove anything under 5.6. This is supposed to be a list of current versions :)

The version information should contain the patch number, which in PHP 7.0.4 would be `4`. In that example `semver` would be `7.0.4` and so - hopefully - it would be for version. I say hopefully because some nutty hosts supply their own custom builds of PHP, which sometimes contain security patches but generally are a really bad idea and a headache. Either way, if you have something like `5.6.18-1~he.0` then that is what you put in `version`. 

If you provide us with a `phpinfo` URL [like this](http://php56.hosteurope-infos.de/phpinfo.php) we'll be able to automatically update your patch versions, and you'll only ever need to come back to add a new major/minor version (PHP 7.2) or change your default. That doesn't happen often, so shouldn't be too much of a hardship.

If you leave phpinfo blank, we might mark you as having an insecure version of PHP on your website, which might not look great. If you want to password protect your phpinfo URLs or provide us with a secret one then get in touch, and we can sort that out. 

### Operating Systems

We store operating system data in `./data/operating_systems.yml` surprisingly enough. :D

```
-
    name: 'CentOS 7'
    family: linux
    distro: centos
    version: 5.4.16
    semver: 5.4.16
    patch: 16
```

Similar sort of thing. Shove anyting you want in family/distro at this point, it's not important. We'll standardize it and add icons or something flashy sometime.

These versions should be _what is available in the standard official repository_, no third-party stuff, no hacking your sources, no bleeding edge nonsense, etc. Just normal, official, stable stuff. 
