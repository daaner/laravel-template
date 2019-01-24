@extends('errors.err')

@section('title', __('error.409t'))

@section('error')
  {{ __('error.409t') }}
  <small>
    {{ __('error.409') }}
  </small>
@endsection
