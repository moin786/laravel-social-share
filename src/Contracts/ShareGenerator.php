<?php

namespace Peal\SocialShare\Contracts;

use Peal\SocialShare\DTOs\ShareData;

interface ShareGenerator
{
    public function generate(mixed $model): ShareData;
}
