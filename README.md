# Landing Laravel - A Links Landing Laravel Application

This application creates a links landing page where you can share relevant links to an audience.
Links are initially imported from a `links.yml` file in the root of the application, and can be managed via Artisan commands (in the console / command-line).

<p align="center">
<a title="Deploy this application to DigitalOceans App Platform in a few clicks!" href="https://cloud.digitalocean.com/apps/new?repo=https://github.com/do-community/landing-laravel/tree/main"><img src="https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg" alt="Deploy to DO button"></a>
</p>

![Landing Laravel - application screenshot](https://assets.digitalocean.com/articles/landing_laravel_series/landing_final.png)

This application was developed in the following tutorial series:
[How To Build a Links Landing Application in PHP with Laravel and Docker Compose](https://www.digitalocean.com/community/tutorial_series/how-to-build-a-links-landing-page-in-php-with-laravel-and-docker-compose).

## Managing Links
Links are initially imported from a `links.yml` file at the root of the repository. The seeds are only imported when the database is empty, so to not duplicate your links.

Link management is done via Artisan commands:

```shell
php artisan link:list
php artisan link:create
php artisan link:delete [LINK_ID]
```

## Deploying via DO Deploy Button
If you want to try [DigitalOcean's App Platform](https://www.digitalocean.com/docs/app-platform/) with this application, you may want to use the *Deploy to DigitalOcean* button at the top of this README.
This will give you less customization options, but you can still manage your links via the console, on the App Platform dashboard.

## Development Workflow with Docker Compose
The application includes a Docker Compose setup that you can use for development. 
Please follow the [linked tutorial series](https://www.digitalocean.com/community/tutorial_series/how-to-build-a-links-landing-page-in-php-with-laravel-and-docker-compose) for more information about how to set up Docker and Docker Compose.

It's recommended that you fork this repository to your own Github account. 
Then, clone your forked repository so that you can make changes to the application.

To bring the environment up:

```shell
docker-compose up -d
```

Running Composer:

```shell
docker-compose exec app composer install
```

Setting up App Key:
```shell
docker-compose exec app artisan key:generate
```

Running Migrations and Seeds:
```shell
docker-compose exec app artisan migrate --seed
```

Then you should be able to access the application on `localhost:8080`.

Change the `links.yml` file to change the links that get seeded into the database by default, when the application is deployed.

To manage links, use `artisan`:

```shell
docker-compose exec app artisan link:list
```

This will list all links in the database. To add a new link, use `link:create`, and `link:delete LINK_ID` to delete links.

## Deploying to App Platform via `doctl`
To deploy your customized version of this application to DigitalOcean's App Platform, you can use `doctl` with the included App Spec file. 
First, edit the `.do/deploy.template.yml` file to change the `github.repo` entries to your own forked repository URL. You may also want to change the `name` of the application. 
Then, run [doctl](https://www.digitalocean.com/docs/apis-clis/doctl/how-to/install/):

```shell
doctl apps create --spec .do/deploy.template.yaml
```

Then go to your App Platform dashboard to follow the build logs.

You can find more details on how to use `doctl` and the App Spec file in [this post](https://dev.to/erikaheidi/deploying-a-laravel-application-to-digitalocean-app-platform-via-doctl-with-an-app-spec-yaml-file-4dib).


