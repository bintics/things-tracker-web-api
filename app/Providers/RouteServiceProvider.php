<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes web.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespaceWeb = 'App\Http\Controllers\Web';

    /**
     * This namespace is applied to your controller routes API.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespaceApi = 'App\Http\Controllers\Api';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        $this->mapApiRoutes($router);

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespaceWeb, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/Routes/routes-web.php');
        });
    }

    protected function mapApiRoutes(Router $router) {
        $router->group([
            'namespace' => $this->namespaceApi, 'middleware' => 'auth:api', 'prefix' => 'api',
        ], function($router) {
            require app_path('Http/Routes/routes-api.php');
        });

        $router->group([
            'namespace' => $this->namespaceApi, 'prefix' => 'api',
        ], function($router) {
            $router->post('token', ['uses' => 'SessionController@postLogin']);
            $router->post('registry', ['uses' => 'RegisterController@postExternalRegistry']);
            $router->get('/', function () {
                return 'Thinks Tracker API v1.0';
            });
        });
    }
}
