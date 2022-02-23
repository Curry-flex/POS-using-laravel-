<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';
    protected $fillable = ['productname','description','brand','price','quantity','alert_stock'];
 

    public function orderdetails()
    {
    return $this->hasMany(Order_details::class);
    }

    use HasFactory;
}
