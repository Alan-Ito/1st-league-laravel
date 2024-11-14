<?php
namespace App\Http\Controllers;

use App\Helpers\TeamHelper;
use App\Helpers\MatchHelper;
use App\Models\Player;
use App\Models\Team;

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
    public function get()
    {
        // パラメータからチームIDを取得
        $id = request()->input('team_id');
        $response = TeamHelper::getTeamById($id);
        if (isset($response['message'])) {
            return response()->json(['message' => $response['message']], 404);
        }
        return response()->json(data: $response);
    }

    public function getAll()
    {
        $teams = Team::all();

        return response()->json(data: $teams);
    }

    public function getRandomCommentary()
    {
        $two_teams = TeamHelper::findTwoTeamsRandomly();
        if (array_key_exists('message', $two_teams)) {
            return response()->json(['message' => $two_teams['message']], 404);
        }
        $team1_id = $two_teams[0]->id;
        $team2_id = $two_teams[1]->id;

        $commentary = MatchHelper::generateDetailedMatchCommentary($team1_id, $team2_id);

        return response()->json(data: $commentary);
    }
}
