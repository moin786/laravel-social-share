<?php

namespace Peal\SocialShare\Middleware;

use Closure;
use Peal\SocialShare\Support\ShareManager;

class AutoShareMetaMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (!method_exists($response, 'getContent')) {
            return $response;
        }

        $content = $response->getContent();

        $share = app(ShareManager::class)->auto($request);

        $meta = view('social-share::meta', [
            'share' => $share
        ])->render();

        $content = str_replace('</head>', $meta . '</head>', $content);

        $response->setContent($content);

        return $response;
    }
}
