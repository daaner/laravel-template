<meta name="twitter:card" content="summary_large_image" />

@hasSection ('og_image')
  <meta name="image" content="@yield('og_image')"/>
  <meta property="og:image" content="@yield('og_image')"/>
  <meta property="twitter:image" content="@yield('og_image')"/>
@endif
@hasSection ('og_image_alt')
  <meta property="og:image:alt" content="@yield('og_image_alt')"/>
  <meta property="twitter:image:alt" content="@yield('og_image_alt')"/>
@else
  <meta property="og:image:alt" content="{{ trans('site.title') }}"/>
  <meta property="twitter:image:alt" content="{{ trans('site.title') }}"/>
@endif


<meta name="image" content="{{ URL::to('/images/og_image.jpg') }}"/>
<meta name="image" content="{{ URL::to('/images/no_image.jpg') }}"/>
<meta property="og:image" content="{{ URL::to('/images/og_image.jpg') }}"/>
<meta property="og:image" content="{{ URL::to('/images/no_image.jpg') }}"/>
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="twitter:image" content="{{ URL::to('/images/og_image.jpg') }}"/>
<meta property="twitter:image" content="{{ URL::to('/images/no_image.jpg') }}"/>

<meta property="og:type" content="website" />
<meta property="og:site_name" content="{{ trans('site.title') }}"/>
