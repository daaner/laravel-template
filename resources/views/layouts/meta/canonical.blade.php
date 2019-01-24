<meta http-equiv="content-language" content="{{ config('app.locale') }}">

{{-- add alternate lng manual --}}
{{-- <link rel="alternate" href="{{ URL::current().'?lng=ru' }}" hreflang="ru"> --}}

<meta property="og:url" content= "{{ URL::current() }}" />
<meta property="twitter:url" content= "{{ URL::current() }}" />

<meta property="og:locale" content="{{ __('site.og-locale') }}" />

@hasSection ('canonical')
  <link rel="canonical" href="@yield('canonical')">
@else
  <link rel="canonical" href="{{ URL::current() }}">
@endif
