<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrdersRequest extends FormRequest
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
        return [
            "ProductId"=>['required'],
            "ProductComment"=>['required'],
            "ProductNo"=>['required'],
            "Vahed"=>['required'],
            "Details2"=>['required'],
            "Firstname"=>['required',"string"],
            "Lastname"=>['required',"string"],
            "email"=>['required'],
            "Address"=>['required'],
            "PhoneNumber"=>['required','max:11'],
            "Vaziat"=>['int','Nullable'],
            "Count"=>['int','required'],
            "Sort"=>['required'],
            "Storage"=>['required'],
        ];
    }
}
