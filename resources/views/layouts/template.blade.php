<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('layouts.meta.mobile')
    @include('layouts.meta.title')
    @include('layouts.meta.canonical')
    @include('layouts.meta.icon')
    @include('layouts.meta.description')
    @include('layouts.meta.og')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    @yield('style')
    @include('layouts.meta.ldjson')
    @include('layouts.meta.metric')

    @if (isset($scripts_top) && !$scripts_top->isEmpty())
      @foreach ($scripts_top as $top)
        {!! $top->data !!}
      @endforeach
    @endif
  </head>

  <body class="@yield('body_class')">

    {{-- id="app" for Vue --}}
    <div id="app">
      <header>
        @include('layouts.header')
      </header>

      @yield('body')

      @yield('footer')

      {{-- Load components --}}
      @yield('vue')
    </div>

    @include('layouts.other.backtotop')

    {{-- // == if need jQuery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
      if(typeof jQuery == 'undefined'){
        document.write('<script src="{{ URL::to('/') }}/js/jquery-3.3.1.min.js"><\/script>');
      }
    </script> --}}

    <script type="text/javascript" src="{{ mix('js/script.js') }}"></script>
    @yield('script')

    @if (isset($scripts_bottom) && !$scripts_bottom->isEmpty())
      @foreach ($scripts_bottom as $bottom)
        {!! $bottom->data !!}
      @endforeach
    @endif

    @include('layouts.other.errors')
  </body>
</html>
