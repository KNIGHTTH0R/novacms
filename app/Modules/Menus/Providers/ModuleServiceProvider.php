<?php

namespace App\Modules\Menus\Providers;

use Modules\Menus\Models\Option;

use Nova\Module\Support\Providers\ModuleServiceProvider as ServiceProvider;


class ModuleServiceProvider extends ServiceProvider
{
    /**
     * The additional provider class names.
     *
     * @var array
     */
    protected $providers = array(
        'App\Modules\Menus\Providers\EventServiceProvider',
        'App\Modules\Menus\Providers\RouteServiceProvider',
    );


    /**
     * Bootstrap the Application Events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
        $path = realpath(__DIR__ .'/../');

        // Configure the Package.
        $this->package('Menus', 'system', $path);

        // Bootstrap the Module.
        $path = $path .DS .'Bootstrap.php';

        $this->bootstrapFrom($path);
    }

    /**
     * Register the Menus module Service Provider.
     *
     * This service provider is a convenient place to register your modules
     * services in the IoC container. If you wish, you may make additional
     * methods or service providers to keep the code more focused and granular.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        //
    }
}
