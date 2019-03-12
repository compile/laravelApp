<?php

use Illuminate\Database\Seeder;
use App\Models\Work;

class WorksTableSeeder extends Seeder
{
    public function run()
    {
        $works = factory(Work::class)->times(50)->make()->each(function ($work, $index) {
            if ($index == 0) {
                // $work->field = 'value';
            }
        });

        Work::insert($works->toArray());
    }

}

