<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent',
        'description',
        'display',
        'image',
        'menu_order',
        'count',
        'has_children',
        '_links'
    ];
}
