<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OutRequest extends FormRequest
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
            'TotalPrice'=>['Nullable'],
            'Count'=>['Nullable'],
            'exitPrice'=>['Nullable'],
            'date'=>['required'],
            'TName'=>['required'],
            'PName'=>['required'],
            'TotalPrice2'=>['Nullable'],
            'Count2'=>['Nullable'],
        ];
    }
}
