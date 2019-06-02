@extends('layouts.full')

@section('content_class', 'blog-content')


@section('content')
  <h1>
    test blog
  </h1>
  <p>
    {{ __('Blog::blog.title') }}
  </p>

  <br>

  <pre>
    Для Laravel
    __('Blog::blog.title')

    Для Vue
    __('blog.title')
  </pre>


  <blog-index></blog-index>
@endsection
