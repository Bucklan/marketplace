<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = [
        'product_id',
        'user_id',
        'status',
        'number'
    ];

    function product(){
        return $this->belongsTo(Product::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
