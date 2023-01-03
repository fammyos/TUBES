<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>U-Gadget</title>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('asset_detail_product/css/styles.css')}}" rel="stylesheet" />
        <link rel="icon" href="{{asset('assets/img/img/u_gadget.png')}}">

  </head>
  <body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{route('welcome')}}">U-Gadget</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('about.us')}}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('product.guest')}}">Product</a></li>
            </ul>
            {{-- <form class="d-flex"> --}}
                <a href="{{route('cart')}}" class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{$cart_item}}</span>
                </a>
            {{-- </form> --}}
            @if (!Auth::user())
            <div style="margin-left: 15px">
                <a class="btn btn-dark" href="{{ route('login') }}" role="button"><span>Sign In</span></a>
                <a class="btn btn-outline-dark" type="submit" href="{{route('register')}}" role="button"><span>Sign Up</span></a>
            </div>
            @else

              <a class="nav-link nav-profile d-flex align-items-center pe-0" style="margin-left: 15px" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
              </a><!-- End Profile Iamge Icon -->
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        {{ csrf_field() }}
                        <button class="dropdown-item d-flex align-items-center">
                          <i class="bi bi-box-arrow-right"></i>
                          <span>Sign Out</span>
                        </button>
                    </form>
                </li>

              </ul>
            @endif
        </div>
    </div>
</nav>
    <!-- End Navbar -->

    @yield('content')

    <!-- Footer -->
    <footer class="bg-trasnparent text-dark text-center p-3" style="background-color: #f5f5f7;">
      <p>Created with love <i class="bi bi-heart-fill text-danger"></i> by <a class="text-dark fw-bold" href="https://www.instagram.com/fammyos/">U-Gadget</a></p>
    </footer>
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
