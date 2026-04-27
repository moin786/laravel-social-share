<?php

namespace Peal\SocialShare;

use Illuminate\Support\ServiceProvider;
use Peal\SocialShare\Support\ShareManager;

class LaravelSocialShareServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('social-share', fn() => new ShareManager());
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/social-share.php' => config_path('social-share.php'),
        ], 'social-share');
    }
}
