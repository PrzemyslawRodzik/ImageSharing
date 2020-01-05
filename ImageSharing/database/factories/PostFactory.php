<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'caption' => $faker->title,
        'image' => 'uploads/'.$faker->image('public/storage/uploads',1200,1200, null, false),

    ];
});
