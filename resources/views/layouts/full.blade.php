@extends('layouts.template')

{{-- Main menu --}}
@section('menu')
  @if(Auth::user())
    @include('layouts.menu.user')
  @else
    @include('layouts.menu.guest')
  @endif
@endsection

{{-- Footer --}}
@section('footer')
  <footer class="bg-secondary">
    @include('layouts.footer-full')
    @include('layouts.footer')
  </footer>
@endsection


@section('body')

  @yield('top')
  <div class="container">
    <section role="main" class="main-content">
      @yield('content')
    </section>
  </div>
  @yield('bottom')

@endsection
