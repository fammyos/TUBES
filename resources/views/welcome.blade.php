@extends('layouts.guest_app')

@section('content')
<header class="bg-transparent py-5" style="background-color: rgba(0,0,0,255) !important;">
    <div class="container px-5">
      <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
          <div class="my-5 text-center text-xl-start">
            <h2 class="display-5 fw-bolder text-white mb-2">iPhone 14</h2>
            <h1 class="display-2 fw-bolder text-white mb-2" style="color: #b344ff !important;">PRO</h1>
            <p class="lead fw-normal text-white-50 mb-4">
              with an elegant and minimalist design is now here.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
              <a class="btn btn-outline-light btn-lg px-4" href="#!">SHOP NOW</a>
            </div>
          </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="./img/bg.png" alt="..." /></div>
      </div>
    </div>
  </header>
  <!-- Features section-->
  <section class="py-5" id="features">
    <div class="container px-5 my-5">
      <div class="row gx-5">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h2 class="fw-bolder mb-0">let's find your favorite item.</h2>
        </div>
        <div class="col-lg-8">
          <div class="row gx-5 row-cols-1 row-cols-md-2">
            <div class="col mb-5 h-100">
              <img src="./img/bg2.png" alt="" width="100%">
              <h2 class="h5 pt-2">iPhone 14 Pro</h2>
              <p class="mb-0">a mobile phone designed to have great capabilities friendly.</p>
            </div>
            <div class="col mb-5 h-100">
              <img src="./img/bg3.png" alt="" width="100%">
              <h2 class="h5 pt-2">iPad Pro</h2>
              <p class="mb-0">ipad which has an elegant and luxurious design.</p>
            </div>
            <div class="col mb-5 mb-md-0 h-100">
              <img src="./img/bg4.png" alt="" width="100%">
              <h2 class="h5 pt-2">iPad M1</h2>
              <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
            </div>
            <div class="col h-100">
              <img src="./img/ip5.jpeg" alt="" width="100%">
              <h2 class="h5 pt-2">iPhone 14</h2>
              <p class="mb-0">
                Always-On Display. And always ready.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonial section-->
  <div class="py-5 bg-light">
    <div class="container px-5 my-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-10 col-xl-7">
          <div class="text-center">
            <div class="fs-4 mb-4 fst-italic">"the more difficult it is to take and live life, believe me someday the results will be even more beautiful!"</div>
            <div class="d-flex align-items-center justify-content-center">
              <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
              <div class="fw-bold">
                U-Gadget
                <span class="fw-bold text-primary mx-1">/</span>
                Mr. Dika's class student
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
