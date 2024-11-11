<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Helpers\TeamHelper;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = \App\Models\Team::class;

    public function definition(): array
    {
        return TeamHelper::getRandomTeam();
    }
}
