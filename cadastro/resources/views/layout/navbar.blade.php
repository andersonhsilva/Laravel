<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Sistema</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li @if($current_link=="produtos") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/produtos"><i class="fas fa-user-tie fa-3x"></i> Produtos</a>
      </li>
      <li @if($current_link=="categorias") class="nav-item active" @else class="nav-item" @endif>
        <a class="nav-link" href="/categorias"><i class="fas fa-archive fa-3x"></i> Categorias</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
