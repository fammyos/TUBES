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
                                    <div class="d-flex flex-column"> <span class="font-weight-bold">Invoice</span> <small>INV-001</small> </div>
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
                                                <td class="font-weight-bold">Asep <br>Indonesia</td>
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
                                                <td>Description</td>
                                                <td>Days</td>
                                                <td>Price</td>
                                                <td class="text-center">Total</td>
                                            </tr>
                                            <tr class="content">
                                                <td>Website Redesign</td>
                                                <td>15</td>
                                                <td>$1,500</td>
                                                <td class="text-center">$22,500</td>
                                            </tr>
                                            <tr class="content">
                                                <td>Logo & Identity</td>
                                                <td>10</td>
                                                <td>$1,500</td>
                                                <td class="text-center">$15,000</td>
                                            </tr>
                                            <tr class="content">
                                                <td>Marketing Collateral</td>
                                                <td>3</td>
                                                <td>$1,500</td>
                                                <td class="text-center">$4,500</td>
                                            </tr>
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
                                                <td>GST(10%)</td>
                                                <td class="text-center">Total</td>
                                            </tr>
                                            <tr class="content">
                                                <td></td>
                                                <td>$40,000</td>
                                                <td>2,500</td>
                                                <td class="text-center">$42,500</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <div class="address p-2">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr class="add">
                                                <td>Bank Details</td>
                                            </tr>
                                            <tr class="content">
                                                <td> Bank Name : ADS BANK <br> Swift Code : ADS1234Q <br> Account Holder : Jelly Pepper <br> Account Number : 5454542WQR <br> </td>
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
