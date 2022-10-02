<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class Product extends Model
{
    use HasFactory,
        SoftDeletes;

     protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'image',
        'category_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
