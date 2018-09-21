<h1>Loop - Foreach - Arrays Associativos</h1>

@foreach ($produtos as $p)
    <p>{{$p['id']}} - {{$p['nome']}}</p>
@endforeach
