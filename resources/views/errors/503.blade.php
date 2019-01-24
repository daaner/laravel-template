@extends('errors.err')

@section('title', __('error.503t'))

@section('error')
  {{ __('error.503t') }}
  <small>
    {{ __('error.503') }}
  </small>
@endsection
