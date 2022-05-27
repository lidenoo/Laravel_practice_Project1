
@extends('application')

@section('main')
@endsection
<h1>HI</h1>
{{$name}}
{!!$js!!}

@if (count($heros)>0)
    @foreach ($heros as $hero )

    <li>
        {{$hero}}
    </li>

    @endforeach

@endif
