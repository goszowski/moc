<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'is_archived',
        'min_sum',
        'max_sum',
        'min_term',
        'max_term',
        'percent_per_day',
        'penalty_per_day',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_archived' => 'boolean',
        'min_sum' => 'float',
        'max_sum' => 'float',
        'min_term' => 'integer',
        'max_term' => 'integer',
        'percent_per_day' => 'float',
        'penalty_per_day' => 'float',
    ];
}
