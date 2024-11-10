<?php

namespace App\Helpers;

class PlayerHelper
{
    public static function getRandomPlayer()
    {
        $faker = \Faker\Factory::create(locale: 'ja_JP');

        $randomEmoji1 = EmojiHelper::getRandomEmoji();
        $randomEmoji2 = EmojiHelper::getRandomEmoji();

        // フルネームからファーストネームを取得
        $fullName = $faker->name;
        $nameParts = explode(' ', $fullName);
        $firstName = end($nameParts);


        $player = [
            'name' => $randomEmoji1 . ' ' . $firstName . ' ' . $randomEmoji2,
            'age' => $faker->numberBetween(18, 40),
            'position' => $faker->randomElement(['Forward', 'Midfielder', 'Defender', 'Goalkeeper']),
            'team' => $faker->company,
        ];

        return $player;
    }
}
