<?php

use Faker\Generator as Faker;
//作品表  works      字段 标题 title   缩略图 thumb     分类 pid  作者uid  人气值pop  index_recom首页推荐 channel_recom频道推荐  状态status     排序order
$factory->define(App\Models\Work::class, function (Faker $faker) {
    return [
        // 'name' => $faker->name,

        'title' => $faker->sentence(6),
        'thumb' => $faker->imageUrl(100,100),
        'pid'  => rand(0,10),
        'uid'  => rand(0,30),
        'pop' => rand(0,100),
        'index_recom' => rand(0,1),
        'channel_recom' => rand(0,1),
        'status'      => $faker->randomNumber(),
        'order'       => $faker->randomNumber(),
    ];
});
