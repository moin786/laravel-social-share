<?php

namespace Peal\SocialShare\Engines;

class TwitterEngine
{
    public function url(string $shareUrl, string $text = ''): string
    {
        return "https://twitter.com/intent/tweet?url="
            . $shareUrl
            . "&text=" . urlencode($text);
    }
}
