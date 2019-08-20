<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Illuminate\Support\Facades\Cache;

class CheckSite
{
    public function handle($request, Closure $next)
    {
        //check for database connection every 5 minutes
        $time = now()->addMinutes(5);
        $error = null;

        //dev
        // cache()->forget('check');

        if (!Cache::has('check')) {
            $data_cache = Cache::remember('check', $time, function () use ($error) {
                try {
                    DB::connection()->table(DB::raw('settings'))->first([DB::raw(1)]);
                    if (!DB::connection()->table(DB::raw('settings'))->count()) {
                        $error = __('api.db_data');
                    }
                } catch (\PDOException $e) {
                    $error = __('api.db_connect');
                }

                //show error
                if (isset($error)) {
                    cache()->forget('check');
                    dd($error);
                }

                return true;
            });
        }

        return $next($request);
    }
}
