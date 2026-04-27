<?php

namespace Peal\SocialShare\DTOs;

class ShareData
{
    public function __construct(
        public string $title,
        public string $description,
        public string $image,
        public string $url,
    ) {}

    public static function make(array $data): self
    {
        return new self(
            title: $data['title'] ?? config('app.name'),
            description: $data['description'] ?? '',
            image: $data['image'] ?? config('social-share.default_image'),
            url: $data['url'] ?? url()->current(),
        );
    }
}
