@extends('layouts.app')

@section('title')
    <title>Product</title>
@endsection

@section('content')

    <div class="pagetitle">
        <h1>Product Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Product</li>
          </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body m-2">
                        <div class="card-title">
                            <a href="{{route('product.create')}}" type="button" class="btn btn-outline-success">Add Product</a>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Type</th>
                                    <th>Manufacturer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>@currency($item->price)</td>
                                        <td>{{$item->stock}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>{{$item->manufacturer}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                {{-- <button type="button" class="btn btn-info"><i class="bi bi-file me-1"></i>View</button> --}}
                                                <a href="{{route('product.edit',['id' => $item->id])}}" type="button" class="btn btn-warning"><i class="bi bi-pencil me-1"></i>Edit</a>
                                                <a href="{{route('product.delete',['id'=>$item->id])}}" type="button" class="btn btn-danger"><i class="bi bi-trash me-1"></i>Delete</a>
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
