@php

  //title
  if($__env->yieldContent('title')) {
    $ldjson_title = $__env->yieldContent('title');
    if ((iconv_strlen($ldjson_title) + iconv_strlen(__('site.title'))) >= 70) {
      $ldjson_title .= " - ". __('site.title2');
    } else {
      $ldjson_title .= " - ". __('site.title');
    }
  } else {
    $ldjson_title = __('site.title');
  }


  //canonical
  if($__env->yieldContent('canonical')) {
    $ldjson_url = $__env->yieldContent('canonical');
  } else {
    $ldjson_url = URL::current();
  }


  //description
  if($__env->yieldContent('description')) {
    $ldjson_description = $__env->yieldContent('description');
  } else {
    $ldjson_description = __('site.description');
  }

@endphp

<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "WebSite",
    "url": "{{ $ldjson_url }}",
    "name": "{{ $ldjson_title }}",
    "description": "{{ $ldjson_description }}"
  }
</script>

@hasSection ('ldjson')
  <script type="application/ld+json">
    {
      @yield('ldjson')
    }
  </script>
@endif
