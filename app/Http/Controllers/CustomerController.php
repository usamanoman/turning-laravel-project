<?php

namespace App\Http\Controllers;

use Auth;

use App\Http\Requests\CreateCustomerRequest;
use App\Http\Requests\LoginCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

/**
 * Customer controller handles all requests that has to do with customer
 * Some methods needs to be implemented from scratch while others may contain one or two bugs.
 *
 *  NB: Check the BACKEND CHALLENGE TEMPLATE DOCUMENTATION in the readme of this repository to see our recommended
 *  endpoints, request body/param, and response object for each of these method
 *
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'getCustomerProfile', 
            'updateCustomerAddress',
            'updateCreditCard',
            'apply'
        ])->except('login', 'create');
    }

    /**
     * Allow customers to create a new account.
     *
     * @param CreateCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateCustomerRequest $request)
    {      
        $customer           = new Customer;
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->password = bcrypt($request->password);

        try
        {
            if( $customer->save() )
            {
                // Create Token
                $token = $customer->createToken('turing');

                // Login User
                Auth::attempt([
                    'email' => $request->email, 
                    'password' => $request->password 
                ]);

                return response()->json([
                    'customer' => $customer->fresh(),
                    'accessToken' => $token->accessToken,
                    'expiresIn' => $token->token->expires_at,
                ]);
            }
        }
        catch(\Exception $e)
        {
            if($e->errorInfo[1] == 1062)
            {
                return response()->json([
                    "error" => [
                        'status' => 400,
                        'code'   => 'USR_04',
                        'message'=> 'This email already exists',
                        'field'  => 'email'
                    ]
                ], 400);
            }
        }
    }

    /**
     * Allow customers to login to their account.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginCustomerRequest $request)
    {
        if( Auth::attempt([ 'email' => $request->email, 'password' => $request->password ]) )
        {
            $customer = Auth::user();

            // Create Token
            $token = $customer->createToken('turing');

            return response()->json([
                    'customer' => $customer->fresh(),
                    'accessToken' => $token->accessToken,
                    'expiresIn' => $token->token->expires_at,
                ]); 
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'AUTH_03',
                'message'=> 'Invalid Credentials',
            ]
        ], 400);
    }

    /**
     * Allow customers to view their profile info.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCustomerProfile()
    {
        return response()->json(auth()->user());
    }

    /**
     * Allow customers to update their profile info like name, email, password, day_phone, eve_phone and mob_phone.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCustomerProfile()
    {
        return response()->json(['message' => 'this works']);
    }

    /**
     * Allow customers to update their address info/
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCustomerAddress(UpdateCustomerAddressRequest $request)
    {
        $customer                    = Customer::where('email', auth()->user()->email)->first();
        $customer->address_1         = $request->address_1;
        $customer->address_2         = $request->address_2;
        $customer->city              = $request->city;
        $customer->country           = $request->country;
        $customer->region            = $request->region;
        $customer->postal_code       = $request->postal_code;
        $customer->shipping_region_id= $request->shipping_region_id;

        if( $customer->save() )
        {
            return response()->json($customer->fresh(), 200);
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CUST_10',
                'message'=> 'Unable to save Customer Address Information',
            ]
        ], 400);
    }

    /**
     * Allow customers to update their credit card number.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCreditCard(Request $request)
    {
        $this->validate($request, [
            'credit_card' => 'required'
        ]);

        $customer                    = Customer::where('email', auth()->user()->email)->first();
        $customer->credit_card       = str_pad(substr($request->credit_card, -4), strlen($request->credit_card), '*', STR_PAD_LEFT);

        if( $customer->save() )
        {
            return response()->json($customer->fresh());
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CUST_11',
                'message'=> 'Unable to save Customer CC Information',
            ]
        ], 400);
    }

    /**
     * Apply something to customer.
     *  
     * @return \Illuminate\Http\JsonResponse
     */
    public function apply(UpdateCustomerRequest $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        $customer->name = $request->name;
        $customer->day_phone = $request->day_phone;
        $customer->eve_phone = $request->eve_phone;
        $customer->mob_phone = $request->mob_phone;

        if( $customer->save() )
        {
            return response()->json($customer->fresh());
        }

        return response()->json([
            "error" => [
                'status' => 400,
                'code'   => 'CUST_09',
                'message'=> 'Unable to save Customer Information',
            ]
        ], 400);
    }


}
