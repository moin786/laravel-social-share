<?php

namespace Peal\SocialShare\Generators;

use Peal\SocialShare\Contracts\ShareGenerator;
use Peal\SocialShare\DTOs\ShareData;

class DefaultShareGenerator implements ShareGenerator
{
    public function generate(mixed $model): ShareData
    {
        return ShareData::make([
            'title' => config('app.name'),
            'description' => '',
            'image' => config('social-share.default_image'),
            'url' => url()->current(),
        ]);
    }
}
