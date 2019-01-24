@extends('errors.err')

@section('title', __('error.429t'))

@section('error')
  {{ __('error.429t') }}
  <small>
    {{ __('error.429') }}
  </small>
@endsection
