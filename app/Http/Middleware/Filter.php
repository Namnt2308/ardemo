<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Session;
class Filter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function handle(Request $request, Closure $next)
    {
        $texts = $this->getViewedPosts();

        if (!is_null($texts))
        {
            $texts = $this->cleanExpiredViews($texts);
            $this->storePosts($texts);
        }

        return $next($request);
    }
    private function getViewedPosts()
    {
        return $this->session->get('viewed_texts', null);
    }

    private function cleanExpiredViews($texts)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($texts, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($texts)
    {
        $this->session->put('viewed_texts', $texts);
    }
}
