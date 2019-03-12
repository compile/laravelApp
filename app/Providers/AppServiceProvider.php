<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
//		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Thumb::observe(\App\Observers\ThumbObserver::class);
		\App\Models\Work::observe(\App\Observers\WorkObserver::class);
		\App\Models\Channel::observe(\App\Observers\ChannelObserver::class);
		\App\Models\Author::observe(\App\Observers\AuthorObserver::class);

        //
    }
}
