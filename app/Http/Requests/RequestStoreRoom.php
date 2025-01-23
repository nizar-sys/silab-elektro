<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreRoom extends FormRequest
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
            'code' => 'required|string|unique:rooms,code,' . $this->room,
            'name' => 'required|string|max:255',
            'link_stream' => 'required|url',
        ];

        if ($this->isMethod('POST')) {
            $rules['foto'] = 'required';
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'code' => 'Kode ruangan',
            'name' => 'Nama ruangan',
            'link_stream' => 'Link streaming',
            'foto' => 'Foto ruangan',
        ];
    }
}
