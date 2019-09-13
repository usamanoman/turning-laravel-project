<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\CreateOrderRequest;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\ShoppingCart;

use Carbon\Carbon;

use Validator;

use DB;

/**
 * Check each method in the shopping cart controller and add code to implement
 * the functionality or fix any bug.
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 *
 * Class ShoppingCartController
 * @package App\Http\Controllers
 */
class ShoppingCartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', [
            'createOrder', 
            'generateUniqueCart', 
            'addItemToCart', 
            'updateCartItem',
            'emptyCart',
            'createOrder',
            'getOrderSummary',
            'getCustomerOrders',
            'getOrderShortDetail',
            'generateUniqueCart'
        ]);
    }

    /**
     * To generate a unique cart id.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function generateUniqueCart()
    {
        return response()->json(['cart_id' => ShoppingCart::getOrCreateCartId(auth()->user()) ]);
    }

    /**
     * To add new product to the cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addItemToCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_id'               => 'required|string',
            'product_id'            => 'required|integer',
            'product_attributes'    => 'required|string',
            'quantity'              => 'required|integer'
        ]);

        if( $validator->fails() )
        {
            return response()->json([
                "error" => [
                    'status' => 400,
                    'code'   => 'CART_01',
                    'messages'=> $validator->errors(),
                ]
            ], 400);   
        }

        // Check if Product already Exists in the Cart
        $item = ShoppingCart::where('cart_id', $request->cart_id)
        ->where('product_id', $request->product_id)->first();

        if( $item )
        {
            $item->attributes = $request->product_attributes;
            $item->quantity   = $request->quantity;

            if( $item->save() )
            {
                return response()->json([
                    'cart_id'   => $request->cart_id,
                    'product_id'=> $request->product_id,
                    'attributes'=> $request->product_attributes,
                    'quantity'  => $request->quantity,
                    'item_id'   => $item->item_id,
                ], 201);
            }
        }
        else
        {
            $cart             = new ShoppingCart;
            $cart->cart_id    = $request->cart_id;
            $cart->product_id = $request->product_id;
            $cart->attributes = $request->product_attributes;
            $cart->quantity   = $request->quantity;
            $cart->customer_id= auth()->user()->getKey();
            $cart->added_on   = Carbon::now()->toDateTimeString();

            if( $cart->save() )
            {
                return response()->json([
                    'cart_id'   => $request->cart_id,
                    'product_id'=> $request->product_id,
                    'attributes'=> $request->product_attributes,
                    'quantity'  => $request->quantity,
                    'item_id'   => $cart->item_id,
                ], 201);
            }
        }


        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CART_02',
                'message'=> 'Unable to add item to Cart',
            ]
        ], 400);
    }

    /**
     * Method to get list of items in a cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCart($cart_id)
    {
        $products = ShoppingCart::with('product')->where('cart_id', $cart_id)->get();
        return response()->json($products->transform(function($product) {
            return [
                'item_id'         => $product->item_id,
                'card_id'         => $product->card_id,
                'name'            => $product->product->name,
                'attributes'      => $product->attributes,
                'product_id'      => $product->product->product_id,
                'image'           => $product->product->image,
                'price'           => $product->product->price,
                'discounted_price'=> $product->product->discounted_price,
                'quantity'        => $product->quantity,
                'subtotal'        => ($product->product->price * $product->quantity),
            ];
        }));
    }

    /**
     * Update the quantity of a product in the shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCartItem($item_id)
    {
        if( !request()->has('quantity') )
        {
            return response()->json([
                "error" => [
                    'status' => 400,
                    'code'   => 'CART_03',
                    'message'=> 'Missing quantity parameter',
                ]
            ], 400);
        }


        $cart_id = ShoppingCart::getOrCreateCartId( auth()->user() );
        $item = ShoppingCart::where('cart_id', $cart_id)->where('item_id', $item_id)->first();
        $item->quantity = request()->quantity;

        if( $item->save() )
        {
            return response()->json([
                'cart_id'   => $item->cart_id,
                'product_id'=> $item->product_id,
                'attributes'=> $item->attributes,
                'quantity'  => $item->quantity,
                'item_id'   => $item->item_id,
            ], 201);
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CART_04',
                'message'=> 'Unable to update Cart Item',
            ]
        ], 400);
    }

    /**
     * Should be able to clear shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function emptyCart($cart_id)
    {
        if( is_null($cart_id) )
        {
            return response()->json([
                "error" => [
                    'status' => 400,
                    'code'   => 'CART_05',
                    'message'=> 'Missing Cart Id',
                ]
            ], 400);
        }

        $cart_id = ShoppingCart::getOrCreateCartId( auth()->user() );
        $cart = ShoppingCart::where('cart_id', $cart_id);

        if( $cart->delete() > 0 )
        {
            return response()->json([], 200);
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CART_06',
                'message'=> 'Unable to empty Cart',
            ]
        ], 400);
    }

    /**
     * Should delete a product from the shopping cart.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeItemFromCart($item_id)
    {
        if( is_null($item_id) )
        {
            return response()->json([
                "error" => [
                    'status' => 400,
                    'code'   => 'CART_07',
                    'message'=> 'Missing Item Id',
                ]
            ], 400);
        }

        $cart_id = ShoppingCart::getOrCreateCartId( auth()->user() );
        $item = ShoppingCart::where('cart_id', $cart_id)->where('item_id', $item_id);

        if( $item->delete() > 0 )
        {
            return response()->json([
                'message' => 'Item removed from Cart'
            ], 200);
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CART_08',
                'message'=> 'Unable to delete Cart Item',
            ]
        ], 400);
    }

    /**
     * Create an order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'cart_id'    => 'required',
            'shipping_id'=> 'required',
            'tax_id'     => 'required',
        ]);

        if( $validator->fails() )
        {
            return response()->json([
                "error" => [
                    'status' => 400,
                    'code'   => 'CART_09',
                    'messages'=> $validator->errors(),
                ]
            ], 400);   
        }

        $cart = ShoppingCart::with('product')->where('cart_id', $request->cart_id);

        $order              = new Order;
        $order->total_amount= 0;
        $order->created_on  = Carbon::now()->toDateTimeString();
        $order->customer_id = auth()->user()->getKey();
        $order->shipping_id = $request->shipping_id;
        $order->tax_id      = $request->tax_id;

        if( $order->save() )
        {
            $total = 0;

            $cart_items = $cart->get();

            foreach( $cart_items as $item )
            {
                $order->details()->create([
                    'order_id'    => $order->order_id,
                    'product_id'  => $item->product->product_id,
                    'product_name'=> $item->product->name,
                    'attributes'  => $item->attributes,
                    'quantity'    => $item->quantity,
                    'unit_cost'   => $item->product->price,
                ]);

                $total += ($item->quantity * $item->product->price);
            }

            $order->total_amount = $total;
            $order->save();
            $cart->delete();

            return response()->json([ 'order_id' => $order->order_id ]);
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CART_10',
                'message'=> 'Unable to Create Order',
            ]
        ], 400);

    }

    /**
     * Get short details of an Order
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrderShortDetail(Order $order)
    {
        $customer = auth()->user();
        return response()->json([
                'order_id'     => $order->order_id,
                'total_amount' => $order->total_amount,
                'created_on'   => $order->created_on,
                'shipped_on'   => $order->shipped_on,
                'name'         => $customer->name,
                'status'       => $order->status,
            ], 200);
    }

    /**
     * Get all orders of a customer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomerOrders()
    {
        $customer = auth()->user();
        $orders = Order::where('customer_id', $customer->getKey())->get();

        return response()->json($orders->transform(function($order) use ($customer) {
            return [
                'order_id'     => $order->order_id,
                'total_amount' => $order->total_amount,
                'created_on'   => $order->created_on,
                'shipped_on'   => $order->shipped_on,
                'name'         => $customer->name,
            ];
        }));
    }

    /**
     * Get the details of an order.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrderSummary(Order $order)
    {
        return response()->json([
            'order_id'    => $order->order_id,
            'order_items' => $order->details->transform(function($detail) {
                return [
                    'product_id'   => $detail->product_id,
                    'attributes'   => $detail->attributes,
                    'product_name' => $detail->product_name,
                    'quantity'     => $detail->quantity,
                    'unit_cost'    => $detail->unit_cost,
                    'subtotal'     => ( $detail->quantity * $detail->unit_cost )
                ];
            })
        ], 200);
    }

    /**
     * Process stripe payment.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function processStripePayment()
    {
        return response()->json(['message' => 'this works']);
    }
}
