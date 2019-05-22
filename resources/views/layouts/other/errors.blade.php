@if (session('success_message'))
  <script type="text/javascript">
    new Noty({
      type: 'success',
      layout: 'topRight',
      timeout: 5000,
      progressBar: true,
      text: '{{ session('success_message') }}'
    }).show();
  </script>
@endif

@if (session('warning_message'))
  <script type="text/javascript">
    new Noty({
      type: 'warning',
      layout: 'topRight',
      timeout: 5000,
      progressBar: true,
      text: '{{ session('warning_message') }}'
    }).show();
  </script>
@endif

@if (session('error_message'))
  <script type="text/javascript">
    new Noty({
      type: 'error',
      layout: 'topRight',
      timeout: 5000,
      progressBar: true,
      text: '{{ session('error_message') }}'
    }).show();
  </script>
@endif
