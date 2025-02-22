<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'code',
        'name',
        'brand',
        'purchase_date',
        'description',
        'quantity',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
