<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStorePracticalValue extends FormRequest
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
            'practical_id' => 'required|exists:practicals,id',
            'value' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'practical_id' => 'Nama Praktikum',
            'value' => 'Nilai',
        ];
    }
}
