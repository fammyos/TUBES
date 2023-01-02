@extends('layouts.app')
@section('title')
    <title>Edit Product Image</title>
@endsection

@section('content')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Product Image</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Product</h5>

            <form action="{{route('product.img.update', ['id'=>$product_img->id])}}" method="POST" enctype="multipart/form-data" novalidate>
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="product_id">
                            <option disabled value="">Choose Product</option>
                            @foreach ($products as $item)
                            <option value="{{$item->id}}" {{$item->id == $product_img->product_id ? 'selected' : ''}} >{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="formFile" name="url_image">
                    </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" name="" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End General Form Elements -->

            </div>
          </div>
    </div>
</section>
@endsection
