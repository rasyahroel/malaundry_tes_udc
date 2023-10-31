<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LaundryRequest extends FormRequest
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
            'kuota' => 'required',
            'berat' => 'required|integer',
            'price' => 'required|integer',
            'cabang' => 'required',
            'satuans_id' => 'required|exists:satuans,id', // Pastikan model Satuan sudah diimpor
        ];
    }

    public function messages()
    {
        return [
            'kuota.required' => 'Kuota harus diisi.',
            'berat.required' => 'Berat harus diisi.',
            'berat.integer' => 'Berat juga harus berupa angka.',
            'price.required' => 'Harga juga harus diisi.',
            'price.integer' => 'Harga juga harus berupa angka.',
            'cabang.required' => 'Cabang harus diisi dulu ya.',
            'satuans_id.required' => 'Satuan harus diisi.',
            'satuans_id.exists' => 'Satuan yang dipilih tidak valid.',
        ];
    }
}
