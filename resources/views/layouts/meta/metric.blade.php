@if (env('GOOGLE_ANALYTIC'))
  {{-- <!-- Global site tag (gtag.js) - Google Analytics --> --}}
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTIC') }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ env('GOOGLE_ANALYTIC') }}');
  </script>
@endif

@if (env('YANDEX_METRIC'))
  {{-- <!-- Yandex.Metrika counter --> --}}
  <script type="text/javascript" >
  (function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
      try {
        w.yaCounter{{ env('YANDEX_METRIC') }} = new Ya.Metrika2({
          id:{{ env('YANDEX_METRIC') }},
          clickmap:true,
          trackLinks:true,
          accurateTrackBounce:true,
          webvisor:true
        });
      } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
    s = d.createElement("script"),
    f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js";

    if (w.opera == "[object Opera]") {
      d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
  })(document, window, "yandex_metrika_callbacks2");
  </script>
@endif
