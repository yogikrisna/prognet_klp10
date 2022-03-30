<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>{{ $title }}</title>
  </head>
  <body>
    <!-- menunya kita taruh persis di bawah <body> -->
    @include('layouts.menu')
    <!-- di bawah menu baru kontennya -->
      <div class="container">
        <!-- carousel -->
        <div class="row">
          <div class="col">
            <div id="carousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ asset('images/dilan.jpg') }}" class="rounded mx-auto d-block w-30" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images/HP1.jpg') }}" class="rounded mx-auto d-block w-30" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="{{ asset('images/SK1.jpg') }}" class="rounded mx-auto d-block w-30" alt="...">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
        <!-- end carousel -->

        <!-- kategori produk -->
        <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Kategori Produk</h2>
          </div>
          <!-- kategori pertama -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/satu') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/satu') }}" class="text-decoration-none">
                  <p class="card-text">Fiksi</p>
                </a>
              </div>
            </div>
          </div>
          <!-- kategori kedua -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/dua') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/dua') }}" class="text-decoration-none">
                  <p class="card-text">Komedi</p>
                </a>
              </div>
            </div>
          </div>
          <!-- kategori ketiga -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/tiga') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/tiga') }}" class="text-decoration-none">
                  <p class="card-text">Horor</p>
                </a>
              </div>
            </div>
          </div>
          <!-- kategori keempat -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/empat') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/empat') }}" class="text-decoration-none">
                  <p class="card-text">Drama</p>
                </a>
              </div>
            </div>
          </div>
          <!-- kategori kelima -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/lima') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/lima') }}" class="text-decoration-none">
                  <p class="card-text">Medis</p>
                </a>
              </div>
            </div>
          </div>
          <!-- kategori keenam -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('kategori/enam') }}">
                <img src="{{asset('images/t1.jpeg') }}" alt="foto kategori" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('kategori/enam') }}" class="text-decoration-none">
                  <p class="card-text">Sejarah</p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end kategori produk -->

        <!-- produk Promo-->
        <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Promo</h2>
          </div>
          <!-- produk pertama -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/satu') }}">
                <img src="{{asset('images/dilan.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/satu') }}" class="text-decoration-none">
                  <p class="card-text">
                  Dilan 1990
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      <del>Rp. 15.000,00</del>
                      <br />
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- produk kedua -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/dua') }}">
                <img src="{{asset('images/SK1.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/dua') }}" class="text-decoration-none">
                  <p class="card-text">
                  Skripsick: Derita Mahasiswa Abadi 
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      <del>Rp. 15.000,00</del>
                      <br />
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- produk ketiga -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/tiga') }}">
                <img src="{{asset('images/HP1.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/tiga') }}" class="text-decoration-none">
                  <p class="card-text">
                  Harry Potter dan Batu Bertuah
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      <del>Rp. 15.000,00</del>
                      <br />
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end produk promo -->

        <!-- produk Terbaru-->
        <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Terbaru</h2>
          </div>
          <!-- produk pertama -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/satu') }}">
                <img src="{{asset('images/dilan.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/satu') }}" class="text-decoration-none">
                  <p class="card-text">
                  Dilan 1990
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- produk kedua -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/dua') }}">
                <img src="{{asset('images/SK1.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/dua') }}" class="text-decoration-none">
                  <p class="card-text">
                  Skripsick: Derita Mahasiswa Abadi 
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- produk ketiga -->
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/tiga') }}">
                <img src="{{asset('images/HP1.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/tiga') }}" class="text-decoration-none">
                  <p class="card-text">
                  Harry Potter dan Batu Bertuah
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p>
                      Rp. 10.000,00
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end produk terbaru -->
      </div>
    @include('layouts.footer')

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>