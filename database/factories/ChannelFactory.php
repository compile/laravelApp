<?php

use Faker\Generator as Faker;

//频道表  channel  字段  标题  title  缩略图  desc描述   作品数 works_count      状态status   排序 order

$factory->define(App\Models\Channel::class, function (Faker $faker) {
    return [
         'title' => $faker->sentence(6),
         'thumb' => $faker->imageUrl(100,100),
         'desc'  => $faker->sentence(500),
         'works_count' => rand(0,100),
         'status'      => $faker->randomNumber(),
         'order'       => $faker->randomNumber(),


    ];
});
