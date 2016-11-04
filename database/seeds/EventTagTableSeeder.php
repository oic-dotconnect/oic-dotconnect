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
      $z=0;
      for($i=0;$i<11;$i++){
        for($j=0;$j<5;$j++){
        DB::table('event_tag')->insert([
          'event_id'=> $i,
          'tag_id' => $z
          ]);
        $z++;
        }
      }

        /*App\Models\Event::all()->map(function($event){
          $tag_count = App\Models\Tag::count();
          $faker = Faker::create('ja_JP');
          for ($i=0; $i < $faker->numberBetween(2,$tag_count); $i++) {
            $event->tags()->attach($i);
          }
        });*/
    }
}
