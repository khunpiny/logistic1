<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    protected $fillable = [
        'order_product_id', 'order_id', 'products_id', 'amount_d' , 'price_d'
    ];
    protected $primaryKey = 'order_product_id';
}
