@extends('layouts.full')

@section('title', 'Content 1')
@section('content_class', 'overflow')


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
    <li><a href="#badges">Badges & Labels</a></li>
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

  {{-- Badges --}}
  @include('debug.badges')
  <hr><br>


@endsection
