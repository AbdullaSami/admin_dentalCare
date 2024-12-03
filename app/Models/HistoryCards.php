<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryCards extends Model
{
    /** @use HasFactory<\Database\Factories\HistoryCardsFactory> */
    use HasFactory;
    protected $fillable = [
        "year",
        "brief",
        "logo",
        "url",
    ];
}
