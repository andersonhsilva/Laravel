@extends('layout.base')

@section('corpo')

  @for($i=0; $i < $n; $i++)
    <p>Número: {{$i}}</p>
  @endfor

@endsection
