<?php

namespace Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Blog\Repositories\BlogCategoryRepository;

class BlogController extends Controller
{
    public function __construct()
    {
        // $this->middleware('admin');
    }

    public function index()
    {
        return view('Blog::index');
    }

    public function test()
    {
        $data = new BlogCategoryRepository();
        $cat = $data->getBlogCategory();

        dd('test page', $cat);

        return view('Blog::index');
    }
}
