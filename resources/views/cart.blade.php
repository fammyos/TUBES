
@extends('layouts.guest_app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
              <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
              <p class="mb-5 text-center">
                  {{-- <i class="text-info font-weight-bold">3</i> items in your cart</p> --}}
                  @if (empty($order_product))
                  <div class="btn-center">
                        {{-- <img src="{{asset('user/img/cart-cloud.jpg')}}" class="rounded mx-auto d-block cart-image" alt=""> --}}
                        <h4 class="text-center">No product in your cart</h4>
                        <div class="col-md-12 text-center mt-5">
                            <a href="{{route('product.guest')}}" type="button" class="btn btn-primary center">Continue</a>
                        </div>
                    </div>

                  @else
                  <table id="shoppingCart" class="table table-condensed table-responsive">
                      <thead>
                          <tr>
                              <th style="width:60%">Product</th>
                              <th style="width:12%">Price</th>
                              <th style="width:10%">Quantity</th>
                              <th style="width:16%"></th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($order_product as $item => $value)
                        <tr>
                            <form action="{{route('update.cart')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{$value['product']->id}}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-md-3 text-left">
                                            <img src="{{asset('storage/product_image/'.$value['image']->url_image)}}" alt="" class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                        </div>
                                        <div class="col-md-9 text-left mt-sm-2">
                                            <h4>{{$value['product']->name}}</h4>
                                            <p class="font-weight-light">{{$value['product']->manufacturer}}</p>
                                            <p class="font-weight-light">@currency($value['product']->price)</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">@currency($value['product']->price * $value['qty'])</td>
                                <td data-th="Quantity">
                                    <input type="number" name="qty" class="form-control form-control-lg text-center" min="1" max="{{$value['category']->stock}}" value="{{$value['qty']}}">
                                </td>
                                <td class="actions" data-th="">
                                    <div class="text-right">
                                        <button class="btn btn-white border-secondary bg-white btn-md mb-2">
                                            <i class="fas fa-sync"></i>
                                        </button>
                                        <a href="{{route('delete.cart',['id' => $value['product']->id])}}" class="btn btn-white border-secondary bg-white btn-md mb-2">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
                  <div class="float-right text-right">
                      <h4>Subtotal:</h4>
                      <h1>@currency($total_price)</h1>
                  </div>
              </div>
          </div>
          <div class="row mt-4 d-flex align-items-center">
              <div class="col-sm-6 order-md-2 text-right">
                  <a href="{{route('checkout')}}" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</a>
              </div>
              {{-- <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                  <a href="catalog.html">
                      <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
              </div> --}}
          </div>

        @endif
  </div>
  </section>
@endsection
