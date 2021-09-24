# Landing Laravel - A Demo Laravel Application

This application was initially developed in the following tutorial series:
[How To Build a Links Landing Application in PHP with Laravel and Docker Compose](https://www.digitalocean.com/community/tutorial_series/how-to-build-a-links-landing-page-in-php-with-laravel-and-docker-compose).

A second series called [A Practical Introduction to Laravel Eloquent ORM](https://www.digitalocean.com/community/tutorial_series/a-practical-introduction-to-laravel-eloquent-orm) further develops this demo application to include new models and relationships.

## Releases and Tutorials

The application uses GitHub releases to support a progressive learning strategy, with multiple versions based on each part of the series. Here’s an overview of all available releases:

### Laravel Introduction Series
- [How To Build a Links Landing Application in PHP with Laravel and Docker Compose](https://www.digitalocean.com/community/tutorial_series/how-to-build-a-links-landing-page-in-php-with-laravel-and-docker-compose) [`0.1.1`](https://github.com/do-community/landing-laravel/releases/tag/0.1.1)


### Eloquent Series
- [Tutorial **1**: How To Create a One-to-Many Relationship in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-create-a-one-to-many-relationship-in-laravel-eloquent) [`elo-tutorial1.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial1.0)
- [Tutorial **2**: How To Insert New Database Records in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-insert-new-database-records-in-laravel-eloquent) [`elo-tutorial2.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial2.0)
- [Tutorial **3**: How To Populate a Database with Sample Data using Laravel Seeders and Eloquent Models](https://www.digitalocean.com/community/tutorials/how-to-populate-a-database-with-sample-data-using-laravel-seeders-and-eloquent-models) [`elo-tutorial3.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial3.0)
- [Tutorial **4**: How To Query the Database in Laravel with Eloquent Select](https://www.digitalocean.com/community/tutorials/how-to-query-the-database-in-laravel-with-eloquent-select) [`elo-tutorial4.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial4.0)
- [Tutorial **5**: How to Refine Database Queries with Eloquent Where](https://www.digitalocean.com/community/tutorials/how-to-refine-database-queries-in-laravel-with-eloquent-where) [`elo-tutorial5.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial5.0)
- [Tutorial **6**: How To Order Query Results in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-order-query-results-in-laravel-eloquent) [`elo-tutorial6.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial6.0)
- [Tutorial **7**: How To Get Total Result Count in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-get-total-result-count-in-laravel-eloquent) [`elo-tutorial7.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial7.0)
- [Tutorial **8**: How To Limit and Paginate Query Results in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-limit-and-paginate-query-results-in-laravel-eloquent) [`elo-tutorial8.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial8.0)
- [Tutorial **9**: How To Update Database Records in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-update-database-records-in-laravel-eloquent) [`elo-tutorial9.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial9.0)
- [Tutorial **10**: How To Delete Database Records in Laravel Eloquent](https://www.digitalocean.com/community/tutorials/how-to-delete-database-records-in-laravel-eloquent) [`elo-tutorial10.0`](https://github.com/do-community/landing-laravel/releases/tag/elo-tutorial10.0)
 
## About
This application creates a links landing page where you can share relevant links to an audience.
Links are initially imported from a `links.yml` file in the root of the application, and can be managed via Artisan commands (in the console / command-line).

<p align="center">
<a title="Deploy this application to DigitalOceans App Platform in a few clicks!" href="https://cloud.digitalocean.com/apps/new?repo=https://github.com/do-community/landing-laravel/tree/main"><img src="https://mp-assets1.sfo2.digitaloceanspaces.com/deploy-to-do/do-btn-blue.svg" alt="Deploy to DO button"></a>
</p>

![Landing Laravel - application screenshot](https://assets.digitalocean.com/articles/landing_laravel_series/landing_final.png)


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


