<?php

namespace Peal\SocialShare\Generators;

use Peal\SocialShare\Contracts\ShareGenerator;
use Peal\SocialShare\DTOs\ShareData;

class ProductShareGenerator implements ShareGenerator
{
    public function generate(mixed $product): ShareData
    {
        return ShareData::make([
            'title' => $product->name,
            'description' => substr(strip_tags($product->description), 0, 160),
            'image' => $product->primary_image_url,
            'url' => route('product.show', $product->slug),
        ]);
    }
}
