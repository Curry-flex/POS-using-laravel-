<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Picqer;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(5);

        return view('product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_code = rand(1009685049,100000000);
        $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
        $barcode = $generator->getBarcode($product_code,$generator::TYPE_STANDARD_2_5,2,60);
        $product = new Product;

        $product->productname=$request->product;
        
        $product->description=$request->description;
        
        $product->brand=$request->brand;
        
        $product->price=$request->price;

        $product->product_code=$product_code;

        $product->barcode=$barcode;
        
        $product->quantity=$request->quantity;
        
        $product->alert_stock=$request->alert;

        $product->save();
        
    
        return redirect()->back()->with('message','Product Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->productname=$request->product;
        $product->brand=$request->brand;
        $product->quantity=$request->quanty;
        $product->alert_stock=$request->alert;

        $product->update();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();
    }

    public function getbar(){
        $barcode = Product::select('barcode','product_code')->get();
        $product=Product::all();
        return view('barcode.index',['barcode' => $barcode,'product'=>$product]);
    }
}
