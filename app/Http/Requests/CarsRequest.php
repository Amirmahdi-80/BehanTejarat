<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarsRequest extends FormRequest
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
            'CarName'=>['required'],
            'CarPlate'=>['required'],
            'CarColor'=>['required'],
            'image' => ["Nullable",'file','image','max:4096'],
            'Kilometer'=>['Nullable'],
            'BimeSales' => ["Nullable",'file','image','max:4096'],
            'CarCard' => ["Nullable",'file','image','max:4096'],
            'BargSabz' => ["Nullable",'file','image','max:4096'],
            'Badane' => ["Nullable",'file','image','max:4096']
        ];
    }
}
