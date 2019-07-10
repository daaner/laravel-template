{{-- Guest menu --}}

  <li>
    <a href="{{ URL::to('/') }}">Guest menu -
      {{ __('site.menu.main') }}
    </a>
  </li>

  <li class="dropdown-menu">
    <a >
      {{ __('site.menu.information') }}
    </a>
      <ul>
        <li>
          <a href="{{ URL::to('/icons') }}">{{ __('site.menu.icons') }}</a>
        </li>
        <li>
          <a href="{{ URL::to('/content') }}">{{ __('site.menu.content') }}</a>
        </li>
        <li>
          <a href="{{ URL::to('/content2') }}">{{ __('site.menu.content2') }}</a>
        </li>
      </ul>
  </li>

  <li>
    <a href="#">
      {{ __('site.menu.about') }} (#)
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.menu.help') }} (#)
    </a>
  </li>

  <li>
    <a @click="$modal.show('login')">
      {{ __('site.menu.login') }}
    </a>
  </li>

  @if ($settings['enable_register'])
    <li>
      <a @click="$modal.show('register')">
        {{ __('site.menu.register') }}
      </a>
    </li>
  @endif
