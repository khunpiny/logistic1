<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_id', 'name', 'address', 'email' , 'tel'
    ];
    protected $primaryKey = 'customers_id';
}
