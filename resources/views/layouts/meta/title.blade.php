@hasSection ('title')
  @php
    $title = $__env->yieldContent('title');
    // 70 - This number must be set for max Title size
    if ((iconv_strlen($title) + iconv_strlen(__('site.title'))) >= 70) {
      $title .= " - ". __('site.title2');
    } else {
      $title .= " - ". __('site.title');
    }
  @endphp

  <title>{{ $title }}</title>
  <meta property="og:title" content="{{ $title }}"/>
  <meta property="twitter:title" content="{{ $title }}"/>
  <meta itemprop="name" content="{{ $title }}" />
  <meta property="vk:title" content="{{ $title }}"/>
@else
  <title>{{ __('site.title') }}</title>
  <meta property="og:title" content="{{ __('site.title') }}"/>
  <meta property="vk:title" content="{{ __('site.title') }}"/>
  <meta property="twitter:title" content="{{ __('site.title') }}"/>
  <meta itemprop="name" content="{{ __('site.title') }}" />
@endif
