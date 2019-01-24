@extends('errors.err')

@section('title', __('error.502t'))

@section('error')
  {{ __('error.502t') }}
  <small>
    {{ __('error.502') }}
  </small>
@endsection
