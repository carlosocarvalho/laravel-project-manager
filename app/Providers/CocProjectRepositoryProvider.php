<?php

namespace CocProject\Providers;

use Illuminate\Support\ServiceProvider;

class CocProjectRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind( \CocProject\Repositories\ClientRepository::class,
                         \CocProject\Repositories\ClientRepositoryEloquent::class );

        $this->app->bind( \CocProject\Repositories\ProjectRepository::class ,
                          \CocProject\Repositories\ProjectRepositoryEloquent::class );

        $this->app->bind( \CocProject\Repositories\ProjectNoteRepository::class ,
            \CocProject\Repositories\ProjectNoteRepositoryEloquent::class );


        $this->app->bind( \CocProject\Repositories\UserRepository::class ,
            \CocProject\Repositories\UserRepositoryEloquent::class );
    }
}
