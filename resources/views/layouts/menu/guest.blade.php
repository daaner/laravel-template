{{-- Guest menu --}}
<ul id="mobilemenu">
  <li>
    <a href="#">Guest menu -
      {{ __('site.menu.main') }}
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.about') }}
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.help') }}
    </a>
  </li>

</ul>

<a href="javascript:document.getElementById('mobilemenu').classList.toggle('show');" class="menu-button" ><i class="icon bars"></i></a>
