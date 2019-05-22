{{-- User menu --}}
<ul id="mobilemenu">
  <li>
    <a href="{{ URL::to('/') }}">User menu -
      {{ __('site.menu.main') }}
    </a>
  </li>

  <li class="dropdown-menu">
    <a >
      {{ __('site.menu.information') }}
    </a>
      <ul>
        <li>
          <a href="URL::to('/icons')">{{ __('site.menu.icons') }}</a>
        </li>
        <li>
          <a href="URL::to('/content')">{{ __('site.menu.content') }}</a>
        </li>
        <li>
          <a href="URL::to('/content2')">{{ __('site.menu.content2') }}</a>
        </li>
        <li>
          <a href="{{ route('clear_cache') }}">{{ __('api.admin.clear_cache') }}</a>
        </li>
      </ul>
  </li>

  <li>
    <a href="#">
      {{ __('site.menu.profile') }} (#)
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.menu.admin') }} (#)
    </a>
  </li>

  <li>
    <a href="{{ route('logout_get') }}" title="{{ __('site.menu.logout') }}">
      {{ __('site.menu.logout') }}
    </a>
  </li>

</ul>
