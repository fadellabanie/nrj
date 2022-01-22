<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodcast extends Model
{
    use HasFactory;

    protected $fillable = [
        'presenter_id',
        'title',
        'description',
        'image',
        'from',
        'to'
    ];

    public function presenter()
    {
        return $this->belongsTo(Presenter::class);
    }
}
