<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
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
        $rules = [
            'date'=>['required'],
            'PName'=>['required'],
            'ProName1'=>['required'],
        ];

        // Add rules for ProName
        for ($i = 2; $i <= 20; $i++) {
            $rules["ProName$i"] = ['nullable'];
        }

        return $rules;
    }

}
