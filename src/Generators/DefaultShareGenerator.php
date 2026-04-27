<?php

namespace Peal\SocialShare\Generators;

use Illuminate\Support\Facades\Route;
use Peal\SocialShare\Contracts\ShareGenerator;
use Peal\SocialShare\DTOs\ShareData;

class DefaultShareGenerator implements ShareGenerator
{
    public function generate(mixed $model): ShareData
    {
        $routeName = config('social-share.routes.product');

        $slug = data_get($model, 'slug');

        $url = $routeName && Route::has($routeName) && $slug
            ? route($routeName, $slug)
            : url('/products/' . $slug);

        return ShareData::make([
            'title' => config('app.name'),
            'description' => '',
            'image' => config('social-share.default_image'),
            'url' => $url,
        ]);
    }
}
