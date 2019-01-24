@extends('errors.err')

@section('title', __('error.405t'))

@section('error')
  {{ __('error.405t') }}
  <small>
    {{ __('error.405') }}
  </small>
@endsection
