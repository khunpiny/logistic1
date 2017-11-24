<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id','customers_id','price_total'
    ];
    protected $primaryKey = 'order_id';
}
