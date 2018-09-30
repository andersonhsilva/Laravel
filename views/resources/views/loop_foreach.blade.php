@extends('layout.base')
@section('corpo','')

<h1>Loop - Foreach - Arrays Associativos</h1>

@foreach ($produtos as $p)
    {{$p['id']}} - {{$p['nome']}}</br>
@endforeach

<hr>

@foreach ($produtos as $p)

  @if ($loop->first)
    (inicia loop)</br>
  @endif

  {{$p['id']}} - {{$p['nome']}}
  <span class="badge badge-dark">{{$loop->index}} / {{$loop->count-1}} resta -> {{$loop->remaining}}</span>
  <span class="badge badge-warning">{{$loop->iteration}} / {{$loop->count}}</span><br>

  @if ($loop->last)
    (termina loop)</br>
  @endif

@endforeach
