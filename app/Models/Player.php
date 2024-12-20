<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'age',
    ];

    public function team()
    {
        return $this->belongsToMany(Team::class, 'r_team_player');
    }
}
