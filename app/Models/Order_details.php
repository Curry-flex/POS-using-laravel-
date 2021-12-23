<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_details extends Model
{
    protected $fillable = ['order_id','product_id','quantity','unit_price','amount','discount'];
    use HasFactory;
}
