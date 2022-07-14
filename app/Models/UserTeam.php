<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'week',
        'current_week',
        'captain',
        'substitude',
        'players',
        'name',
        'total_points'
    ];
}
