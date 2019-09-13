<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;

use Illuminate\Support\Str;

use DB;

/**
 * The Product controller contains all methods that handles product request
 * Some methods work fine, some needs to be implemented from scratch while others may contain one or two bugs/
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method.
 */

use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->only('saveProductReview');
    }

    public function index($id)
    {
        return view('product')->with('id', $id);
    }

    /**
     * Return a paginated list of products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProducts(Request $request)
    {
        $limit       = $request->limit ?: 20;
        $desc_length = $request->description_length ?: 200;
        $products    = Product::paginate($limit);
        return new ProductCollection($products, $desc_length);
    }

    /**
     * Returns a single product with a matched id in the request params.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduct(Product $product)
    {
        $desc_length          = request()->description_length ?: 200;
        $product->description = Str::limit($product->description, $desc_length);
        return response()->json($product);
    }

    /**
     * Returns a list of product that matches the search query string.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProduct(Request $request)
    {
        // Params
        $limit        = $request->limit ?: 20;
        $desc_length  = $request->description_length ?: 200;
        $query_string = $request->query_string ?: null;
        $all_words    = $request->all_words ?: 'off';

        $products = DB::select('call catalog_search(?,?,?,?,?)', [
            $query_string, 
            $all_words,
            $desc_length,
            $limit,
            0,
        ]);

        return response()->json([
            'rows' => $products
        ]);
    }

    /**
     * Returns all products in a product category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsByCategory(Category $category)
    {
        // Params
        $limit        = request()->limit ?: 20;
        $desc_length  = request()->description_length ?: 200;

        $category->load('products');

        $products = $category->products()->paginate($limit);

        return new ProductCollection($products, $desc_length, false);
    }

    /**
     * Returns a list of products in a particular department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsInDepartment(Department $department)
    {
        // Params
        $limit        = request()->limit ?: 20;
        $desc_length  = request()->description_length ?: 200;

        $products = $department->products()->paginate($limit);

        return new ProductCollection($products, $desc_length, false);
    }

    /**
     * Returns a list of all product departments.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllDepartments()
    {
        $departments = Department::all();

        return response()->json($departments, 200);
    }

    /**
     * Returns a single department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartment(Department $department)
    {
        return response()->json($department, 200);

    }

    /**
     * Returns a single category.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategory(Category $category)
    {
        return response()->json($category, 200);

    }

    /**
     * Returns all categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllCategories()
    {
        $categories = Category::all();
        return response()->json([
            'rows' => $categories 
        ], 200);
    }

    /**
     * Returns all categories in a department.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartmentCategories(Department $department)
    {
        return response()->json(['rows' => $department->categories ], 200);
    }

    /**
     * Returns all categories in a product.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductCategories(Product $product)
    {
        return response()->json($product->getCategory(), 200);
    }

    /**
     * Get Product Reviews
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductReview(Product $product)
    {
        $product->load('reviews');

        return response()->json($product->reviews->transform(function($review) {
            return [
                'name' => $review->customer->name,
                'review' => $review->review,
                'rating' =>  $review->rating,
                'created_on' => $review->created_on,
            ];
        }), 200);
    }

    /**
     * Save Product Review
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveProductReview(Product $product)
    {
        $review = $product->reviews()->create([
            'customer_id'=> auth()->user()->customer_id,
            'product_id' => request()->product_id,
            'review'     => request()->review,
            'rating'     => request()->rating,
        ]);

        return response()->json([
            'name'      => auth()->user()->name,
            'review'    => request()->review,
            'rating'    => request()->rating,
            'created_on'=> $review->created_on
        ], 200);
    }
}
