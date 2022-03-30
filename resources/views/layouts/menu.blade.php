<nav class="navbar navbar-expand-lg navbar-dark bg-warning mb-4">
  <div class="container">
    <a class="navbar-brand" href="/"><strong>Toko Buku</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('landing') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kategori</a>
        </li>
        <li class="nav-item dropdown">  
          <div class="dropright">
            <a class="nav-link active dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->user_name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="{{ route('userprofile') }}">Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>