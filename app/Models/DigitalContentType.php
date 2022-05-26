<?php

namespace App\Models;

use App\Casts\JalaliDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DigitalContentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $casts = [
        'created_at' => JalaliDateTime::class,
        'updated_at' => JalaliDateTime::class
    ];

    public function digitalContents() {
        return $this->hasMany(DigitalContent::class);
    }
}
