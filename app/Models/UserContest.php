<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'pool_id',
        'user_team_id',
    ];
}
