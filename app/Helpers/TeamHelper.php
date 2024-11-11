<?php

namespace App\Helpers;

class TeamHelper
{
    public static function getRandomTeam()
    {
        $faker = \Faker\Factory::create(locale: 'ja_JP');

        $randomEmoji1 = EmojiHelper::getRandomEmoji();
        $randomEmoji2 = EmojiHelper::getRandomEmoji();

        // フルネームからファーストネームを取得
        $fullName = $faker->name;
        $nameParts = explode(' ', $fullName);
        $familyName = $nameParts[0];


        $team = [
            'name' => EmojiHelper::getRandomEmoji() . EmojiHelper::getRandomEmoji() . ' ' . $familyName . ' ' . EmojiHelper::getRandomEmoji() . EmojiHelper::getRandomEmoji(),
        ];

        return $team;
    }
}
