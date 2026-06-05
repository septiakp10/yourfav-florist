<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'nama_brand',
    ];

    /**
     * Relasi One to Many: Brand memiliki banyak Product
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'brand_id');
    }
}
