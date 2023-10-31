<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SatuanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'unit' => 'required|unique:satuans', 
            'desc' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unit.required' => 'Isi unit nya dulu',
            'desc.required' => 'Deskripsinya jangan lupa'
        ];
    }
}
