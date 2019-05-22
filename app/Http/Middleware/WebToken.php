<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Session;
use Config;
use Cache;
use Cookie;

use App\Token;

class WebToken
{

  private $apiKey;
  private $cache_enabled;

  public function handle($request, Closure $next)
  {

    $check = null;
    $cache_time_forever = Config::get('app.cache_time_forever');
    $this->cache_enabled = (bool) Config::get('app.cache_enabled');
    $this->apiKey = $request->cookie('apiToken');

    if(!$this->cache_enabled) {
      $cache_time_forever = 0;
    }

    if($this->apiKey) {
      if (Cache::has('t_'.$this->apiKey)) {
        $check = Cache::get('t_'.$this->apiKey);
      } else {
        $check = Cache::remember('t_'.$this->apiKey, $cache_time_forever, function () {
          $m1token = Token::where('api_token', $this->apiKey)->first();
          return $m1token;
        });
      }

      // $check = Token::where('api_token', $this->apiKey)->first();

      if ($check) {
        $request->request->add(['user_id' => $check->user_id]);
        $request->request->add(['token_id' => $check->id]);
        $request->request->add(['token_data' => $check->api_token]);
        Auth::loginUsingId($check->user_id);
      } else {
        Cookie::queue(Cookie::forget('apiToken'));
        Auth::logout();
        Session::flush();
      }
    } else {
      Auth::logout();
      Session::flush();
    }

    return $next($request);
  }
}
