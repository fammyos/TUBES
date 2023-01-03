<link rel="stylesheet" type="text/css" href="{{asset('asset_checkout/user/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('user/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('asset_checkout/user/styles/cart_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('asset_checkout/user/styles/cart_responsive.css')}}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<div class="cart_section">
    <div class="container wrapper">
        <div class="row">
            <div class="col-lg-7">
                <div class="cart_container">
                    <div class="panel-heading">Shipping Address</div>
                    <div class="panel-body">
                        <ul class="cart_list">
                            <li class="cart_item clearfix">
                                <form class="form-horizontal" id="ongkir" method="POST" action="#" >
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text"  class="form-control address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <label>Zip Code</label>
                                        <input name="zip_code" type="number"  class="form-control zip_code" placeholder="Zip Code Subdistrict">
                                    </div>
                                    <div class="form-group">
                                        <label>Province</label>
                                        <select name="province_destination" class="form-control province" >
                                            <option value="">Province</option>
                                            @foreach ($provinces as $province => $value)
                                            <option value="{{$value->province_id}}">{{$value->province_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <select name="city_destination" class="form-control destination" >
                                                <option value="">--City--</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Courier</label>
                                            <select name="courier" class="form-control courier" >
                                                <option value="jne">Jne</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                            <label>Weight (g) :</label>
                                            <input name="weight" type="text"  class="form-control berat" placeholder="Weight" value="1000">
                                    </div>
                                    <button type="submit" class="btn btn-primary nasi">Cek</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="cart_container">
                    <div class="panel-heading">Ongkos Kirim</div>
                    <div class="panel-body">
                        <ul class="cart_list">
                            <li class="cart_item clearfix " id="shipping_card">
                            </li>
                        </ul>
                    </div>
            </div>
        </div>
            <div class="col-lg-5">
                <div class="cart_container">
                        <form action="{{route('ongkir')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="panel-heading">Review Order</div>
                            <div class="panel-body">
                                <ul class="cart_list">
                                    <?php $total = 0 ?>
                                    <?php $i = 0 ?>
                                    @foreach ($order_product as $value)
                                    <?php $total += $value['product']->price * $value['qty'] ?>
                                    <li class="cart_item clearfix">
                                        {{-- <div class="form-group"> --}}
                                            {{-- <input type="hidden" name="product[{{$i}}][id_product]" value="{{$details['id_product']}}"> --}}
                                            <div class="col-sm-4 col-xs-4 cart_item_image pt-2"><img src="{{asset('storage/product_image/'.$value['image']->url_image)}}" alt="" class="img-responsive"></div>
                                            <div class="cart_item_text">
                                                {!! \Illuminate\Support\Str::words($value['product']->name, 3, '...')!!}
                                            </div>
                                            <div class="col-xs-12"><small>Quantity : <span>{{ $value['qty'] }}</span></small></div>
                                            <input type="hidden" value="{{$value['qty']}}" name="product[{{$i}}][quantity]">
                                            <div class="float-right">
                                                    <h6 class="">@currency($value['product']->price * $value['qty'])</h6>
                                            </div>
                                                {{-- <div class="float-right">
                                                    <h6 class="">{{App\product::konversi($details['harga'] * $details['quantity'])}}</h6>
                                                </div> --}}
                                        {{-- </div> --}}
                                    </li>
                                    <?php  $i++ ?>
                                    @endforeach
                                    <div class="form-group"><hr /></div>
                                    <li class="cart_item clearfix">
                                            <div class="col-xs-12">
                                                <strong>Shipping Price :</strong>
                                                <div class="float-right harga-ongkos"><h6 class="cart-total ongkirs">-</h6></div>
                                                <input type="hidden" id="hidden-ongkir" name="harga_ongkir" autocomplete="off">
                                                <input type="hidden" class="bpbp" value="{{$total}}">
                                                <input type="hidden" class="tujuan-provinsi" value="" name="province_destination" autocomplete="off">
                                                <input type="hidden" class="tujuan-kota" value="" name="city_destination" autocomplete="off">
                                                <input type="hidden" class="kurir" value="" name="courier" autocomplete="off">
                                                <input type="hidden" class="berat-barang" name="weight" value="" autocomplete="off">
                                            </div>
                                            <hr>
                                            <div class="col-xs-12">
                                                <strong>Total :</strong>
                                                <div class="float-right"><h6 class="cart-total big-total">@currency($total)</h6></div>
                                                    <input type="hidden" id="hidden-total" name="total_bayar" value="" autocomplete="off">
                                            </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-2">
                                {{-- <button type="submit" class="btn btn-primary mt-3 float-right">Submit</button> --}}
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
{{-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script> --}}
{{-- <script src="{{asset('admin/js/dist/jquery.simple-checkbox-table.min.js')}}"></script> --}}


<script src="{{asset('asset_checkout/script.js')}}"></script>

