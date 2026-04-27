<?php

namespace Peal\SocialShare\Engines;

class WhatsAppEngine
{
    public function url(string $shareUrl, string $text = ''): string
    {
        return "https://wa.me/?text=" . urlencode($text . ' ' . $shareUrl);
    }
}
