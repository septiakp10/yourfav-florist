<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'nama_product',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'category_id',
        'brand_id',
    ];

    /**
     * Relasi Many to One: Product dimiliki oleh satu Category
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**
     * Relasi Many to One: Product dimiliki oleh satu Brand
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }
}
