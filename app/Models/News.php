<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'fixture_id',
        'title',
        'localteam',
        'visitorteam',
        'news_created_At'
    ];
}
