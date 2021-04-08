<?php


namespace ShahriarSiraj\LaravelI18n\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLocale
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $defaultLocale = config('i18n.default_locale');
        $locale = $request->session()->get('locale', $defaultLocale);

        app()->setLocale($locale);

        return $next($request);
    }
}
