<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'start_date',
        'end_date',
        'price_list',
        'brand_id',
        'product_id',
        'price',
        'currency',
    ];

    public function products() {
        return $this->hasMany(Products::class);
    }

    public function brand() {
        return $this->hasMany(Brand::class);
    }

}
