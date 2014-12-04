<?php namespace Whynot\Dashboard;

use Illuminate\Support\ServiceProvider;
use Whynot\Dashboard\Controllers\BaseController;

class DashboardServiceProvider extends ServiceProvider {

    protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('whynot/dashboard');
        include __DIR__.'/../../routes.php';
        include __DIR__.'/../../filters.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['dashboard'] = $this->app->share(function($app)
        {
            return new BaseController();
        });

        // load package config
        $this->app['config']->package('whynot/dashboard', __DIR__.'/../../config');

        $this->app['widget'] = $this->app->share(function()
        {
            return new \Whynot\Dashboard\Model\Widget();
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('dashboard');
	}

}
