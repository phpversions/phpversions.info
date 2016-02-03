## Contributing

We use Jekyll for this, which yep, trollolol is Ruby I know. We did this because hosting on GitHub Pages is easy, but comically enough now that we use custom plugins we've had to build it from `master` and push the HTML to `gh-pages`, making that decision rather pointless.

## Getting Started

* [Install](http://jekyllrb.com/docs/installation/) the `jekyll` gem
* Read up about its [Usage](http://jekyllrb.com/docs/usage/) and [Configuration](http://jekyllrb.com/docs/configuration/)
* Run the server locally with `jekyll serve` which will watch for changes by default

## Our Custom Data

Send a PR adding or updating records in `./data/`, listing which versions of PHP they support, and which
version is installed by default when new plans are created.

Keep in mind, if the value of any versions `phpinfo` is a URL (not `null`) then whatever number you put in will be overridden. We used to ask for version numbers manually, but we're trying to switch towards automation now, so getting us a phpinfo URL would be the most useful thing to do.

We use a semver-based sorting algorithm as PHP has been semver-ish for a while now. That means if the numbers you put into `default` are not proper [SemVer](http://semver.org/), then it'll fall over.

Please ensure that hosting company names are in alphabetical order, and look out for duplicates by updating your branch before you commit. Send a pull request when it's done.
