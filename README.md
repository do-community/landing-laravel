# Landing Laravel - A Links Landing Laravel Application

This application creates a links landing page where you can share relevant links to an audience.
Links are initially imported from a `links.yml` file in the root of the application, and can be managed via console commands (artisan)

[![Deploy to DO](https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/do-community/landing-laravel/tree/main)

![Landing Laravel - application screenshot](https://assets.digitalocean.com/articles/landing_laravel_series/landing_final.png)
This application was developed in the following tutorial series:
[How To Build a Links Landing Application in PHP with Laravel and Docker Compose]().

## Development with Docker Compose
The application includes a Docker Compose setup that you can use for development. 
Please follow the [linked tutorial series](https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg)](https://cloud.digitalocean.com/apps/new?repo=https://github.com/do-community/landing-laravel/tree/main) for more information about how to set up Docker and Docker Compose.

It's recommended that you fork this repository to your own Github account. 
Then, clone your forked repository so that you can make changes to the application.

To bring the environment up:

```bash
docker-compose up -d
```

Running Composer:

```bash
docker-compose exec app composer install
```

Setting up App Key:
```bash
docker-compose exec app artisan key:generate
```

Running Migrations and Seeds:
```bash
docker-compose exec app artisan migrate --seed
```

Then you should be able to access the application on `localhost:8080`.

Change the `links.yml` file to change the links that get seeded into the database by default, when the application is deployed.

To manage links, use `artisan`:

```bash
docker-compose exec app artisan link:list
```

This will list all links in the database. To add a new link, use `link:create`, and `link:delete LINK_ID` to delete links.

To deploy your customized version of this application to DigitalOcean's App Platform, you can use `doctl` with the included App Spec file. 
First, edit the `.do/deploy.template.yml` file to change the `github.repo` entries to your own forked repository URL. You may also want to change the `name` of the application. 
Then, run [doctl](https://www.digitalocean.com/docs/apis-clis/doctl/how-to/install/):

```bash
doctl apps create --spec .do/deploy.template.yml
```

You can find more details on how to use `doctl` and the App Spec file in [this post](https://dev.to/erikaheidi/deploying-a-laravel-application-to-digitalocean-app-platform-via-doctl-with-an-app-spec-yaml-file-4dib).
