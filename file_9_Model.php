<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file_9 extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'code',
        'amount',
        'status',
        'date_created',
        'date_created_gmt',
        'date_modified',
        'date_modified_gmt',
        'discount_type',
        'description',
        'date_expires',
        'date_expires_gmt',
        'usage_count',
        'individual_use',
        'product_ids',
        'excluded_product_ids',
        'usage_limit',
        'usage_limit_per_user',
        'limit_usage_to_x_items',
        'free_shipping',
        'product_categories',
        'excluded_product_categories',
        'exclude_sale_items',
        'minimum_amount',
        'maximum_amount',
        'email_restrictions',
        'used_by',
        'meta_data',
        '_links'
    ];
}
