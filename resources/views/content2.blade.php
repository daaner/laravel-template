@extends('layouts.full')

@section('title', __('site.title'))

@section('content-class', '')

{{-- ========== Addition blocks ========== --}}
@section('description')
  Description. Can be empty
@endsection

{{-- If need Canonical. Can be empty --}}
{{-- /profile or $data->url --}}
{{-- !Short path! --}}
@section('canonical', '/content2')

@section('script')
  {{-- Link to addition scripts for this page --}}
@endsection

@section('style')
  {{-- Link to addition style for this page --}}
@endsection


{{-- ========== Main blocks ========== --}}
@section('content')
  <h1>Contents</h1>
  <br>
  <ul>
    <li><a href="#columns">Columns</a></li>
    <li><a href="#forms">Forms</a></li>

  </ul>
  <br>
  <hr><br>

  {{-- columns --}}
  @include('debug.cols')
  <hr><br>

  {{-- forms --}}
  @include('debug.forms')
  <hr><br>


@endsection
