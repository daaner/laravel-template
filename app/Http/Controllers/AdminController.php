<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function __construct() {
    // $this->middleware('admin');
  }

  public function clearCache() {
    cache()->flush();
    return redirect()
      ->back()
      ->with(['success_message' => __('api.cache_clear')]);
  }
}
