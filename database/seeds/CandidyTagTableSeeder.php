<?php

use Illuminate\Database\Seeder;

class CandidyTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Tag::all()->map(function($tag){
          App\Models\Candidy_tag::create([
            'name' => $tag->name
          ]);
        });
    }
}
