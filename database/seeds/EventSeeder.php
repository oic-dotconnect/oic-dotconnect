<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create('ja_JP');
      $fields = ['it', 'design', 'move', 'game', 'other'];
      $room = ['5A', '9D-1'];
      $bool = [true, false];
      for($i = 0; $i < 50; $i++){
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'Laravel勉強会' . $i,
          'field' => $faker->randomElement($fields),
          'description' => '<h1>説明</h1>',
          'start_date' => $date,
          'start_at' => $time,
          'end_date' => $date,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'open' => $faker->randomElement($bool),
          'open_date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years'),
          'organizer_id' => 1
        ]);
      }
    }
}
