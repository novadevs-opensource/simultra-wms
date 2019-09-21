<?php
namespace Novadevs\Simultra\Base;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Models\Module;
use Repositories\ModuleInterface;
use Repositories\ModuleRepository;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/mod-conf.php', 'dolivel-base'
        );

        $this->app->make('Novadevs\Simultra\Base\Http\Controllers\BaseCompanyController');

        $this->app->bind('ModuleInterface', function($app) {
            return new ModuleRepository( new Module() );
        });

        $this->registerDeps();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Loading route files.
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        // Loading migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // Loading views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'base');

        // Loading translations
        $this->loadTranslations();

        // Publishing assets
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/novadevs/simultra'),
        ], 'simultra-base-assets');

        // Publishing views
        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views'),
        ], 'simultra-base-views');

        // Publishing config
        $this->publishes([
            __DIR__ . '/config' => config_path('novadevs/Dolivel/base')
        ], 'simultra-base-config');

        // Publishing commands
        $this->loadCommands();

        $this->loadFiles();

        $this->registerHelpers();

        $this->registerMiddlewares();

    }

    /**
     * Load package artisan commands
     *
     * @return void
     */
    public function loadCommands()
    {
        $this->commands('Novadevs\Simultra\Base\Commands\InstallModule');
    }

    /**
     * Load Simultra documentation files.
     *
     * @return void
     */
    public function loadFiles()
    {
        $this->publishes([
            __DIR__.'/resources/assets/docs' => public_path('vendor/novadevs/simultra/docs'),
        ], 'simultra-base-docs');

        $this->publishes([
            __DIR__.'/resources/assets/img/whtools-simultra' => public_path('vendor/novadevs/simultra/whtools-simultra'),
        ], 'simultra-base-imgs');
    }

    /**
     * Load package translations
     *
     * @return void
     */
    public function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ .'/resources/lang', 'base');

        $this->publishes([
            __DIR__.'/resources/lang' => resource_path('lang'),
        ]);
    }

    /**
     * Register helpers file
     */
    public function registerHelpers()
    {
        // Load the helpers in app/Http/helpers.php
        if ( file_exists($file = __DIR__ .'/Http/helpers.php') )
        {
            require $file;
        }
    }

    public function registerMiddlewares()
    {
        /** @var Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('role', '\Novadevs\Simultra\Base\Http\Middleware\CheckRole::class');
        $router->pushMiddlewareToGroup('web', '\Novadevs\Simultra\Base\Http\Middleware\Localization::class');
    }

    /**
     * Registers each package dependency
     *
     * @return void
     */
    public function registerDeps()
    {
        /*
         * Register the service provider for the Milon/Barcode dependency.
         */
        $this->app->register('Milon\Barcode\BarcodeServiceProvider');
        /*
         * Create aliases for the Milon/Barcode dependency.
         */
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('DNS1D', 'Milon\Barcode\Facades\DNS1DFacade');
        $loader->alias('DNS2D', 'Milon\Barcode\Facades\DNS2DFacade::class');
    }

    /**
     * TODO // FIXME
     *
     * @return void
     */
    public function loadBladeDirectives()
    {
        Blade::directive('active', function ($route, $output = 'active') {
            if (\Route::currentRouteName() == $route) {
                return $output;
            }
        });
    }
}