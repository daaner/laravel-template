<div class="container-fluid container-row">
  <div class="logo m-5">
    <a href="{{ URL::to('/') }}" title="{{ __('site.title') }}"><img src="{{asset('/images/logo.svg')}}" alt="{{ __('site.title') }}"></a>
  </div>

  <div class="mmenu" id="mobilemenu">
    @yield('menu')
  </div>

  <a class="menu-button"><i class="icon bars"></i></a>
</div>
