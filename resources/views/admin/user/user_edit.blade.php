@extends('layouts.app')
@section('title')
    <title>Edit User</title>
@endsection

@section('content')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">User</li>
        <li class="breadcrumb-item">Edit</li>
        <li class="breadcrumb-item active">{{$user->name}}</li>
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
              <h5 class="card-title">Edit User</h5>

            <form action="{{route('user.update', ['id'=>$user->id])}}" method="POST" novalidate>
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" autocomplete="name" placeholder="Product Name" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" value="{{$user->email}}" autocomplete="name" placeholder="Product Name" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" value="{{$user->username}}" autocomplete="name" placeholder="Product Name" required>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option selected disabled value="">Choose Status User</option>
                            <option value="Admin" {{($user->status == 'Admin') ? 'selected' : ''}}>Admin</option>
                            <option value="User" {{($user->status == 'User') ? 'selected' : ''}}>User</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-10">
                  <button type="submit" name="" class="btn btn-primary">Submit</button>
                </div>
              </form>

            </div>
          </div>
    </div>
</section>
@endsection
