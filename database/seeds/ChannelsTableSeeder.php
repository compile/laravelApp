<?php

use Illuminate\Database\Seeder;
use App\Models\Channel;

class ChannelsTableSeeder extends Seeder
{
    public function run()
    {
        $channels = factory(Channel::class)->times(50)->make()->each(function ($channel, $index) {
            if ($index == 0) {
                // $channel->field = 'value';
            }
        });

        Channel::insert($channels->toArray());
    }

}

