@extends('layouts.app')

@section('title')
    <title>Users</title>
@endsection

@section('content')

    <div class="pagetitle">
        <h1>User Page</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">User</li>
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
                            {{-- <a href="{{route('product.create')}}" type="button" class="btn btn-outline-success">Add Product</a> --}}
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->username}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{route('user.edit', ['id' => $item->id])}}" type="button" class="btn btn-warning"><i class="bi bi-pencil me-1"></i>Edit</a>
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
