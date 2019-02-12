# phpversions

## Development

Run the following commands to get a copy of the site up-and-running on your local machine:

```bash
composer install -o
npm install
cp Homestead.yaml.example Homestead.yaml # Don't forget to edit the paths in this file!
cp .env.example .env
php artisan key:generate
vagrant up
```

Once inside of Vagrant, run:

```bash
cd code
php artisan migrate:fresh
php artisan import:hosts
php artisan import:operating-systems
php artisan cve:check
```

You can now access the site at <http://phpversions.test>!
