<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CostRequest extends FormRequest
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
     * @return array<string, string|array>
     */
    public function rules(): array
    {
        $rules = [
            'date' => ['required'],
            'CarNam' => ['nullable'],
            'HaNam' => ['nullable'],
            'Group' => ['required'],
            'PriceKol' => ['required'],
        ];

        // Define common rules for date, Sharh, and Price
        $commonRules = ['nullable']; // Common rule for nullable fields
        for ($i = 1; $i <= 10; $i++) {
            $rules["date{$i}"] = $commonRules;
            $rules["Sharh{$i}"] = $commonRules;
            $rules["Price{$i}"] = $commonRules;
        }

        return $rules;
    }
}
