<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_1'         => 'required',
            'address_2'         => 'required',
            'city'              => 'required',
            'country'           => 'required',
            'region'            => 'required',
            'postal_code'       => 'required',
            'shipping_region_id'=> 'required',
        ];
    }
}
