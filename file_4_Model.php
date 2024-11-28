<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_4 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'count',
        'is_visible',
        '_links'
    ];
}
