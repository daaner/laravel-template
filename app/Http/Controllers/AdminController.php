<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function clearCache()
    {
        cache()->flush();

        return redirect()
      ->back()
      ->with(['success_message' => __('api.admin.cache_clear')]);
    }
}
