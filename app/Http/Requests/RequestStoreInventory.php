<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreInventory extends FormRequest
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
            'code' => 'required|string|max:255|unique:inventories,code,' . $this->inventory,
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'purchase_date' => 'required|date',
            'description' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ];
    }

    public function attributes(): array
    {
        return [
            'room_id' => 'Ruangan',
            'code' => 'Kode',
            'name' => 'Nama',
            'brand' => 'Merek',
            'purchase_date' => 'Tanggal Pembelian',
            'description' => 'Deskripsi',
            'quantity' => 'Jumlah',
        ];
    }
}
