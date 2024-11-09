<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Log;


class AddPlayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'player:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new player';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = PlayerController::addPlayer();
        Log::info($response);
    }
}
