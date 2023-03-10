<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function scopeActive($q)
    {
        return $q->where('status', true)->get();
    }
}
