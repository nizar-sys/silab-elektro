<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'inventory_id',
        'student_id',
        'borrow_date',
        'return_date',
        'returned_date',
        'status',
        'amount',
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
