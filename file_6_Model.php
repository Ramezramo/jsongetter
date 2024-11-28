<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_6 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'date',
        'date_gmt',
        'guid',
        'modified',
        'modified_gmt',
        'slug',
        'status',
        'type',
        'link',
        'title',
        'content',
        'excerpt',
        'author',
        'featured_media',
        'comment_status',
        'ping_status',
        'sticky',
        'template',
        'format',
        'meta',
        'categories',
        'tags',
        'class_list',
        'better_featured_image',
        'image_feature',
        'author_name',
        '_links',
        '_embedded'
    ];
}
