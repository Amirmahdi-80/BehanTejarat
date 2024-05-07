<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EdituserRequest extends FormRequest
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
            'Firstname'=>['required','string'],
            'Lastname'=>['required','string'],
            'email'=>['required','email'],
            'avatar' => ['file', 'mimes:jpg,png,jpeg']
        ];
    }
}
