@extends('layouts.full')

@section('content')

  <div class="errors">
    <h2>
      @yield('error')
    </h2>

    <a href="/" class="redirect">{{ __('site.menu.main') }}</a>
  </div>

@endsection
