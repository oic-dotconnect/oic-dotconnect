<?php

use Illuminate\Database\Seeder;

class UserTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Models\User::all()->map(function($user){
        $tag_count = App\Models\Tag::count();
        $faker = Faker\Factory::create('ja_JP');
        for ($i=0; $i < $faker->numberBetween(2,$tag_count); $i++) {
          $user->tags()->attach($i);
        }
      });
    }
}
