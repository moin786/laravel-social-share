<?php

namespace Peal\SocialShare\Engines;

class LinkedInEngine
{
    public function url(string $shareUrl): string
    {
        return "https://www.linkedin.com/sharing/share-offsite/?url="
            . urlencode($shareUrl);
    }
}
