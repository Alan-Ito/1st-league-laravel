<?php
namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Events\PlayerAddedEvent;


class PlayerController extends Controller
{
    /**
     * Display a listing of the players.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $players = Player::all();
        return response()->json($players);
    }

    static public function addPlayer(): void
    {
        $faker = \Faker\Factory::create();

        // Add a player
        $player = Player::create([
            'name' => $faker->name,
            'age' => $faker->numberBetween(18, 40),
            'position' => $faker->randomElement(['Forward', 'Midfielder', 'Defender', 'Goalkeeper']),
            'team' => $faker->company,
        ]);

        // Broadcast that a player has been added
        broadcast(new PlayerAddedEvent($player));
    }
}
