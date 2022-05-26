<?php

namespace App\Models;

use App\Casts\JalaliDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DigitalContent extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'discount'];
    protected $appends = ['short_description'];
//    protected $hidden = ['price'];

    protected $casts = [
        'created_at' => JalaliDateTime::class,
        'updated_at' => JalaliDateTime::class
    ];

    public function getNameAttribute($value) {
        return $value;
    }

    public function getShortDescriptionAttribute() {
        return Str::words($this->description, 15);
    }

    public function digitalContentType() {
        return $this->belongsTo(DigitalContentType::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'digital_content_category');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
//    public function getRouteKeyName()
//    {
//        return 'name';
//    }
}
