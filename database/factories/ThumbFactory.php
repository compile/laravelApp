<?php

use Faker\Generator as Faker;
//缩略图片表 thumb   path  status
$factory->define(App\Models\Thumb::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'path' => $faker->imageUrl(100,100),
        'status' => rand(0,1)
    ];
});
