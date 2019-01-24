@extends('errors.err')

@section('title', __('error.400t'))

@section('error')
  {{ __('error.400t') }}
  <small>
    {{ __('error.400') }}
  </small>
@endsection
