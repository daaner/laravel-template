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


{{-- Admin Errors --}}
@if (Gate::allows('admin-only', auth()->user()))

  @if ($settings['disable_site'])
    <script type="text/javascript">
      new Noty({
        type: 'error',
        layout: 'bottom',
        text: '{{ __('error.521') }}'
      }).show();
    </script>
  @endif

  @if (!$settings['enable_register'])
    <script type="text/javascript">
      new Noty({
        type: 'error',
        layout: 'bottom',
        text: '{{ __('api.admin.noreg') }}',
        timeout: 3000,
        progressBar: true,
      }).show();
    </script>
  @endif

@endif
