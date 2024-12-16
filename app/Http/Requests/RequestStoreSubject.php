<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreSubject extends FormRequest
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
            'code' => 'required|string|unique:subjects,code,' . $this->subject,
            'name' => 'required|string|max:255',
            'credit' => 'required|numeric',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'code' => 'Kode mata kuliah',
            'name' => 'Nama mata kuliah',
            'credit' => 'Jumlah SKS',
        ];
    }
}
