@extends('errors.err')

@section('title', __('error.422t'))

@section('error')
  {{ __('error.422t') }}
  <small>
    {{ __('error.422') }}
  </small>
@endsection
