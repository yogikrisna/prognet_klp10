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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col col-lg-4 col-md-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img src="{{ asset('img/avatar4.png') }}" alt="profil" class="profile-user-img img-responsive img-circle-elevation-2">
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->user_name }}</h3>
                        <p class="text-muted text-center">Terverifikasi pada {{ Auth::user()->email_verified_at }}</p>
                        <hr>
                        <strong>
                            <i class="fas fa-envelope mr-2"></i>
                            Email
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->email }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-map-marker mr-2"></i>
                            Alamat
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->alamat }}
                        </p>
                        <hr>
                        <strong>
                            <i class="fas fa-phone mr-2"></i>
                            Telepon
                        </strong>
                        <p class="text-muted">
                            {{ Auth::user()->telepon }}
                        </p>
                    </div>
                </div>      
            </div>
        </div>
    </div>
    @include('layouts.footer')

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>