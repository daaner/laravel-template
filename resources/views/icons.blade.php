@extends('layouts.full')

@section('content')

  <ul class="list-unstyled block-flex text-center pt-9 pb-9 f-16">
    <li class="p-3 pb-5"><i class="icon bars x4"></i> <br>.bars</li>
    <li class="p-3 pb-5"><i class="icon bell x4"></i> <br>.bell</li>
    <li class="p-3 pb-5"><i class="icon bell_empty x4"></i> <br>.bell</li>

    <li class="p-3 pb-5"><i class="icon chevron_up x4"></i> <br>.chevron_up</li>
    <li class="p-3 pb-5"><i class="icon chevron_down x4"></i> <br>.chevron_down</li>
    <li class="p-3 pb-5"><i class="icon chevron_left x4"></i> <br>.chevron_left</li>
    <li class="p-3 pb-5"><i class="icon chevron_right x4"></i> <br>.chevron_right</li>

    <li class="p-3 pb-5"><i class="icon trash x4"></i> <br>.trash</li>
    <li class="p-3 pb-5"><i class="icon pencil x4"></i> <br>.pencil</li>
    
  </ul>

  <hr>
  <ul class="list-unstyled block-flex text-center pt-9 pb-9 f-16">
    {{-- if need ($i = 1; $i < 100500; $i++) --}}
    @for ($i = 1; $i < 2; $i++)
      <li class="p-3 pb-5"><i class="icon icon{{ $i }} x4 icon-navy"></i> <br>.icon{{ $i }}</li>
    @endfor
  </ul>

@endsection
