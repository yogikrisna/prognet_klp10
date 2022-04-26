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
          <center><img src="/storage/{{$gambar_product->image_name}}"  alt="" style="height:400px; width:400px"></center>
          <div class="card-content">
            <h3 class="title" style="text-align:center;">{{ $data->product_name}}</h3>
            <p class="post-meta" style="text-align:center;."><span>{{ $data->created_at }} </span> | Price : <a>{{ $data->price }}</a></p>
            <article>
            <h2 class="sr-only">
            {{ $data->price }}
            </h2>
            <!-- <p>Maria Denardo is the Fashion Director theFashion Spot at. Prior to joining tFS, she worked as... -->
            <p>  {{ strip_tags($data->description) }}
            </p>
            </article>
        </div>
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
