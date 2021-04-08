<?php


namespace ShahriarSiraj\LaravelI18n\Controllers;

use Illuminate\Http\Request;

class LocaleController extends \App\Http\Controllers\Controller
{
    /**
     * @param Request $request
     * @param string $locale
     * @return mixed
     */
    public function switchLocale(Request $request, $locale)
    {
        $request->session()->put('locale', $locale);

        $previousPath = str_replace(url('/'), '', url()->previous());

        $routeMappings = config('i18n.route_mappings');

        if (array_key_exists($previousPath, $routeMappings)) {
            return redirect($routeMappings[$previousPath]);
        }

        return back();
    }
}
