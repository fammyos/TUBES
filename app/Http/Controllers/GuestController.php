<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('product.type', '=', 'exist')
        ->orderBy('created_at', 'asc')
        ->paginate(4);
        $order_product = session()->get('order_product');

        $cart_item = 0;

        if (!empty($order_product)) {
            # code...
            foreach ($order_product as $key => $value) {
                $cart_item += $value['qty'];
            }
        }


        $data = array(
            'products' => $product,
            'cart_item' => $cart_item,
        );

        return view('welcome', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProduct()
    {
        $product = Product::where('product.type', '=', 'exist')->get();
        $order_product = session()->get('order_product');

        $cart_item = 0;

        if (!empty($order_product)) {
            # code...
            foreach ($order_product as $key => $value) {
                $cart_item += $value['qty'];
            }
        }



        $data = array(
            'products' => $product,
            'cart_item' => $cart_item,
        );

        return view('produk', $data);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        $products = Product::where('product.id', '!=', $id)->orderBy('created_at', 'asc')->get();
        $order_product = session()->get('order_product');

        $cart_item = 0;

        if (!empty($order_product)) {
            # code...
            foreach ($order_product as $key => $value) {
                $cart_item += $value['qty'];
            }
        }

        $data = array(
            'product' => $product,
            'products' => $products,
            'cart_item' => $cart_item,
        );


        return view('detail', $data);
    }

    public function about()
    {
        $order_product = session()->get('order_product');

        $cart_item = 0;

        if (!empty($order_product)) {
            # code...
            foreach ($order_product as $key => $value) {
                $cart_item += $value['qty'];
            }
        }

        $data = array(
            'cart_item' => $cart_item,
        );

        return view('about_us', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
