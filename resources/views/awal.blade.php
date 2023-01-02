<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

        <!-- CSS Custom -->
        <link rel="stylesheet" href="{{assets('assets_user/button.css')}}">
        <link rel="stylesheet" href="{{assets('assets_user/carousel.css')}}">
        <link rel="stylesheet" href="{{assets('assets_user/card.css')}}">
  </head>
  <body>

  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #f5f5f7;">
      <div class="container">
        <a class="navbar-brand" style="font-weight: 500;" href="#">U-Gadget</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="bi bi-cart"></i></a>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          </form>
          <a class="btn btn-primary cssbuttons-io" type="submit" href="#" role="button"><span>Search</span></a>
          <a class="btn btn-primary cssbuttons-io" href="{{ route('login') }}" role="button"><span>Login</span></a>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./img/ip3.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-lg-8 mx-auto">
                        <h2 class="text-dark">iPhone 14</h2>
                          <p class="text-dark">Introduce Our New Product</p>
                          <a class="btn btn-primary cssbuttons-io" href="#" role="button"><span>SHOP NOW</span></a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/ip3.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <div class="container">
                <div class="row justify-content-start text-left">
                    <div class="col-lg-8 mx-auto">
                      <h2 class="text-dark">iPhone 14</h2>
                      <p class="text-dark">Introduce Our New Product</p>
                      <a class="btn btn-primary cssbuttons-io" href="#" role="button"><span>SHOP NOW</span></a>
                    </div>
                </div>
            </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="./img/ip3.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <div class="container">
                <div class="row justify-content-start text-left">
                    <div class="col-lg-8 mx-auto">
                    <h2 class="text-dark">iPhone 14</h2>
                      <p class="text-dark">Introduce Our New Product</p>
                      <a class="btn btn-primary cssbuttons-io" href="#" role="button"><span>SHOP NOW</span></a>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- End Carousel -->

  <!-- middle -->
  <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-inner pt-3">
          <div class="carousel-item active">
            <img src="./img/ipad.jpg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block" style="left: 68%; top: 72%; transform: translateY(-95%)">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col-lg-8 mx-auto"">
                          <h4 class="text-dark">extraordinary. luxurious</h4>
                          <a class="btn btn-primary cssbuttons-io" href="#" role="button"><span>Detail</span></a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  <!-- End Middle -->

  <!-- Lower -->
  <section class="lower" id="lower">
    <div class="container pt-5 text-center">
      <div class="row justify-content-center">
        <div class="col-6">
        <div class="card text-bg-dark">
          <img src="./img/ipro.png" class="card-img" style="height: 425px;" alt="...">
          <div class="card-img-overlay">
            <h2 class="card-title pt-4">iPhone 14 Pro</h2>
            <p class="card-text">getting pro.</p>
            <a href="#" class="card-text nav-link text-primary"><small>Detail</small></a>
          </div>
        </div>
        </div>
        <div class="col-6">
        <div class="card text-bg-dark">
          <img src="./img/ipadpro.jpg" class="card-img" style="height: 425px;" alt="...">
          <div class="card-img-overlay">
          <h2 class="card-title pt-4">iPad Pro</h2>
            <p class="card-text">super close and elegant.</p>
            <a href="#" class="card-text nav-link text-primary"><small>Detail</small></a>
          </div>
        </div>
        </div>
      </div>

      <div class="row pt-3 justify-content-center">
        <div class="col-6">
        <div class="card text border-light">
          <img src="./img/ip13.jpeg" class="card-img" style="height: 425px;"   alt="...">
          <div class="card-img-overlay">
          <h2 class="card-title pt-4">iPhone 13 Pro</h2>
          <p class="card-text">getting pro.</p>
            <a href="#" class="card-text nav-link text-primary"><small>Detail</small></a>
          </div>
        </div>
        </div>
        <div class="col-6">
        <div class="card text-bg-trasnparent border-light">
          <img src="./img/ip12.jpg" class="card-img" style="height: 425px; backgroud-color: #f5f5f7 ;" alt="...">
          <div class="card-img-overlay">
          <h2 class="card-title pt-4">iPad Pro</h2>
            <p class="card-text">super close and elegant.</p>
            <a href="#" class="card-text nav-link text-primary"><small>Detail</small></a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Lower -->

    <!-- Product -->
    <section class="collection" id="collection">
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-inner pt-5">
          <div class="carousel-item active">
            <img src="./img/ip5.jpeg" class="d-block w-100 img-fluid" alt="...">
            <div class="carousel-caption d-none d-md-block" style="left: 68%; top: 65%; transform: translateY(-95%)">
              <div class="container">
                  <div class="row justify-content-start text-left">
                      <div class="col mx-auto"">
                          <h2 class="text-dark">Redesign</h2>
                          <p class="text-dark">and regenerated with new abilities</p>
                          <a class="btn btn-primary cssbuttons-io" href="#" role="button"><span>Detail</span></a>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
    <!-- End Product -->

    <!-- Footer -->
    <footer class="bg-trasnparent text-dark text-center p-3" style="background-color: #f5f5f7;">
      <p>Created with love <i class="bi bi-heart-fill text-danger"></i> by <a class="text-dark fw-bold" href="https://www.instagram.com/fammyos/">U-Gadget</a></p>
    </footer>
    <!-- End Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
