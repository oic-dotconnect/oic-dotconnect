<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Event::all()->map(function($event){
          $tag_count = App\Models\Tag::count();
          $faker = Faker::create('ja_JP');
          for ($i=0; $i < $faker->numberBetween(2,$tag_count); $i++) {
            $event->tags()->attach($i);
          }
        });
    }
}
