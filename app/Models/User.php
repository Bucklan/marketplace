<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function comments()
    {
        return $this->HasMany(Comment::class);
    }

    function productsWithStatus($status)
    {
        return $this->belongsToMany(Product::class, 'cart')->
        wherePivot('status', $status)
        ->withTimestamps()
        ->withPivot('status', 'number');
    }
}
