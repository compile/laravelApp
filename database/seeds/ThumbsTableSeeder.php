<?php

use Illuminate\Database\Seeder;
use App\Models\Thumb;

class ThumbsTableSeeder extends Seeder
{
    public function run()
    {
        $thumbs = factory(Thumb::class)->times(50)->make()->each(function ($thumb, $index) {
            if ($index == 0) {
                // $thumb->field = 'value';
            }
        });

        Thumb::insert($thumbs->toArray());
    }

}

