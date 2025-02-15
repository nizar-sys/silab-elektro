<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreAttendance extends FormRequest
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
            'practical_id' => ['required', 'integer', 'exists:practicals,id'],
            'status' => ['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'practical_id.required' => 'Praktikum wajib diisi.',
            'practical_id.integer' => 'Praktikum harus berupa angka.',
            'practical_id.exists' => 'Praktikum tidak ditemukan.',
            'status.required' => 'Status wajib diisi.',
        ];
    }
}
