<?php

namespace App\Helpers;

class PlayerHelper
{
    public static function getRandomPlayer()
    {
        $faker = \Faker\Factory::create(locale: 'ja_JP');

        $randomEmoji1 = RandomHelper::getRandomEmoji();
        $randomEmoji2 = RandomHelper::getRandomEmoji();

        // フルネームからファーストネームを取得
        $fullName = $faker->name;
        $nameParts = explode(' ', $fullName);
        $firstName = end($nameParts);


        $player = [
            'name' => $randomEmoji1 . ' ' . $firstName . ' ' . $randomEmoji2,
            'age' => $faker->numberBetween(int1: 18, int2: 40),
            'position' => $faker->randomElement(['Forward', 'Midfielder', 'Defender']),
        ];

        return $player;
    }
}
