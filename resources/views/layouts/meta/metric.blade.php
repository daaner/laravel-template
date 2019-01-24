@if (config('app.google_analytic'))
  {{-- <!-- Global site tag (gtag.js) - Google Analytics --> --}}
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('app.google_analytic') }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '{{ config('app.google_analytic') }}');
  </script>
@endif

@if (config('app.yandex_metric'))
  {{-- <!-- Yandex.Metrika counter --> --}}
  <script type="text/javascript" >
  (function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
      try {
        w.yaCounter{{ config('app.yandex_metric') }} = new Ya.Metrika2({
          id:{{ config('app.yandex_metric') }},
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
