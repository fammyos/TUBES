<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductImage::all();

        $data = array(
            'product_img' => $products
        );

        return view('admin.product_img.product_img_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();

        $data = array(
            'products' => $product,
        );


        if (empty($product)) {
            return redirect()->route('product.img')->with('invalid', 'Insert Product First');
        } else {
            return view('admin.product_img.product_img_create', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'product_id' => ['required'],
            'url_image' => ['required','image','file','mimes:png,jpg,jpeg'],
        ]);

        $input = $request->all();
        // dd($input);
        $image = $request->file('url_image');

        if (!empty ($image)) {
            $file_name = time(). "_".$image->getClientOriginalName();
            $image->storeAs('public/product_image', $file_name);

            ProductImage::create([
                'product_id' => $input['product_id'],
                'url_image' => $file_name,
            ]);
        }

        return redirect()->route('product.img')->with('success', 'Product Image has been added');
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
        $product = Product::all();
        $product_img = ProductImage::where('id', $id)->first();

        $data = array(
            'products' => $product,
            'product_img' => $product_img,
        );

        return view('admin.product_img.product_img_edit', $data);
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
            'product_id' => ['required'],
        ]);

        $input = $request->all();
        // dd($input);
        $image = $request->file('url_image');
        $product_img = ProductImage::find($id);
        $product_img->product_id = $input['product_id'];

        if (!empty ($image)) {
            $file_name = time(). "_".$image->getClientOriginalName();
            $image->storeAs('public/product_image', $file_name);
            $product_img->url_image = $file_name;
        }

        $product_img->update();

        return redirect()->route('product.img')->with('success', 'Product Image has been edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_img = ProductImage::find($id);

        $product_img->delete();

        return redirect()->route('product.img')->with('success', 'Product Image has been delete');
    }
}
