<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'image_title',
        'images',
        'description',
        'status'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
