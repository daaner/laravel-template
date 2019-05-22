
  <li>
    <a href="{{ route('clear_cache') }}" title="{{ __('api.admin.clear_cache_title') }}">
      <i class="fa fa-btn fa-eraser"></i> {{ __('api.admin.clear_cache') }}
    </a>
  </li>

  <li>
    <a href="/" target="site">
      <i class="fa fa-btn fa-external-link"></i> @lang('sleeping_owl::lang.links.index_page')
    </a>
  </li>


  @if ($user)
    <li class="dropdown user user-menu" style="margin-right: 20px;">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
          <img src="{{ $user->avatar_url_or_blank }}" class="user-image" />
          <span class="hidden-xs">{{ $user->name }}</span>
      </a>
      <ul class="dropdown-menu">
        <li class="user-header">
          <img src="{{ $user->avatar_url_or_blank }}" class="img-circle" />
          <p>
            {{ $user->name }}
            <small>@lang('sleeping_owl::lang.auth.since', ['date' => $user->created_at->format('d.m.Y')])</small>
          </p>
        </li>
        <li class="user-footer">
          <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-btn fa-sign-out"></i> @lang('sleeping_owl::lang.auth.logout')
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </li>
  @endif
