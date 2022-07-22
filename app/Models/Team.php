<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Player;


class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'legacy_id',
        'short_code',
        'twitter',
        'country_id',
        'national_team',
        'founded',
        'logo_path',
        'venue_id',
        'current_season_id',
        'is_placeholder'
    ];

    // public function Player()
    // {
    //     return $this->hasMany(Player::class);
    // }

}
