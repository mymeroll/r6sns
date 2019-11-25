# database/migrations/PostFactory.php

<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => 'シージランク募集@3ゴールド帯以上',
		 'user_id' => 1,
        'contents' => "本日の19時頃から始める予定です",
    ];
});