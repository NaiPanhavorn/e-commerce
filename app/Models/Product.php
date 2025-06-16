<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'category', 
        'price', 
        'old_price', 
        'description', 
        'image',
        'stock',
        'rating'
    ];

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
