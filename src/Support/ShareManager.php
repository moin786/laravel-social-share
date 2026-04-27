<?php

namespace Peal\SocialShare\Support;

use Peal\SocialShare\DTOs\ShareData;
use Peal\SocialShare\Generators\ProductShareGenerator;
use Peal\SocialShare\Generators\DefaultShareGenerator;

class ShareManager
{
    public function for(mixed $model): ShareData
    {
        return match (true) {
            $model instanceof \App\Models\Product
            => (new ProductShareGenerator())->generate($model),

            default => (new DefaultShareGenerator())->generate($model),
        };
    }

    public function auto($request): ShareData
    {
        return (new DefaultShareGenerator())->generate($request);
    }
}
