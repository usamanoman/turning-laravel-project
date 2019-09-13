<?php

namespace App\Models;

use DB;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Department
 * @package App\Models
 * @property int $department_id
 * @property string $name
 *
 */
class Department extends Model
{
    public $timestamps = false;
    protected $table = 'department';
    protected $primaryKey = 'department_id';

    public function categories()
    {
    	return $this->hasMany('App\Models\Category', 'department_id');
    }

    public function products()
    {
    	return DB::table('category')
    	->join('product_category', 'category.category_id', '=', 'product_category.category_id')
    	->join('product', 'product_category.product_id', '=', 'product.product_id')
    	->where('category.department_id', $this->department_id)
    	->select('product.product_id', 'product.name', 'product.description', 'product.price', 'product.discounted_price', 'product.thumbnail');
    }
}
