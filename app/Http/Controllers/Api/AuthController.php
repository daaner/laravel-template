<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\TokenRepository;
use App\Traits\CaptureIpTrait;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

//mail
// use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
      ->only(['logout_get', 'logout']);
    }

    public function robot()
    {
        $agent = new Agent();

        if ($agent->isRobot()) {
            return __('api.errors.robot');
        }
    }

    public function register(UserRegisterRequest $request)
    {
        if ($this->robot()) {
            return response()->json([
                'success' => false,
                'error'   => $this->robot(),
            ], 403);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $ipAddress = new CaptureIpTrait();
        $user->signup_ip = $ipAddress->getClientIp();

        if (!$user->save()) {
            return response()->json([
                'success' => false,
                'error'   => __('api.errors.register'),
            ]);
        }

        return response()->json([
            'success' => false,
            'error'   => __('auth.needactive'),
        ], 403);
    }

    public function login_get()
    {
        return redirect('/');
    }

    public function login(UserLoginRequest $request)
    {
        if ($this->robot()) {
            return response()->json([
                'success' => false,
                'error'   => $this->robot(),
            ], 403);
        }

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            Auth::logout();
            if (!$user->active) {
                return response()->json([
                    'success' => false,
                    'error'   => __('auth.deactive'),
                ], 403);
            }

            $token_data = new TokenRepository();
            $token = $token_data->setToken($user->id);

            if (isset($token->api_token)) {
                return response()->json([
                    'success'    => true,
                    'user_id'    => $user->id,
                    'user_name'  => $user->name,
                    'user_email' => $user->email,
                    'api_token'  => $token->api_token,
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'error'   => __('auth.failed'),
        ], 403);
    }

    public function logout_get(Request $request)
    {
        $token_data = new TokenRepository();
        $token_data->clear_token($request->token_data);

        return redirect('/')->with(['success_message' => __('auth.logout')]);
    }

    public function logout(Request $request)
    {
        $token_data = new TokenRepository();
        $token_data->clear_token($request->bearerToken());

        return response()->json([
            'success' => true,
        ]);
    }
}
