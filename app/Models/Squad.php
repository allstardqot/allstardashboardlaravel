<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'player_id',
        'fixture_id',
        'week_id',
        'fixture_starting_at',
        'team',
        'is_active',
        'injured',
        'team_id',
        'shots',
        'shot_point',
        'goals',
        'goal_points',
        'fouls',
        'foul_point',
        'cards',
        'card_points',
        'passing',
        'passing_point',
        'dribbles',
        'dribble_point',
        'duels',
        'duel_point',
        'other',
        'other_points',
        'player_rating',
        'total_points',
        'rating'
    ];
}
