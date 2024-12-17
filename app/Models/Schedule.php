<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'hour'];

    public function practicals()
    {
        return $this->hasMany(Practical::class);
    }
}
