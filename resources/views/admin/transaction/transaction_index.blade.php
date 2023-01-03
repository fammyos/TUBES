@extends('layouts.app')

@section('title')
    <title>Transaction</title>
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
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>Transaction Id</th>
                                    <th>User</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Zip Code</th>
                                    <th>Courier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{!! Str::limit($item->address, 10, ' ...') !!}</td>
                                    <td>{{$item->city}}</td>
                                    <td>{{$item->province}}</td>
                                    <td>{{$item->zip_code}}</td>
                                    <td>{{$item->courier}}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{route('transaction.detail', ['id'=>$item->id])}}" type="button" class="btn btn-info"><i class="bi bi-file me-1"></i>View</a>
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
