@auth

<h4>voce está logado</h4>
<p>{{ Auth::user()->name }}</p>
<p>{{ Auth::user()->email }}</p>
<p>{{ Auth::user()->id }}</p>

@endauth

@guest

<h4>voce não está logado!</h4>

@endguest
