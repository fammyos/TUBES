@extends('layouts.app')
@section('title')
    <title>Add Product</title>
@endsection

@section('content')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item active">Create</li>
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

            <form action="{{route('product.store')}}" method="POST" novalidate>
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Product Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" autocomplete="name" placeholder="Product Name" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" name="price" class="form-control" value="{{old('price')}}" autocomplete="price" placeholder="Price" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" name="stock" class="form-control" value="{{old('stock')}}" autocomplete="stock" placeholder="Stock" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="description" value="{{old('description')}}" autocomplete="description" placeholder="Description" required style="height: 150px"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="type">
                            <option selected disabled value="">Choose Product Type</option>
                            <option value="exist">Exist</option>
                            <option value="preOrder">Pre Order</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Manufacturer</label>
                    <div class="col-sm-10">
                      <input type="text" name="manufacturer" class="form-control" value="{{old('manufacturer')}}" autocomplete="manufacturer" placeholder="Manufacturer" required>
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
