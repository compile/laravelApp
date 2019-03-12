<?php

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorsTableSeeder extends Seeder
{
    public function run()
    {
        $authors = factory(Author::class)->times(50)->make()->each(function ($author, $index) {
            if ($index == 0) {
                // $author->field = 'value';
            }
        });

        Author::insert($authors->toArray());
    }

}

