<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'nim', 'room', 'img'];

    public function presences()
    {
        return $this->hasMany(Presence::class);
    }
}
