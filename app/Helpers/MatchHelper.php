<?php

namespace App\Helpers;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Models\Player;



class MatchStatus
{
    private $matchId;
    public $team1Id;
    public $team2Id;
    public $team1Score;
    public $team2Score;
    public $timeElapsed;

    public array $team1PlayerIds = [];
    public array $team2PlayerIds = [];

    public array $commentary = [];

    public function __construct($team1Id, $team2Id)
    {
        $this->team1Id = $team1Id;
        $this->team2Id = $team2Id;
        $this->team1Score = 0;
        $this->team2Score = 0;
        $this->timeElapsed = 0;
        $this->team1PlayerIds = DB::table('r_team_player')->where('team_id', $team1Id)->pluck('player_id')->toArray();
        $this->team2PlayerIds = DB::table('r_team_player')->where('team_id', $team2Id)->pluck('player_id')->toArray();
        $this->commentary = ["Match started", "First half started"];
    }
}

class MatchHelper
{

    public static function generateDetailedMatchCommentary($team1_id, $team2_id)
    {
        $matchStatus = new MatchStatus($team1_id, $team2_id);
        return $matchStatus;
    }

}
