<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'link',
        'status',
    ];

    public function scopeActive($q)
    {
        return $q->where('status', TRUE);
    }
}
