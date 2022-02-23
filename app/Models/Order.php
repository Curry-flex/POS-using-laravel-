<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name','address'];
   


    public function orderdetails()
    {
    return $this->hasMany(Order_details::class);
    }

    use HasFactory;
}
