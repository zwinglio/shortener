<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'title',
        'url',
        'user_id',
    ];

    protected static function booted()
    {
        static::creating(function ($link) {
            $link->identifier = Str::random(6);
            while (Link::where('identifier', $link->identifier)->exists()) {
                break;
            }
        });
    }
}
