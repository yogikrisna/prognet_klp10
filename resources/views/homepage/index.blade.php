<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Toko Buku</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Use Minified Plugins Version For Fast Page Load -->
  <link rel="stylesheet" type="text/css" media="screen" href="/css2/plugins.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="/css2/main.css" />
  <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" type="text/css" href="/css/glyphicons.css">
  <link rel="stylesheet" type="text/css" href="../css/star.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
  <div class="site-wrapper" id="top">
    <div class="site-header d-none d-lg-block">
     @include('layouts.menu')
    </div>
    <section class="inner-page-sec-padding-bottom space-db--30">
      <div class="container">
          <div class="row space-db-lg--60 space-db--30">
          @foreach($datas as $data)
            <div class="col-lg-4 col-md-6 mb-lg--60 mb--30">
              <div class="blog-card card-style-grid text-center">
                <a href="blog-details.html" class="image d-block">
                  @foreach($data->product_images as $cc)
                  <img src="/storage/{{$cc->image_name}}" style="height:400px; width:250px;">
                  @endforeach
                </a>
                <div class="card-content">
                  <h3 class="title" style="text-align:center;"><a href="{{route('detail-product',$data->id)}}">{{ $data->product_name}}</a></h3>
                  <p class="post-meta" style="text-align:center;"><span>{{ $data->created_at }} </span> | Price : <a>{{ $data->price }}</a></p>
                  <article>
                    <h2 class="sr-only">
                    {{ $data->price }}
                    </h2>
                    <div class="rating">
                      <input type="radio" name="star" id="star1"><label for="star1"></label>
                      <input type="radio" name="star" id="star2"><label for="star2"></label>
                      <input type="radio" name="star" id="star3"><label for="star3"></label>
                      <input type="radio" name="star" id="star4"><label for="star4"></label>
                      <input type="radio" name="star" id="star5"><label for="star5"></label>
                    </div>
                    <!-- <p>Maria Denardo is the Fashion Director theFashion Spot at. Prior to joining tFS, she worked as... -->
                    <!-- <p>  {{ strip_tags($data->description) }}
                    </p> -->
                  </article>
                </div>
              </div>
            </div>
          @endforeach
          </div>
      </div>
    </section>
  </div>

  <!--=================================
=================================
    Footer Area
===================================== -->

  <footer class="site-footer">
    <div class="container">
      <div class="row justify-content-between  section-padding">
        <div class=" col-xl-3 col-lg-4 col-sm-6">
          <div class="single-footer pb--40">
            <div class="brand-footer footer-title">
              <img src="image/logo gramedia.png" alt="">
            </div>
            <div class="footer-contact">
              <p><span class="label">Address:</span><span class="text">Jalan Kampus TI Kuta-Bali</span></p>
              <p><span class="label">Phone:</span><span class="text">++6281236227037</span></p>
              <p><span class="label">Email:</span><span class="text">gmedia@prognet.com</span></p>
            </div>
          </div>
        </div>
        <div class=" col-xl-3 col-lg-2 col-sm-6">
          <div class="single-footer pb--40">
            <div class="footer-title">
              <h3>Information</h3>
            </div>
            <ul class="footer-list normal-list">
              <li><a href="">New products</a></li>
              <li><a href="">Best sales</a></li>
            </ul>
          </div>
        </div>
        <div class=" col-xl-3 col-lg-2 col-sm-6">
          <div class="single-footer pb--40">
            <div class="footer-title">
              <h3>Extras</h3>
            </div>
            <ul class="footer-list normal-list">
              <li><a href="">About Us</a></li>
              <li><a href="">Contact us</a></li>
            </ul>
          </div>
        </div>
        <div class=" col-xl-3 col-lg-4 col-sm-6">
          <div class="footer-title">
            <h3>Newsletter Subscribe</h3>
          </div>
          <div class="newsletter-form mb--30">
            <form action="./php/mail.php">
              <input type="email" class="form-control" placeholder="Enter Your Email Address Here...">
              <button class="btn btn--primary w-100">Subscribe</button>
            </form>
          </div>
          <div class="social-block">
            <h3 class="title">STAY CONNECTED</h3>
            <ul class="social-list list-inline">
              <li class="single-social facebook"><a href=""><i class="ion ion-social-facebook"></i></a></li>
              <li class="single-social twitter"><a href=""><i class="ion ion-social-twitter"></i></a></li>
              <li class="single-social google"><a href=""><i class="ion ion-social-googleplus-outline"></i></a></li>
              <li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <p class="copyright-heading">Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam vel magna volutpat, posuere eros</p>
        <a href="#" class="payment-block">
          <img src="image/icon/payment.png" alt="">
        </a>
        <p class="copyright-text">Copyright © 2019 <a href="#" class="author">Kelompok 10</a>. All Right Reserved. <br>
        Design By Kelompok 10</p>
      </div>
    </div>
  </footer>
  <!-- Use Minified Plugins Version For Fast Page Load -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="js/plugins.js"></script>
  <script src="js/ajax-mail.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>



<!-- <!doctype html>
<html lang="en">
  <head>
    Required meta tags
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <!-- fontawesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  </head>
  <body> -->
    <!-- menunya kita taruh persis di bawah <body> --> 
    <!-- @include('layouts.menu') -->
    <!-- di bawah menu baru kontennya -->
      <!-- <div class="container"> -->
        <!-- carousel -->
        <!-- <div class="container"> -->
        <!-- carousel -->
        <!-- <div class="row">
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
        </div> -->
        <!-- end carousel -->
         
        <!-- <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Produk</h2>
          </div> -->
          <!-- produk pertama -->
          <!-- @foreach ($datas as $produk)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <a href="{{ URL::to('produk/satu') }}">
                <img src="{{asset('images/HP1.jpg') }}" alt="foto produk" class="card-img-top">
              </a>
              <div class="card-body">
                <a href="{{ URL::to('produk/satu') }}" class="text-decoration-none">
                  <p class="card-text">
                  Dilan 1990{{ $produk->product_name}}
                  </p>
                </a>
                <div class="row mt-4">
                  <div class="col">
                    <button class="btn btn-light">
                      <i class="far fa-heart"></i>
                    </button>
                  </div>
                  <div class="col-auto">
                    <p> -->
                      <!-- <del> Rp. 15.000,00   </del> -->
                      <!-- {{ $produk->price}}
                      <br /> -->
                      <!-- Rp. 10.000,00 -->

                    <!-- </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach -->

        <!-- end carousel -->

        <!-- kategori produk -->
        <!-- <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Kategori Produk</h2>
          </div> -->
          <!-- kategori pertama -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- kategori kedua -->
          <!-- <div class="col-md-4">
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
          </div>-->
          <!-- kategori ketiga -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- kategori keempat -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- kategori kelima -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- kategori keenam -->
          <!-- <div class="col-md-4">
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
        </div>-->
        <!-- end kategori produk -->

        <!-- produk Promo-->
        
          
          <!-- produk kedua -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- produk ketiga -->
          <!-- <div class="col-md-4">
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
        </div> -->
        <!-- end produk promo -->

        <!-- produk Terbaru-->
        <!-- <div class="row mt-4">
          <div class="col col-md-12 col-sm-12 mb-4">
            <h2 class="text-center">Terbaru</h2>
          </div> -->
          <!-- produk pertama -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- produk kedua -->
          <!-- <div class="col-md-4">
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
          </div> -->
          <!-- produk ketiga -->
          <!-- <div class="col-md-4">
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
        </div> -->
        <!-- end produk terbaru -->
      <!-- </div>
    @include('layouts.footer')

    Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html> --> 