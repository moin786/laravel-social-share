<?php

namespace Peal\SocialShare\Support;


use Peal\SocialShare\DTOs\ShareData;
use Peal\SocialShare\Generators\ProductShareGenerator;
use Peal\SocialShare\Generators\DefaultShareGenerator;

use Peal\SocialShare\Engines\FacebookEngine;
use Peal\SocialShare\Engines\TwitterEngine;
use Peal\SocialShare\Engines\WhatsAppEngine;
use Peal\SocialShare\Engines\LinkedInEngine;

class ShareManager
{
    /**
     * STEP 1: Generate share data
     */
    public function for(mixed $model): ShareData
    {
        return match (true) {
            $model instanceof \App\Models\Product
            => (new ProductShareGenerator())->generate($model),

            default
            => (new DefaultShareGenerator())->generate($model),
        };
    }

    /**
     * STEP 2: Share URLs (use ShareData internally)
     */
    public function facebook(mixed $model): string
    {
        $share = $this->for($model);
        return app(FacebookEngine::class)->url($share->url);
    }

    public function twitter(mixed $model, string $text = ''): string
    {
        $share = $this->for($model);
        $text = $text ?: $share->title;

        return app(TwitterEngine::class)->url($share->url, $text);
    }

    public function whatsapp(mixed $model, string $text = ''): string
    {
        $share = $this->for($model);
        $text = $text ?: $share->title;

        return app(WhatsAppEngine::class)->url($share->url, $text);
    }

    public function linkedin(mixed $model): string
    {
        $share = $this->for($model);
        return app(LinkedInEngine::class)->url($share->url);
    }

    /**
     * Optional: auto fallback (middleware use)
     */
    public function auto($request): ShareData
    {
        return (new DefaultShareGenerator())->generate($request);
    }
}
