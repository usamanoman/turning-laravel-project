<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $timestamps = false;

    protected $table = 'order_detail';
    protected $primaryKey = 'item_id';

    protected $fillable = ['order_id', 'product_id', 'attributes', 'product_name', 'quantity', 'unit_cost'];
}
