<?php

use Faker\Generator as Faker;
//作者表  author   字段  name 缩略图 thumb 作品数 works_count    人气值 pop  状态status 。 排序order
$factory->define(App\Models\Author::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,
        'name' => $faker->userName(),
        'thumb' => $faker->imageUrl(100,100),
        'works_count'  => rand(0,10),
        'pop' => rand(0,100),
        'order'       => $faker->randomNumber(),
    ];
});
