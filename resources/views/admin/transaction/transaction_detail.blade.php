@extends('layouts.app')

@section('title')
    <title>Detail Transaction</title>
@endsection

@section('content')
<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Transaction</li>
        <li class="breadcrumb-item">Detail</li>
        {{-- <li class="breadcrumb-item active">{{$product->name}}</li> --}}
      </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Transaction</h5>
                <div class="container mt-5 mb-3">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="d-flex flex-row p-2"> <img src="https://i.imgur.com/vzlPPh3.png" width="48">
                                    <div class="d-flex flex-column"> <span class="font-weight-bold">Invoice</span> <small>INV-00{{$transaction->id}}</small> </div>
                                </div>
                                <hr>
                                <div class="table-responsive p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td>To</td>
                                                <td>From</td>
                                            </tr>
                                            <tr class="content">
                                                <td class="font-weight-bold">{{$transaction->user->name}} <br>Indonesia</td>
                                                <td class="font-weight-bold">U-Gadget <br> Attn: Fammy <br> Indonesia</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="products p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td>Product</td>
                                                <td>Price</td>
                                                <td>qty</td>
                                                <td class="text-center">Total</td>
                                            </tr>
                                            <?php $subtotal = 0 ?>
                                            @foreach ($transaction->detailTransaction as $item)
                                            <?php $subtotal += ($item->product->price * $item->qty) ?>
                                            <tr class="content">
                                                <td>{{$item->product->name}}</td>
                                                <td>@currency($item->product->price)</td>
                                                <td>{{$item->qty}}</td>
                                                <td class="text-center">@currency($item->product->price * $item->qty)</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="products p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td></td>
                                                <td>Subtotal</td>
                                                <td>Shipping Address</td>
                                                <td class="text-center">Total</td>
                                            </tr>
                                            <tr class="content">
                                                <td></td>
                                                <td>@currency($subtotal)</td>
                                                <td>@currency($transaction->shipping_price)</td>
                                                <td class="text-center">@currency($transaction->total_price)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="address p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td>Invoice Details</td>
                                            </tr>
                                            <tr class="content">
                                                <td> Payment : Transfer Manual <br> Courier : {{$transaction->courier}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
