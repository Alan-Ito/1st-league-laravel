<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use Illuminate\Support\Str; //追加
use Illuminate\Support\Facades\Hash; //追加
use App\Models\Player;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Player::factory()->count(10)->create();
    }
}
