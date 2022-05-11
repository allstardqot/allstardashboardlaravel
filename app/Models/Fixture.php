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

    public function teams1()
    {
        return $this->belongsTo(Team::class, 'localteam_id', 'id');
    }

    public function teams2()
    {
        return $this->belongsTo(Team::class, 'visitorteam_id', 'id');
    }

    public function player1()
    {
        return $this->hasMany(Player::class,'team_id','localteam_id')->join('squads','squads.player_id','=','players.id')->where(['squads.playing11'=>1]);
    }

    public function player2()
    {
        return $this->hasMany(Player::class,'team_id','visitorteam_id')->join('squads','squads.player_id','=','players.id')->where(['squads.playing11'=>1]);
    }
}
