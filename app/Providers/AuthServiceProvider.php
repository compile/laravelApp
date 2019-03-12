<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
		 \App\Models\Thumb::class => \App\Policies\ThumbPolicy::class,
		 \App\Models\Thumb_100_100::class => \App\Policies\Thumb_100_100Policy::class,
		 \App\Models\Work::class => \App\Policies\WorkPolicy::class,
		 \App\Models\Channel::class => \App\Policies\ChannelPolicy::class,
		 \App\Models\Author::class => \App\Policies\AuthorPolicy::class,
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
