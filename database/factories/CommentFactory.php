# database/migrations/CommentFactory.php
<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
		'user_id' => 2,
        'contents' => "空いてますか？",
    ];
});