<?php

namespace Peal\SocialShare;

use Illuminate\Support\ServiceProvider;
use Peal\SocialShare\Support\ShareManager;

class LaravelSocialShareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('social-share', fn() => new ShareManager());

        $this->mergeConfigFrom(__DIR__ . '/../config/social-share.php', 'social-share');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'social-share');

        $this->publishes([
            __DIR__ . '/../config/social-share.php' => config_path('social-share.php'),
            __DIR__ . '/resources/views' => resource_path('views/vendor/social-share'),
        ], 'social-share');
    }
}
