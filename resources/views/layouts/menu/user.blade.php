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

</ul>
