<div class="container-fluid">
  <div class="row">

    <div class="col-md-2 col-sm-12 logo text-center">
      <a class="menu-button"><i class="icon bars"></i></a>

      <a href="{{ URL::to('/') }}" title="{{ __('site.title') }}"><img src="{{ asset('/images/logo.svg') }}" alt="{{ __('site.title') }}"></a>
    </div>

    <div class="col-md-10 col-sm-12">
      <ul id="mobilemenu" class="mmenu">
        @yield('menu')
      </ul>
    </div>

  </div>
</div>
