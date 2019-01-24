@extends('errors.err')

@section('title', __('error.500t'))

@section('error')
  {{ __('error.500t') }}
  <small>
    {{ __('error.500') }}
  </small>
@endsection
