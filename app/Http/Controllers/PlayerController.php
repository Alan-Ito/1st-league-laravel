<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Events\PlayerAddedEvent;
use App\Helpers\PlayerHelper;

class PlayerController extends Controller
{
    /**
     * Display a listing of the players.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $players = Player::orderBy('id', 'desc')->take(100)->get()->toArray();
        return response()->json(data: $players);
    }

    static public function addPlayer(): void
    {

        // Add a player
        $player = Player::create(PlayerHelper::getRandomPlayer());

        // Broadcast that a player has been added
        broadcast(new PlayerAddedEvent($player));
    }
}
