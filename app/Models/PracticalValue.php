<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PracticalValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'practical_id',
        'value',
    ];

    public function practical()
    {
        return $this->belongsTo(Practical::class);
    }
}
