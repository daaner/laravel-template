<?php

namespace App\Http\Middleware;

use App\Repositories\SettingRepository;
use Auth;
use Closure;
use Gate;
use Request;

class CloseSite
{
    public function handle($request, Closure $next)
    {
        if (Request::is('js/*.js') || Request::is('api/login')) {
            return $next($request);
        }

        $set_data = new SettingRepository();
        $settings = $set_data->getCacheSetting();

        // сайт отключен на обновление / диагностику
        if (isset($settings['disable_site']) && $settings['disable_site']) {
            if (Gate::allows('admin-only', auth()->user())) {
                return $next($request);
            }
            abort(521);
        }

        // Доступ к сайту только для зарегистрированных пользователей
        if (isset($settings['registered_allow']) && $settings['registered_allow']) {
            if (Auth::check()) {
                return $next($request);
            }
            abort(403);
        }

        // Запрет всех роутов регистрации;
        if (isset($settings['enable_register']) && !$settings['enable_register']) {
            if (Request::is('api/register')) {
                abort(403);
            }
        }

        return $next($request);
    }
}
