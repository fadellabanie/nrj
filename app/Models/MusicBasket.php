<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MusicBasket extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'url'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
