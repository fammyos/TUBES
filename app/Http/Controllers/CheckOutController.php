<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckOutController extends Controller
{
    /**
     * parameter untuk yang sudah login
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_product = session()->get('order_product');
        $total_price = session()->get('total_price');


        $provinces = Province::all();
        $cities = City::all();


        $data = array(
            'order_product' => $order_product,
            'total_price' => $total_price,
            'cities' => $cities,
            'provinces' => $provinces,
        );

        return view('checkout', $data);
    }
    public function getCities($id)
    {
        $city = City::where('province_id', $id)->pluck('city_name','city_id');
        return json_encode($city);
    }

    public function submit(Request $request)
    {
        // dd($request->all());
        $api_key = env('API_RAJA_ONGKIR');
        $url = 'https://api.rajaongkir.com/starter/cost';
        session()->put('address', $request->address);
        session()->put('zip_code', $request->zip_code);


        $client = new Client();

        $responses = $client->request('POST',$url,
        [
            'body' =>'origin=23&destination='.$request->city_destination.'&weight=1000&courier=jne',
            'headers' =>[
                'key' => $api_key,
                'content-type' => 'application/x-www-form-urlencoded',
            ]
        ]);

        $json = $responses->getBody()->getContents();

        $array_result = json_decode($json, true);

        $origin = $array_result["rajaongkir"]["origin_details"]["city_name"];
        $postal_origin = $array_result["rajaongkir"]["origin_details"]["postal_code"];
        $destination = $array_result["rajaongkir"]["destination_details"]["city_name"];
        $postal_destination = $array_result["rajaongkir"]["destination_details"]["postal_code"];
        $ongkir = $array_result["rajaongkir"]["results"];

        $data = array(
            'origin' => $origin,
            'destination' => $destination,
            'array_result' => $array_result,
            'ongkir' => $ongkir,
            'postal_origin' => $postal_origin,
            'postal_destination' =>$postal_destination,
        );

        return view('shipping', $data);

    }

    public function checkOut(Request $request){
        $order_product = session()->get('order_product');
        $zipCode = session()->get('zip_code');
        // dd($order_product);

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'address' => session()->get('address'),
            'city' => $request->city_destination,
            'province' => $request->province_destination,
            'total_price' => $request->total_bayar,
            'zip_code' => $zipCode,
            'courier' => $request->courier,
            'shipping_price' => $request->harga_ongkir,
        ]);

        foreach ($order_product as $key => $value) {
            $detail = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $value['product']->id,
                'qty' => $value['qty'],
            ]);

            $category = ProductCategory::find($value['category']->id);
            $product = Product::find($value['product']->id);

            $product->stock = $product->stock - $detail->qty;
            $product->update();

            $category->stock = $category->stock - $detail->qty;
            $category->update();


        }

        session()->forget(['order_product', 'zip_code', 'total_price']);
        return "Transaction Success";
        // $order = order::create(array(
        //     'id_user' => Auth::user()->id,
        //     'tujuan_provinsi' => Request('province_destination'),
        //     'tujuan_kota' => Input::get('city_destination'),
        //     'kurir' => Input::get('courier'),
        //     'berat' => $request->input('weight'),
        // ));

        // foreach ($request->input('product') as $value) {
        //     $order_product = new order_product();
        //     // $order_barang = order_product::create(array(
        //     //     'id_order' => $order->id_order,
        //     //     'id_product' => Input::get('id_product'),
        //     //     'quantity' => Input::get('quantity'),
        //     // ));
        //     $order_product->id_order = $order->id_order;
        //     $order_product->id_product = $value['id_product'];
        //     $order_product->quantity_order = $value['quantity'];
        //     $order_product->save();
        // }

        // // $categories = DB::table('kategori_barang')->get();
        // // $user = users::find(Auth::user()->id);

        // $ongkir = $request->input('harga-ongkir');
        // $id_order = $order->id_order;

        // $total_order = $request->input('total-bayar');

        // // $harga_transaksi = session()->set('harga_transaksi');

        // $data = array(
        //     'ongkir' => $ongkir,
        //     'total_order' => $total_order,
        //     'id_order' => $id_order,
        //     // 'categories' => $categories,
        //     // 'user' => $user,
        // );


        // session()->put('tests', $data);


        // $order->save();

        // return redirect()->route('shipping');
        // return view('shipping', $data);
    }


}
