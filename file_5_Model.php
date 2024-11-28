<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_5 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'slug',
        'type',
        'order_by',
        'has_archives',
        'is_visible',
        '_links'
    ];
}
