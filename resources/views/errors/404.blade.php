@extends('errors.err')

@section('title', __('error.404t'))

@section('error')
  {{ __('error.404t') }}
  <small>
    {{ __('error.404') }}
  </small>
@endsection
