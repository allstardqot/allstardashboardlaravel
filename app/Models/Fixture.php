<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'season_id',
        'league_id',
        'stage_id',
        'round_id',
        'group_id',
        'aggregate_id',
        'venue_id',
        'referee_id',
        'localteam_id',
        'visitorteam_id',
        'weather_report',
        'scores',
        'starting_at',
    ];
}
