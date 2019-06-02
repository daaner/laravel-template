@if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isModerator()))
  <div class="asetting_menu">
    <a href="{{ route('admin.dashboard') }}" title="{{ __('site.menu.admin') }}" target="_admin">
      <i class="icon cogs"></i>
    </a>
    <a href="{{ route('clear_cache') }}" title="{{ __('api.admin.clear_cache') }}">
      <i class="icon eraser"></i>
    </a>
  </div>
@endif
