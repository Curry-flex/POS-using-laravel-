<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
USE App\Models\Product;
use App\Models\Order_details;
use App\Models\Transaction;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pro =Order_details::find(2);
         
        // $oda =$pro->product->brand;
        // dd($oda);

         $oda=Order::all();
         $product=Product::all();

         $lastID =Order_details::max("order_id");
         $oda_receipt=Order_details::where('order_id',$lastID)->get();
        return view('orders.index',['order'=>$oda,'product'=>$product,"receipt"=>$oda_receipt]);
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
       
        DB::transaction(function() use($request){
         //Order model
         $oda = new Order;
         $oda->name=$request->cname;
         $oda->address=$request->phone;
         $oda->save();
         $odaID = $oda->id;

         #Order_details modal
         for($product_id =0; $product_id<count($request->product_id); $product_id++){
            $odaDetails = new Order_details;
            $odaDetails->order_id =$odaID;
            $odaDetails->product_id= $request->product_id[$product_id];
            $odaDetails->quantity=$request->quantity[$product_id];
            $odaDetails->unit_price=$request->price[$product_id];
            $odaDetails->amount=$request->total[$product_id];
            $odaDetails->discount=$request->discount[$product_id];
            $odaDetails->save();
         }
      

         #Transaction modal
         $transaction = new Transaction;
         $transaction->order_id =$odaID;
         $transaction->user_id= auth()->user()->id;
         $transaction->balance=$request->remain;
         $transaction->paid_amount=$request->payment;
         $transaction->transac_amount= $odaDetails->amount;
         $transaction->transac_date =date('Y-m-d');
         $transaction->save();
       
         //Last order history;
         $product = Product::all();
         $odaDetails=Order_details::where('order_id',$odaID)->get();
         $order=Order::where('id',$odaID)->get();

         return view('orders.index',[
             'product' =>$product,
             'odaDetails'=>$odaDetails,
             'Order'=>$order
         ]);
        });

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
