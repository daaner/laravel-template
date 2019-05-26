<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
  public function __construct() {
    // $this->middleware('admin');
  }

  public function index() {
    return view('Blog::index');
  }
}
