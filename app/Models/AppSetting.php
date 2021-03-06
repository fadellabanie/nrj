<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook', 
        'twitter',
        'instagram', 
        'youtube', 
        'mobile',
        'whats_app', 
        'email',
        'redio_live',
        'about_us',
    ];
}
