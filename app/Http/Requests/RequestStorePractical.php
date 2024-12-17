<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStorePractical extends FormRequest
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
            'room_id' => 'required|exists:rooms,id',
            'schedule_id' => 'required|exists:schedules,id',
            'student_id' => 'required|exists:students,id',
            'name' => 'required|string|max:255',
            'session' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'room_id' => 'Ruangan',
            'schedule_id' => 'Jadwal',
            'student_id' => 'Mahasiswa',
            'name' => 'Nama',
            'session' => 'Sesi',
        ];
    }
}
