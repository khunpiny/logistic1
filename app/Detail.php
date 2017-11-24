<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'detail_id', 'products_id','product_out','product_in'
    ];
    protected $primaryKey = 'detail_id';
}
