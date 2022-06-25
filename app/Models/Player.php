<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;
use App\Models\Position;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'team_id',
        'country_id',
        'position_id',
        'common_name',
        'display_name',
        'fullname',
        'firstname',
        'lastname',
        'nationality',
        'birthdate',
        'birthcountry',
        'birthplace',
        'height',
        'weight',
        'image_path'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function position()
    {
        return $this->belongsTo(position::class);
    }
}
