<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Illuminate\Http\Request;
use Closure;

class RedirectFromOldSlug
{
    public function handle(Request $request, Closure $next)
    {
        $url = parse_url($request->url(), PHP_URL_PATH);
        $redirect = Redirect::where('old_slug', $route)
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->first();
        if ($redirect === null) {
            return $next($request);
        }

        while ($redirect !== null) {
            $route = $redirect->new_slug;
            $redirect = Redirect::where('old_slug', $route)
                ->where('created_at', '>', $redirect->created_at)
                ->orderByDesc('created_at')
                ->orderByDesc('id')
                ->first();
        }
        return redirect($route);
    }
}
