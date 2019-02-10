{{-- <meta name="robots" content="index,follow"> --}}
{{-- for dev --}}
<meta name="robots" content="noindex, nofollow">

@hasSection ('description')
  @php
  $description = $__env->yieldContent('description');
  @endphp

  <meta name="description" content="{{ $description }}">
  <meta property="og:description" content="{{ $description }}">
  <meta property="twitter:description" content="{{ $description }}">
@else
  <meta name="description" content="{{ __('site.description') }}">
  <meta property="og:description" content="{{ __('site.description') }}">
  <meta property="twitter:description" content="{{ __('site.description') }}">
@endif
