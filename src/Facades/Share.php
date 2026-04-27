<?php

namespace Peal\SocialShare\Facades;

use Illuminate\Support\Facades\Facade;

class Share extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'social-share';
    }
}
