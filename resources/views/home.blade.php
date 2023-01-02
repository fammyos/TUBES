@extends('layouts.app')
@section('title')
<title>Dashboard</title>
@endsection

@section('content')

<div class="pagetitle">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">


    <div class="col-xxl-4 col-md-6">

      <div class="card info-card revenue-card">
        <div class="card-body">
          <h5 class="card-title">User</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-person"></i>
            </div>
            <div class="ps-3">
              <h6>{{$users}} User</h6>
            </div>
          </div>
        </div>

      </div>

    </div>

    <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card">

        <div class="card-body">
          <h5 class="card-title">Product</h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-phone"></i>
            </div>
            <div class="ps-3">
              <h6>{{$products}} Item</h6>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection