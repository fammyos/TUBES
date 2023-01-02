@extends('layouts.app')
@section('title')
    <title>Edit Product Category</title>
@endsection

@section('content')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Product Category</li>
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
              <h5 class="card-title">Edit Product Category</h5>

            <form action="{{route('product.category.update', ['id'=>$product_category->id])}}" method="POST" novalidate>
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                  <div class="col-sm-10">
                    <input type="text" name="category" class="form-control" value="{{$product_category->category}}" autocomplete="category" placeholder="category" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Stock</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" name="stock" class="form-control" value="{{$product_category->stock}}" autocomplete="stock" placeholder="Stock" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Product</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="product_id">
                            <option selected disabled value="">Choose Product</option>
                            @foreach ($products as $item)
                            <option value="{{$item->id}}" {{$item->id == $product_category->product_id ? 'selected' : ''}}>{{$item->name}}</option>
                            @endforeach
                        </select>
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
