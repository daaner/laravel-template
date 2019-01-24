<div class="container">
  <div class="footer_bottom">
    <p class="copyright">
      <span>
        &copy; 2000 - {{ Carbon\Carbon::now()->format('Y') . ' ' . __('site.title')}}.
        &nbsp;&nbsp;
      </span>
      <span>{{ __('site.copyright') }}</span>
    </p>
    {{-- <a href="{{ route('terms') }}" class="terms" target="_blank">{{ __('site.terms') }}</a> --}}
  </div>
</div>
