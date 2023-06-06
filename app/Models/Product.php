<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'content', 'price', 'image', 'user_id', 'category_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->HasMany(Comment::class);
    }
    public function productsWithStatus($status)
    {
        return $this->belongsToMany(User::class, 'cart')
            ->wherePivot('status', $status)
            ->withTimestamps()
            ->withPivot('status','number');
    }
}
