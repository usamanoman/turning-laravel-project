<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;

/**
 * Class Product
 * @package App\Models
 * @property int $product_id
 * @property string $name
 * @property string $description
 * @property double $price
 * @property double $discounted_price
 * @property string $image
 * @property string $image_2
 * @property string $thumbnail
 * @property int $display
 * @property Collection $categories
 *
 */
class Product extends Model
{
    public $timestamps = false;

    protected $table = 'product';
    protected $primaryKey = 'product_id';

    public static function countedAndPaginableResults(array $criteria = [])
    {
        return self::all();
    }

    public static function countedAndPaginableResultsWithDepartments(array $criteria = [])
    {
        return self::all();
    }

    public function categories()
    {
        return $this->hasManyThrough(
            Category::class,
            ProductCategory::class,
            'product_id',
            'category_id',
            'product_id',
            'category_id'
        );
    }

    public function product_attributes()
    {
        return $this->hasManyThrough(
            AttributeValue::class,
            ProductAttribute::class,
            'product_id',
            'attribute_value_id',
            'product_id',
            'attribute_value_id',
        );
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review', 'product_id');
    }

    // Get Attribute Values with Attribute Name for Product
    public function getAttributes()
    {
        return $this->product_attributes->transform(function($attr) {
            return [
                'attribute_value_id' => $attr->attribute_value_id,
                'attribute_name' => $attr->attrvalue['name'],
                'attribute_value' => $attr->value,
            ];
        });
    }

    // Get Category for Product
    public function getCategory()
    {
        return $this->categories->transform(function($category) {
            return [
                'category_id' => $category->category_id,
                'department_id' => $category->department_id,
                'name' => $category->name,
            ];
        })->first();
    }
}
