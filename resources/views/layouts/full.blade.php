@extends('layouts.template')

{{-- Main menu --}}
@section('menu')
  @if(Auth::user())
    @include('layouts.menu.user')
  @else
    @include('layouts.menu.guest')
  @endif
@endsection


{{-- Body --}}
@section('body')
  <section role="main" class="main-content">
    @yield('top')

    @hasSection ('content')
      <div class="container @yield('content_class')">
        @yield('content')
      </div>
    @endif

    @hasSection ('container-fluid')
      <div class="container-fluid @yield('content_class')">
        @yield('content-fluid')
      </div>
    @endif

    @yield('bottom')
  </section>
@endsection


{{-- Footer --}}
@section('footer')
  <footer class="bg-secondary @yield('footer_class')">
    @include('layouts.footer-full')
    @include('layouts.footer')
  </footer>
@endsection

{{-- Vue all components --}}
@section('vue')
  <login-component></login-component>


@endsection
