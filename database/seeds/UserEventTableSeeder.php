<?php

use Illuminate\Database\Seeder;

class UserEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Models\Event::all()->map(function($event){
        $user_count = App\Models\User::count();
        $faker = Faker\Factory::create('ja_JP');
        for ($i=0; $i < $faker->numberBetween(5,$event->capacity); $i++) {
          $event->users()->attach($faker->numberBetween(0, $user_count-1));
        }
      });
    }
}
