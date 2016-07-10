<?php namespace App\Providers;

use App\Entity\Article;
use App\GlobalConfig;
use Illuminate\Support\ServiceProvider;

class GlobalServiceProviders extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 * @return void
	 */
	public function boot()
	{
		$settings = GlobalConfig::first();
     //   dd($settings);
        $articles = Article::latest()->where('category_id', '=', 'news')->get();

		view()->share('settings',$settings);
        view()->share('latestNewses', $articles);
	}

	/**
	 * Register the application services.
	 * @return void
	 */
	public function register()
	{
		//
	}

}
