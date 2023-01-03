<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order_product = session()->get('order_product');
        $total_price = session()->get('total_price');

        // dd($order_product);

        $cart_item = 0;

        if (!empty($order_product)) {
            # code...
            foreach ($order_product as $key => $value) {
                $cart_item += $value['qty'];
            }
        }




        $data = array(
            'order_product' => $order_product,
            'total_price' => $total_price,
            'cart_item' => $cart_item,

        );

        return view('cart', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (empty($request->product_category_id)) {
            return redirect()->back()->with('failed', 'Please Choose Category');
        } else {

            $product_id = $request->product_id;

            $product = DB::table('product')
                ->where('product.id', '=', $product_id)
                ->first();

            $product_image = DB::table('product_image')
                ->where('product_image.product_id', '=', $product_id)
                ->first();


            $product_category = DB::table('product_category')
                ->where('product_category.id', '=', $request->product_category_id)
                ->where('product_category.product_id', '=', $product_id)
                ->first();

            $order = session()->get('order_product');
            $id = $product->id;

            if (!$order) {
                $order = [
                    $id => [
                        'product' => $product,
                        'category' => $product_category,
                        'image' => $product_image,
                        'stock' => $product_category->stock,
                        'qty' => $request->qty,
                    ]
                ];
                session()->put('order_product', $order);

                $product_price = $product->price * $order[$id]['qty'];
                $total_price = 0;

                foreach ((array)session()->get('order_product') as $key => $value) {
                    $price = $value['product']->price;
                    $total_price += $price * $value['qty'];
                }

                session()->put('product_price', $product_price);
                session()->put('total_price', $total_price);

                return redirect()->back();
            }

            if (isset($order[$id]) && $order[$id]['product']) {
                if ($order[$id]['qty'] + $request->qty >= $product_category->stock) {
                    # code...
                    return redirect()->back()->with('failed', 'You add too many stock');
                } else {
                    $order[$id]['qty'] += $request->qty;
                }

                session()->put('order_product', $order);

                $product_price = $product->price * $order[$id]['qty'];
                $total_price = 0;

                foreach ((array)session()->get('order_product') as $key => $value) {
                    $price = $value['product']->price;
                    $total_price += $price * $value['qty'];
                }

                session()->put('product_price', $product_price);
                session()->put('total_price', $total_price);

                return redirect()->back();
            }

            $order[$id] = [
                'product' => $product,
                'category' => $product_category,
                'image' => $product_image,
                'stock' => $product_category->stock,
                'qty' => $request->qty,
            ];
            session()->put('order_product', $order);

            $product_price = $product->price * $order[$id]['qty'];
            $total_price = 0;

            foreach ((array)session()->get('order_product') as $key => $value) {
                $price = $value['product']->price;
                $total_price += $price * $value['qty'];
            }

            session()->put('product_price', $product_price);
            session()->put('total_price', $total_price);

            return redirect()->back();
        }

        // if (isset($order[$id] && $o)) {
        //     # code...
        // }
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
    public function update(Request $request)
    {
        if ($request->product_id and $request->qty) {
            $total = 0;
            $qty = 0;

            // dd($request->qty);

            $order_product = session()->get('order_product');
            $order_product[$request->product_id]['qty'] = $request->qty;
            session()->put('order_product', $order_product);

            foreach ($order_product as $key => $value) {
                $total += $value['product']->price * $value['qty'];
                $qty += $value['qty'];
            }

            session()->put('total_price', $total);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $total = 0;
        if ($id) {
            $order_product = session()->get('order_product');

            if (isset($order_product[$id])) {
                unset($order_product[$id]);

                session()->put('order_product', $order_product);
            }

            foreach ($order_product as $key => $value) {
                $total += $value['product']->price * $value['qty'];
            }

            session()->put('total_price', $total);

            return redirect()->back();
        }
    }
}
