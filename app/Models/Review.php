<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const CREATED_AT = 'created_on';

    protected $table = 'review';
    protected $primaryKey = 'review_id';

    protected $fillable = ['product_id', 'customer_id', 'review', 'rating'];

    public function setUpdatedAtAttribute($value)
    {
        // to Disable updated_at
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'customer_id', 'customer_id')->withDefault([
            'name' => 'N/A'
        ]);
    }
}
