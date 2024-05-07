<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndicatorRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'Product' => ['required'],
            'Analyse1' => ['required'],
            'Deviation1' => ['required'],
            'date' => ['required'],
            'Tamin' => ['required'],
            'VaznKol' => ['required'],
            'TolKol' => ['required'],
            'AnzKol' => ['required'],
            'ShKol' => ['required'],
            'EnherafKol' => ['required'],
            'Product1'=>['required'],
        ];

        // Add rules for Product 1 to 10
        for ($i = 2; $i <= 20; $i++) {
            $rules["Product$i"] = ['nullable'];
            $rules["Analyse$i"] = ['nullable'];
            $rules["Deviation$i"] = ['nullable'];
            $rules["Tol$i"] = ['nullable'];
        }

        return $rules;
    }
}
