<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['art', 'status', 'name', 'data'];

    protected $casts = ['data' => 'array'];

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
}
