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
