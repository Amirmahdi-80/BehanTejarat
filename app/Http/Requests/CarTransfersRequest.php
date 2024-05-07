<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarTransfersRequest extends FormRequest
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
            'car_id'=>['required'],
            'driver_id'=>['required'],
            'ExitDistance'=>['required'],
            'EnterDistance'=>['required'],
            'Kilometer'=>['required'],
            'Tozih'=>['Nullable'],
            'date'=>['required']
        ];

        // Define common rules for date, Sharh, and Price
        $commonRules = ['nullable']; // Common rule for nullable fields
        for ($i = 1; $i <= 4; $i++) {
            $rules["exit{$i}"] = $commonRules;
            $rules["enter{$i}"] = $commonRules;
        }

        return $rules;
    }
}
