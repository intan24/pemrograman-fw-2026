<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
     use HasFactory, SoftDeletes;

    protected $fillable = [
    'category_id', 'code', 'name', 'unit', 'price', 'stock', 'image',
];

    // --- ACCESSOR TAMBAHAN ---
    // Dipanggil lewat $product->formatted_price
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Rp' . number_format($this->price, 0, ',', '.')
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
