<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\User;
use App\Token;
use Hash;
use Validator;
use App\Traits\CaptureIpTrait;
use Illuminate\Support\Str;

// use Carbon\Carbon;


use App\Http\Requests\UserRegisterRequest;
use Request;

//mail
// use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
  public function __construct() {
    // $this->middleware('apitoken')
    // ->only('logout');
  }

  // protected function formatErrors(Validator $validator)
  // {
  //   dd($validator->errors()->all());
  //   return $validator->errors()->all();
  // }

//UserRegisterRequest
  public function register(UserRegisterRequest $request) {
    // $validator = Validator::make($request->all(), [
    //   'name' => 'max:255',
    //   'email' => 'required|email|unique:users',
    //   'password' => 'required|between:8,25|confirmed'
    // ]);

    dd($request);

    // if ($validator->fails()) {
    //   return response()->json([
    //     'success' => false,
    //     'error' => $validator->errors()
    //   ]);
    // }

    dd($request->all());



    $user = new User($request->all());
    $user->password = bcrypt($request->password);
    $ipAddress = new CaptureIpTrait;
    $user->signup_ip = $ipAddress->getClientIp();

    $user->last_ip = $user->signup_ip;
    $user->save();


    $token = new Token();
    $token->user_id = $user->id;
    $token->last_ip = $ipAddress->getClientIp();
    $unique_token = str_random(60);

    do {
      $unique_token = str_random(60);
    } while (!empty(Token::where('api_token', $unique_token)->first()));

    $token->api_token = $unique_token;
    $token->save();

    return response()->json([
      'success' => true,
      'user_id' => $token->user_id,
      'api_token' => $unique_token,
    ]);

  }


  public function login(Request $request) {

    $validator = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required|between:6,25'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'error' => $validator->errors()
      ]);
    }

    $user = User::whereEmail($request->email)->first();

    if($user && Hash::check($request->password, $user->password)) {
      $ipAddress = new CaptureIpTrait;

      $token = new Token();
      $token->user_id = $user->id;
      $token->last_ip = $ipAddress->getClientIp();
      $unique_token = str_random(32);

      do {
        $unique_token = str_random(32);
      } while (!empty(Token::where('api_token', $unique_token)->first()));

      $token->api_token = $unique_token;
      $token->save();

      return response()->json([
        'success' => true,
        'user' => $token->user_id,
        'api_token' => $unique_token,
      ]);
    }

    return response()->json([
      'success' => false,
      'error' => [
        'email' => __('auth.failed')]
    ]);
  }


  public function forgot(Request $request) {

    $validator = Validator::make($request->all(), [
      'email' => 'required|email'
    ]);

    if ($validator->fails()) {
      return response()->json([
        'success' => false,
        'error' => $validator->errors()
      ]);
    }

    $user = User::whereEmail($request->email)->first();

    if($user) {
      //create token
      $remember_token = Str::random(32);

      $user->remember_token = $remember_token;
      $user->update();


      //send mail
      // Mail::to($user->email)->send(new ForgotPassword($user));
      // return response()->json([
      //   'success' => true,
      //   'info' => __('auth.forgot')
      // ]);
    }

    return response()->json([
      'success' => false,
      'error' => [
        'email' => __('auth.failed')]
    ]);
  }


  public function logout(Request $request) {
    $apiKey = $request->bearerToken();

    $token_user = Token::where('api_token', $apiKey)->first();

    //на всякий случай проверка
    if(!$token_user) {
      return response()->json([
        'success' => false,
        'error' => __('passwords.token'),
      ], 401);
    }

    $token_user->delete();

    return response()->json([
      'success' => true,
    ]);
  }

}
