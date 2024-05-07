<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
//        $this->prefix();
        return [
            'ProductComment'=>['string','required'],
            'ProductId'=>['Nullable'],
            'Vahed'=>['max:255'],
            'Details2'=>['max:255'],
            'Sort'=>['required'],
            'Price'=>['Nullable'],
            'ProductImage'=>['file','max:2048'],
            'Storage'=>['Nullable'],
            'OrderDot'=>['Nullable'],
            'Indicate'=>['Nullable'],

        ];
    }
//    public function prefix()
//    {
//        if (!$this->request->has('Send')) {
//            $this->request->add(["Send" => 0]);
//        }
//    }
}
