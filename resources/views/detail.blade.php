@extends('layouts.guest_app')

@section('content')
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6 carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item-active">
                                <img class="card-img-top mb-5 mb-md-0" src="{{asset('storage/product_image/'.$product->image[0]['url_image'])}}" alt="..." />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if(session()->has('failed'))
                            <div class="alert alert-danger">
                                {{ session()->get('failed') }}
                            </div>
                        @endif
                        <form action="{{route('add.cart')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- <div class="small mb-1">{{}}</div> --}}
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                            <div class="fs-5 mb-5">
                                {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                                <span >@currency($product->price)</span><br>
                                @foreach ($product->categorys as $item)
                                <div class="form-check form-check-inline" style="margin-top: 10px">
                                    <input class="form-check-input" type="radio" name="product_category_id" id="inlineRadio1" value="{{$item->id}}">
                                    <label class="form-check-label" for="inlineRadio1">{{$item->category}}</label>
                                </div>
                                @endforeach

                            </div>
                            <p class="lead">{{$product->description}}</p>
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="inputQuantity" name="qty" type="num" value="1" min="1" max="{{$product->stock}}" style="max-width: 3rem" />
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($products as $item)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="{{asset('storage/product_image/'.$item->image[0]['url_image'])}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$item->name}}</h5>
                                        <!-- Product price-->
                                        @currency($item->price)
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('detail.product', ['id'=>$item->id])}}">View Detail</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
@endsection
