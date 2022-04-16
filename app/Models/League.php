<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'type',
        'legacy_id',
        'country_id',
        'logo_path',
        'active',
        'is_cup',
        'is_friendly',
        'current_season_id',
        'current_round_id',
        'current_stage_id',
        'live_standings',
        'coverage',
    ];
}
