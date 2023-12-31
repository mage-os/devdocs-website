## Mage-OS DevDocs Website

This is the source of the official [Mage-OS DevDocs Website](https://devdocs.mage-os.org).

## Contribute to the Documentation

If you want to curate, edit, add or change content on the documentation, please go
to [the Mage-OS DevdDocs Repository](https://github.com/mage-os/devdocs).

## Local Development
The website is build with Laravel. **A database is not required**. You can run the website locally with the following
commands:

```bash
git clone git@github.com:mage-os/devdocs-website.git devdocs-website
cd devdocs-website
bash bin/setup.sh
```

Next, you need to compile the assets and start the server:

```bash
npm run dev
php artisan serve
```

Now add the documentation itself;

```
bash bin/checkout_latest_docs.sh
```

There is no container based setup. There are plenty of different setups out there, so we leave it up to you to choose
your favorite one. If you want a docker-based setup, [Laravel's Sail](https://laravel.com/docs/10.x/sail) might be an 
option for you. 

### Torchlight Integration

This project relies on Torchlight for syntax highlighting. You will need to create an account
at [torchlight.dev](https://torchlight.dev/) and generate a free personal token for use in this project. If you used 
the `bin/setup.sh` script to setup the project, the token is in your .env file. If not, add the following line to your
.env file manually:

```ini
TORCHLIGHT_TOKEN=your-torchlight-token
```

### Syncing Upstream Changes Into Your Fork

This [GitHub article](https://help.github.com/en/articles/syncing-a-fork) provides instructions on how to pull the
latest changes from this repository into your fork.

### Updating After Remote Code Changes

If you pull down the upstream changes from this repository into your local repository, you'll want to update your
Composer and NPM dependencies, as well as update your documentation branches. For convenience, you may run
the `bin/update.sh` script to update these things:

```bash
./bin/update.sh
```
