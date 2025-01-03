<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPage extends Model
{
    /** @use HasFactory<\Database\Factories\MainPageFactory> */
    use HasFactory;

    protected $fillable = [
        'text',
        'img',
        'url',
    ];
}
