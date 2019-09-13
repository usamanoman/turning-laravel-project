<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRegion extends Model
{
    public $timestamps = false;

    protected $table = 'shipping_region';
    protected $primaryKey = 'shipping_region_id';

    public function shipping()
    {
    	return $this->hasMany('App\Models\Shipping', 'shipping_region_id', 'shipping_region_id');
    }
}
