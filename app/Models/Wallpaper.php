<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category_id',
        'wallpaper_image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
