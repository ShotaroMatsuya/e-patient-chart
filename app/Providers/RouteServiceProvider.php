<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin'; //ログイン、レジスター後にredirectするPathをセット

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapPostsRoutes(); //新たに作成したroutesをregister
        $this->mapUsersRoutes(); //新たに作成したroutesをregister
        $this->mapRolesRoutes();
        $this->mapPermissionsRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php')); //routeファイルの定義
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php')); //api用のrouteファイルの定義
    }
    protected function mapPostsRoutes() //routes/web/posts.phpのロケーションを指定する
    {
        Route::prefix('admin') //ここで指定されたすべてのrouteには/admin/が頭に追加される
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/posts.php')); //posts用のrouteファイルの定義
    }
    protected function mapUsersRoutes() //routes/web/users.phpのロケーションを指定する
    {
        Route::prefix('admin') //ここで指定されたすべてのrouteには/admin/が頭に追加される
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php')); //users
    }
    protected function mapRolesRoutes()
    {
        Route::prefix('admin') //ここで指定されたすべてのrouteには/admin/が頭に追加される
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/roles.php'));
    }
    protected function mapPermissionsRoutes()
    {
        Route::prefix('admin') //ここで指定されたすべてのrouteには/admin/が頭に追加される
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/permissions.php'));
    }
}
