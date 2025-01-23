<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'link_stream',
        'foto',
    ];

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function practicals()
    {
        return $this->hasMany(Practical::class);
    }
}
