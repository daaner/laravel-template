@extends('layouts.full')

@section('content')

  <p>
    SVG иконки наследуют цвет текста или же можно конкретно указать в теге i
  </p>

  <ul class="list-unstyled list-inline text-center pt-9 pb-9 f-16">
    <li class="p-3 pb-5"><i class="icon bars x4"></i> <br>.bars</li>
    <li class="p-3 pb-5"><i class="icon bell x4"></i> <br>.bell</li>
    <li class="p-3 pb-5"><i class="icon bell_empty x4"></i> <br>.bell</li>

    <li class="p-3 pb-5"><i class="icon chevron_up x4"></i> <br>.chevron_up</li>
    <li class="p-3 pb-5"><i class="icon chevron_down x4"></i> <br>.chevron_down</li>
    <li class="p-3 pb-5"><i class="icon chevron_left x4"></i> <br>.chevron_left</li>
    <li class="p-3 pb-5"><i class="icon chevron_right x4"></i> <br>.chevron_right</li>

    <li class="p-3 pb-5"><i class="icon cogs x4"></i> <br>.cogs</li>
    <li class="p-3 pb-5"><i class="icon exit x4"></i> <br>.exit</li>

    <li class="p-3 pb-5"><i class="icon trash x4 icon-primary"></i> <br>.trash</li>
    <li class="p-3 pb-5 text-red"><i class="icon pencil x4"></i> <br>.pencil</li>
    <li class="p-3 pb-5"><i class="icon eraser x4"></i> <br>.eraser</li>

    <li class="p-3 pb-5"><i class="icon facebook x4"></i> <br>.facebook</li>
    <li class="p-3 pb-5"><i class="icon instagram x4"></i> <br>.instagram</li>
    <li class="p-3 pb-5"><i class="icon linkedin x4"></i> <br>.linkedin</li>
    <li class="p-3 pb-5"><i class="icon twitter x4"></i> <br>.twitter</li>
    <li class="p-3 pb-5"><i class="icon vimeo x4"></i> <br>.vimeo</li>
    <li class="p-3 pb-5"><i class="icon youtube x4"></i> <br>.youtube</li>
  </ul>

  <hr>
  <h3>Иконки пачкой (которые не именные, а с цифровми именами)</h3>
  <ul class="list-unstyled list-inline text-center pt-9 pb-9 f-16">
    {{-- if need ($i = 1; $i < 100500; $i++) --}}
    @for ($i = 1; $i <= 2; $i++)
      <li class="p-3 pb-5"><i class="icon icon{{ $i }} x4 icon-navy"></i> <br>.icon{{ $i }}</li>
    @endfor
  </ul>

@endsection
