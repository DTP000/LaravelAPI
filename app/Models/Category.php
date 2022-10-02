<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class Category extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
