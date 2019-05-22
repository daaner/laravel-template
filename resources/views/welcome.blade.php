@extends('layouts.full')

@section('title', __('site.title'))


{{-- ========== Addition blocks ========== --}}
@section('description', 'Description. Can be empty')

{{-- If need Canonical. Can be empty --}}
@section('canonical', 'http://www.site.com/profile')


{{-- body class --}}
@section('body_class', 'new-body-class')

{{-- content class (only main) --}}
@section('content_class', 'new-content-class')

{{-- footer class --}}
@section('footer_class', 'new-footer-class')

@section('style')
  {{-- Link to addition style for this page --}}
@endsection

@section('script')
  {{-- Link to addition scripts for this page --}}
@endsection

{{-- OG --}}
@section('og_image', 'url_for_og_image')
@section('og_image_alt', 'alt_for_og_image')

@section('ldjson')
  {{-- only inner data --}}
  "@context": "http://schema.org2",
  "@type": "WebSite2",
@endsection



{{-- ========== Main blocks ========== --}}
@section('top')
  <div class="container">
    <span class="h3 mr-5">Section - TOP</span>
    Can be null
    {{-- {{ dump(Auth::check()) }} --}}
    <br>
    <br>
    <h4>Carbon2</h4>
    {{-- {{ dump(Carbon\Carbon::parse('2019-01-01 12:00:00')->diffForHumans()) }}
    {{ dump(Carbon\Carbon::now()->isoFormat('LLLL')) }} --}}
  </div>
@endsection

@section('content')
  <h1>Welcome page</h1>
  <br>
  <p>
    {{ __('site.title') }}
  </p>

  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>

  <p>
    <pre>
      php artisan view:clear
      php artisan cache:clear
    </pre>
  </p>
@endsection

@section('bottom')
  <div class="container">
    <span class="h3 mr-5">Section - BOTTOM</span>
    Can be null
  </div>
@endsection
