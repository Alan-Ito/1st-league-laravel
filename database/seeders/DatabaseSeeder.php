<?php

namespace Database\Seeders;

use App\Models\User;
use App\Http\Controllers\TeamController;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 他のシーディング処理
        $this->call([
            PlayersTableSeeder::class,
        ]);

        TeamController::addTeamWithPlayers(5);
    }
}
