<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();

        $data = array(
            'product' => $products
        );

        return view('admin.product.product_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.product_create');
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
        $this->validate($request,[
            'name' => ['required'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'description' => ['required'],
            'type' => ['required', 'in:exist,preOrder'],
            'manufacturer' => ['required'],
        ]);


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'type' => $request->type,
            'manufacturer' => $request->manufacturer,
        ]);

        return redirect()->route('product')->with('success', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        $data = array(
            'product' => $product
        );

        return view('admin.product.product_edit', $data);
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
        $this->validate($request,[
            'name' => ['required'],
            'price' => ['required','numeric'],
            'stock' => ['required','numeric'],
            'description' => ['required'],
            'type' => ['required', 'in:exist,preOrder'],
            'manufacturer' => ['required'],
        ]);

        $input = $request->all();

        $product = Product::find($id);
        $product->name = $input['name'];
        $product->price = $input['price'];
        $product->stock = $input['stock'];
        $product->description = $input['description'];
        $product->type = $input['type'];
        $product->manufacturer = $input['manufacturer'];

        $product->update();

        return redirect()->route('product')->with('success', 'Product has been edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product')
        ->with('success', 'Product has been deleted');
    }
}
