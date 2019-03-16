@extends('layouts.full')

@section('title', __('site.title'))

@section('body_class', 'body_custom_class')

{{-- ========== Addition blocks ========== --}}
@section('description')
  Description. Can be empty
@endsection

{{-- If need Canonical. Can be empty --}}
{{-- /profile or $data->url --}}
{{-- !Short path! --}}
@section('canonical', '/content')

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
    <li><a href="#colors">Colors & backgrounds</a></li>
    <li><a href="#header">Headers</a></li>
    <li><a href="#lists">Lists</a></li>
    <li><a href="#paragraph">Paragraph</a></li>
    <li><a href="#Buttons">Buttons</a></li>
    <li><a href="#border">Borders</a></li>
    <li><a href="#paddings">Paddings</a></li>
    <li><a href="#margins">Margins</a></li>
  </ul>
  <br>
  <hr><br>

  {{-- colors --}}
  @include('debug.colors')
  <hr><br>

  {{-- headers --}}
  @include('debug.headers')
  <hr><br>

  {{-- lists --}}
  @include('debug.lists')
  <hr><br>

  {{-- paragraph --}}
  @include('debug.paragraph')
  <hr><br>

  {{-- Buttons --}}
  @include('debug.buttons')
  <hr><br>

  {{-- Borders --}}
  @include('debug.borders')
  <hr><br>

  {{-- Paddings --}}
  @include('debug.paddings')
  <hr><br>

  {{-- Margins --}}
  @include('debug.margins')
  <hr><br>










@endsection
