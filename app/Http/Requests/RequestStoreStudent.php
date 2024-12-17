<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreStudent extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user_id,
            'nim' => 'required|string|max:255|unique:students,nim,' . $this->student,
            'cohort' => 'required|string|max:255',
        ];

        if ($this->isMethod('POST')) {
            $rules['password'] = 'required|string|min:8|confirmed';
            $rules['password_confirmation'] = 'required|string|same:password';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'email' => 'Email',
            'password' => 'Kata sandi',
            'password_confirmation' => 'Konfirmasi Kata sandi',
            'nim' => 'NIM',
            'cohort' => 'Angkatan',
        ];
    }
}
