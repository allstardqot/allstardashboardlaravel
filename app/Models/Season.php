<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'league_id',
        'is_current_season',
        'current_round_id',
        'current_stage_id'
    ];
}
