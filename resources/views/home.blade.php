@extends('layouts.full')

@section('title', __('site.title'))

@section('body_class', 'body_custom_class')

{{-- ========== Addition blocks ========== --}}
@section('description')
  Description. Can be empty
@endsection

{{-- If need Canonical. Can be empty --}}
{{-- /profile or $data->url --}}
{{-- !Short path! --}}
@section('canonical', '/profile')

@section('script')
  {{-- Link to addition scripts for this page --}}
@endsection

@section('style')
  {{-- Link to addition style for this page --}}
@endsection


{{-- ========== Main blocks ========== --}}
@section('top')
  <div class="container">
    <span class="h3 mr-5">Section - TOP</span>
    Can be null
  </div>
@endsection

@section('content')
  <h1>Home</h1>
  <br>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
  <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
  </p>
@endsection

@section('bottom')
  <div class="container">
    <span class="h3 mr-5">Section - BOTTOM</span>
    Can be null
  </div>
@endsection
