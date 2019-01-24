@extends('errors.err')

@section('title', __('error.403t'))

@section('error')
  {{ __('error.403t') }}
  <small>
    {{ __('error.403') }}
  </small>
@endsection
