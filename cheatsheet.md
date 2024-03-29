> when change the APP_ENV to production it warns
> `APP_ENV=production`

> `php artisan migrate:fresh` to refresh the

> `php artisan db:seed` is used to populate a database table

NOTE: `php artisan migrate:fresh --seed` will do both.

`php artisan make:factory FactoryName` this is to populate a table

`php artisan make:model {ModelName} -mf` this is to create a model, a migration and a factory

> more on Factories or populating datas [here](https://laracasts.com/series/laravel-8-from-scratch/episodes/28).

> More on eager loading [here](https://laracasts.com/series/laravel-8-from-scratch/episodes/30).

`php artisan make:component {component name}` this creates a blade file in named {lowercase(component name).blade.php} and a {ComponentName.php} file or Model

> `php artisan vendor:publish` to make some hidden things on a vendor folder to appear on a codespace

> after publishing the paginate folder {{$posts->links('pagination::tailwind') }} to have the numbered pagination style
> And on the AppServiceProvider.php include Paginator::useTailwind();

> `alias art="php artisan"` => `art migrate, serve . . .`

`php artisan storage:link` to link one folder to another, in this case the public folder to the storage.public folder
