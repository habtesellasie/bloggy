> when change the APP_ENV to production it warns
> `APP_ENV=production`

> `php artisan migrate:fresh` to refresh the

> `php artisan db:seed` is used to populate a database table

NOTE: `php artisan migrate:fresh --seed` will do both.

`php artisan make:factory FactoryName` this is to populate a table

`php artisan make:model {ModelName} -mf` this is to create a model, a migration and a factory

> more on Factories or populating datas [here](https://laracasts.com/series/laravel-8-from-scratch/episodes/28).

> More on eager loading [here](https://laracasts.com/series/laravel-8-from-scratch/episodes/30).
