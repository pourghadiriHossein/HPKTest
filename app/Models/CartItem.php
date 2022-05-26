<?php

namespace App\Models;

use App\Casts\JalaliDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'discount',
        'count'
    ];

    protected $casts = [
        'created_at' => JalaliDateTime::class,
        'updated_at' => JalaliDateTime::class
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function digitalContent() {
        return $this->belongsTo(DigitalContent::class);
    }

}
