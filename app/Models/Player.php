<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team;

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
}
