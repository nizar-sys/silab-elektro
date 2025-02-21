<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreBorrow extends FormRequest
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
            'inventory_id' => 'required|exists:inventories,id',
            'student_id' => 'required|exists:students,id',
            'amount' => 'required|numeric|min:1',
        ];
    }

    // attributes
    public function attributes(): array
    {
        return [
            'inventory_id' => 'Barang',
            'student_id' => 'Mahasiswa',
            'borrow_date' => 'Tanggal Pinjam',
            'return_date' => 'Tanggal Kembali',
            'amount' => 'Jumlah Pinjam',
        ];
    }
}
