<?php

namespace App\Helpers;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamHelper
{
    public static function getRandomTeam()
    {
        $faker = \Faker\Factory::create(locale: 'ja_JP');

        $randomEmoji1 = RandomHelper::getRandomEmoji();
        $randomEmoji2 = RandomHelper::getRandomEmoji();

        // ランダムな苗字をチーム名に使用する
        $fullName = $faker->name;
        $nameParts = explode(' ', $fullName);
        $familyName = $nameParts[0];


        $team = [
            'name' => RandomHelper::getRandomEmoji() . RandomHelper::getRandomEmoji() . ' チーム' . $familyName . ' ' . RandomHelper::getRandomEmoji() . RandomHelper::getRandomEmoji(),
        ];

        return $team;
    }

    public static function getTeamById($team_id): array
    {
        $team = Team::find($team_id);

        if (!$team) {
            return ['message' => 'Team not found'];
        }

        // チームIDに基づいて選手を取得
        $players = DB::table('players')
            ->join('r_team_player', 'players.id', '=', 'r_team_player.player_id')
            ->where('r_team_player.team_id', $team_id)
            ->select('players.*')
            ->get();

        return [
            'team' => $team,
            'players' => $players
        ];
    }

    public static function findTwoTeamsRandomly(): array
    {
        if (Team::count() < 2) {
            return ['message' => 'Not enough teams'];
        }

        // 異なる2チームをランダムに選択
        $team1 = Team::inRandomOrder()->first();
        $team2 = Team::inRandomOrder()->first();

        while ($team1->id === $team2->id) {
            $team2 = Team::inRandomOrder()->first();
        }

        return [$team1, $team2];
    }
}
