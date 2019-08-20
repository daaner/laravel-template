<?php

namespace App\Repositories;

use App\Token as Model;
use App\Traits\CaptureIpTrait;
use Auth;
use Carbon\Carbon;
use Cookie;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;

// use Cache;

class TokenRepository extends InitRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function setToken($user_id)
    {
        $token = new Model();

        $ipAddress = new CaptureIpTrait();
        $agent = new Agent();

        $browser = $agent->browser();
        $platform = $agent->platform();

        $token->device = $agent->device();
        $token->browser = $browser.'('.$agent->version($browser).')';
        $token->system = $platform.'('.$agent->version($platform).')';

        $token->user_id = $user_id;
        $token->last_ip = $ipAddress->getClientIp();
        $unique_token = Str::random(60);

        do {
            $unique_token = Str::random(60);
        } while (!empty(Model::where('api_token', $unique_token)->first()));

        $token->api_token = $unique_token;
        $token->login_at = Carbon::now();
        $token->save();

        return $token;
    }

    public function clear_token($token)
    {
        $data = Model::where('api_token', $token)->first();

        if (isset($data)) {
            cache()->forget('t_'.$token);
            $data->delete();
        }
        Cookie::queue(Cookie::forget('apiToken'));
        Auth::logout();

        return true;
    }
}
