<?php

namespace Peal\SocialShare\Engines;

class FacebookEngine
{
    public function url(string $shareUrl): string
    {
        return "https://www.facebook.com/sharer/sharer.php?u=" . $shareUrl;
    }
}
