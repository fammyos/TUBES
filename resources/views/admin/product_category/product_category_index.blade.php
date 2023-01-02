@extends('layouts.app')

@section('title')
    <title>Product Category</title>
@endsection

@section('content')

    <div class="pagetitle">
        <h1>Product Category Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Product Category</li>
          </ol>
        </nav>
    </div>

    <section class="section">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('invalid'))
            <div class="alert alert-danger">
                {{ session()->get('invalid') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-2">
                        <div class="card-title">
                            <a href="{{route('product.category.create')}}" type="button" class="btn btn-outline-success">Add Product Category</a>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_category as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->category}}</td>
                                        <td>{{$item->stock}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{route('product.category.edit',['id' => $item->id])}}" type="button" class="btn btn-warning"><i class="bi bi-pencil me-1"></i>Edit</a>
                                                <a href="{{route('product.category.delete',['id'=>$item->id])}}" type="button" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
