<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bkk extends Model
{
    use HasFactory;

    protected $fillable = [
        'instance',
        'industrial_sector',
        'addr',
        'whatsapp',
        'email',
        'image'
    ];
}
