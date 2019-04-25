<meta http-equiv="content-language" content="{{ config('app.locale') }}">

{{-- add alternate lng manual --}}
{{-- <link rel="alternate" href="{{ URL::current().'?lng=ru' }}" hreflang="ru"> --}}

@hasSection ('canonical')
  <link rel="canonical" href="@yield('canonical')">
  <meta property="og:url" content= "@yield('canonical')" />
  <meta property="twitter:url" content= "@yield('canonical')" />
  <meta property="vk:url" content= "@yield('canonical')" />
@else
  <link rel="canonical" href="{{ URL::current() }}">
  <meta property="og:url" content= "{{ URL::current() }}" />
  <meta property="twitter:url" content= "{{ URL::current() }}" />
  <meta property="vk:url" content= "{{ URL::current() }}" />
@endif

<meta property="og:locale" content="{{ __('site.og-locale') }}" />
