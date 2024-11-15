<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nailpolish extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'image',
        'updated_at',
        'created_at',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
