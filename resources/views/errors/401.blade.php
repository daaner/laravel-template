@extends('errors.err')

@section('title', __('error.401t'))

@section('error')
  {{ __('error.401t') }}
  <small>
    {{ __('error.401') }}
  </small>
@endsection
