<?php

namespace App\Models;

use App\Casts\JalaliDateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    protected $casts = [
        'created_at' => JalaliDateTime::class,
        'updated_at' => JalaliDateTime::class
    ];

    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function digitalContents() {
        return $this->belongsToMany(DigitalContent::class, 'digital_content_category');
    }
}
