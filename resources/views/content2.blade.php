@extends('layouts.full')

@section('title', 'Content 2')


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
