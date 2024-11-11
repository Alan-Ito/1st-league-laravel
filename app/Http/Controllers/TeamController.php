<?php
namespace App\Http\Controllers;

use App\Helpers\PlayerHelper;
use App\Helpers\TeamHelper;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{

    static public function addTeamWithPlayers(int $playerNumber): \Illuminate\Http\JsonResponse
    {
        // Add a team
        $team = Team::create(TeamHelper::getRandomTeam());

        // Add players
        $players = Player::factory()->count($playerNumber)->create();

        // 中間テーブルに所属関係を追加
        foreach ($players as $player) {
            $team->players()->attach($player->id);
        }

        return response()->json([
            'team' => $team,
            'players' => $players
        ]);
    }

    // チームIDに基づいてチームと選手を取得
    public function get($id)
    {
        $team = Team::find($id);

        if (!$team) {
            return response()->json(['message' => 'Team not found'], 404);
        }

        // チームIDに基づいて選手を取得
        $players = DB::table('players')
            ->join('r_team_player', 'players.id', '=', 'r_team_player.player_id')
            ->where('r_team_player.team_id', $id)
            ->select('players.*')
            ->get();

        return response()->json(data: [
            'team' => $team,
            'players' => $players
        ]);
    }
}
