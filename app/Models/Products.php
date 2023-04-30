<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'brand_id',
        'currency_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function sales() {
        return $this->belongsTo(Sales::class);
    }
}
