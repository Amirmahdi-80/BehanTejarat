<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverRequest extends FormRequest
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
            'DriverName'=>['required'],
            'MeliCode'=>['required'],
            'image' => ['file','image','max:4096'],
            'DriverLicence' => ['file','image','max:4096'],
            'DriverNumber'=>['required']
        ];
    }
}
