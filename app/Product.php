<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'products_id', 'name', 'price', 'amount' , 'cost', 'category'
    ];
    protected $primaryKey = 'products_id';
}
