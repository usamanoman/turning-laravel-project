<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    protected $table = 'attribute';
    protected $primaryKey = 'attribute_id';

    public function values()
    {
    	return $this->hasMany('App\Models\AttributeValue', 'attribute_id');
    }

    // Get Attribute Values for Attribute
    public function getAttributeValues()
    {
        return $this->values->transform(function($value) {
            return [
                'attribute_value_id' => $value->attribute_value_id,
                'value' => $value->value,
            ];
        });
    }

}
