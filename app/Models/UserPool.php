<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPool extends Model
{
    use HasFactory;
    protected $table = 'user_pools';
    protected $fillable = [
        'id',
        'user_id',
        'pool_name',
        'pool_Type',
        'max_participants',
        'team_id',
        'password',
        
    ];
}
