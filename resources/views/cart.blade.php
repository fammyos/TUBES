
@extends('layouts.guest_app')

@section('content')
<main class="page">
    <section class="shopping-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="pt-4">Shopping Cart</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @foreach ($order_product as $item => $value)
                        <div class="items">
                            <div class="product">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img class="img-fluid mx-auto d-block image" src="{{asset('storage/product_image/'. $value['image']->url_image)}}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-5 product-name">
                                                    <div class="product-name">
                                                        <a href="#" class="nav-link">{{$value['product']->name}}</a>
                                                        {{-- <div class="product-info">
                                                            <div>Display: <span class="value">5 inch</span></div>
                                                            <div>RAM: <span class="value">4GB</span></div>
                                                            <div>Memory: <span class="value">32GB</span></div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-4 quantity">
                                                    <label for="quantity">Quantity:</label>
                                                    <input id="quantity" min="1" type="number" value="{{$value['qty']}}" class="form-control quantity-input">
                                                </div>
                                                <div class="col-md-3 price">
                                                    <span>@currency($value['product']->price * $value['qty'])</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Total</span><span class="price">@currency($total_price)</span></div>
                            <a href="{{route('checkout')}}" class="btn btn-primary btn-lg btn-block">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
