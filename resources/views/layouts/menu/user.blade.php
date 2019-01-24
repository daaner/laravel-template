{{-- User menu --}}
<ul id="mobilemenu">
  <li>
    <a href="#">User menu -
      {{ __('site.menu.main') }}
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.profile') }}
    </a>
  </li>

  <li>
    <a href="#">
      {{ __('site.admin') }}
    </a>
  </li>

</ul>

<a href="javascript:document.getElementById('mobilemenu').classList.toggle('show');" class="menu-button" ><i class="icon bars"></i></a>
