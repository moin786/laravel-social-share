<?php

namespace Vendor\SocialShare\Support;

class ShareManager
{
    public function facebook($url)
    {
        return "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($url);
    }

    public function twitter($url, $text = '')
    {
        return "https://twitter.com/intent/tweet?url=" . urlencode($url) . "&text=" . urlencode($text);
    }

    public function whatsapp($url, $text = '')
    {
        return "https://wa.me/?text=" . urlencode($text . ' ' . $url);
    }

    public function linkedin($url)
    {
        return "https://www.linkedin.com/sharing/share-offsite/?url=" . urlencode($url);
    }
}
