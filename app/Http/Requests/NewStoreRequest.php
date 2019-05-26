<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewStoreRequest extends FormRequest
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
            'name'  =>  'required|string|unique:store|min:5|max:25',
            'description'  => 'max:90|string',
            'profileimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'backgroundimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
