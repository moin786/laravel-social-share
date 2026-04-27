<?php

namespace Peal\SocialShare\Generators;

use Peal\SocialShare\Contracts\ShareGenerator;
use Peal\SocialShare\DTOs\ShareData;

class DefaultShareGenerator implements ShareGenerator
{
    public function generate(mixed $model): ShareData
    {
        $routeName = config('social-share.routes.product');

        $url = $routeName && Route::has($routeName)
            ? \route($routeName, $product->slug)
            : url('/products/' . $product->slug);

        return ShareData::make([
            'title' => config('app.name'),
            'description' => '',
            'image' => config('social-share.default_image'),
            'url' => $url,
        ]);
    }
}
