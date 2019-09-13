<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    protected $desc_length = 0;
    protected $paginate;

    // Customize Pagination
    public function __construct($resource, $length, $view_pagination = true)
    {
        // Desc Length
        $this->desc_length = $length;

        // Searching Request
        $this->paginate = $view_pagination;

        // Override Default Pagination
        $this->pagination = [
            'currentPage'    => $resource->currentPage(),
            'currentPageSize'=> $resource->perPage(),
            'totalPages'     => $resource->lastPage(),
            'totalRecords'   => $resource->total(),
        ];

        $resource = $resource->getCollection();

        parent::__construct($resource);
    }

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'paginationMeta'=> $this->pagination,
            'rows'          => $this->collection->transform(function($product) {
                return [
                    'product_id'      => $product->product_id,
                    'name'            => $product->name,
                    'description'     => Str::limit($product->description, $this->desc_length),
                    'price'           => $product->price,
                    'discounted_price'=> $product->discounted_price,
                    'thumbnail'       => $product->thumbnail,
                ];
            })
        ];

        // Remove Pagination Meta On Search
        if( !$this->paginate ) unset($data['paginationMeta']);

        return $data;
    }
}
