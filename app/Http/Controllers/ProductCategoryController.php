<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = ProductCategory::all();

        $data = array(
            'product_category' => $category
        );

        return view('admin.product_category.product_category_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product = Product::all();

        $data = array(
            'products' => $product,
        );

        if (empty($product)) {
            return redirect()->route('product.category')->with('invalid', 'Insert Product First');
        } else {
            return view('admin.product_category.product_category_create', $data);
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
            'category' => ['required'],
            'stock' => ['required','numeric'],
        ]);

        $input = $request->all();

        ProductCategory::create([
            'product_id' => $input['product_id'],
            'category' => $input['category'],
            'stock' => $input['stock'],
        ]);

        return redirect()->route('product.category')->with('success', 'Product Category has been added');
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
        $product_category = ProductCategory::find($id);

        $data = array(
            'products' => $product,
            'product_category' => $product_category,
        );

        return view('admin.product_category.product_category_edit', $data);
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
            'category' => ['required'],
            'stock' => ['required','numeric'],
        ]);

        $input = $request->all();

        $product_category = ProductCategory::find($id);;
        $product_category->product_id = $input['product_id'];
        $product_category->category = $input['category'];
        $product_category->stock = $input['stock'];
        $product_category->update();

        return redirect()->route('product.category')->with('success', 'Product Category has been edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_category = ProductCategory::find($id);

        $product_category->delete();

        return redirect()->route('product.category')->with('success', 'Product Image has been delete');
    }
}
