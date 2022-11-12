<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreAddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'max:100'],
            'lastName' => ['required', 'max:50'],
            'streetAddress' => ['required', 'max:150'],
            'city' => ['required', 'max:50'],
            'state' => ['required', 'max:50'],
            'country' => ['required', 'max:14'],
            'zipcode' => ['required', 'max:25'],
        ];
    }
}
