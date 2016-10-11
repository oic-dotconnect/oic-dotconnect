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
      $room = ['5A', '9D-1','3A'];
      $bool = [true, false];
      for($i = 0; $i < 5; $i++)
      {
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'Laravel勉強会' . $i,
          'field' => 'it',
          'description' => '<h1>説明</h1>',
          'opening_date'=>$date,
          'start_at' => $time,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'status' => 'open',
          'organizer_id' => 1,
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
      }
      for($i = 0; $i < 5; $i++)
      {
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'Vue.Js勉強会' . $i,
          'field' => 'it',
          'description' => '<h1>説明</h1>',
          'opening_date'=>$date,
          'start_at' => $time,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'status' => 'close',
          'organizer_id' => 2,
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
      }
      for($i = 0; $i < 10; $i++)
      {
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'PhotoShop勉強会' . $i,
          'field' => 'design',
          'description' => '<h1>説明</h1>',
          'opening_date'=>$date,
          'start_at' => $time,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'status' => 'finish',
          'organizer_id' => 3,
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
      }
      for($i = 0; $i < 10; $i++)
      {
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'Unity勉強会' . $i,
          'field' => 'game',
          'description' => '<h1>説明</h1>',
          'opening_date'=>$date,
          'start_at' => $time,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'status' => 'open',
          'organizer_id' => 4,
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
      }
      for($i = 0; $i < 5; $i++)
      {
        $datetime = $faker->dateTimeBetween($startDate = '-1 years', $endDate = '+1 years');
        $date = $datetime->format('Y-m-d');
        $time = $datetime->format('H:i:s');
        App\Models\Event::create([
          'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
          'name' => 'モンスト超獣神祭爆死大会' . $i,
          'field' => 'other',
          'description' => '<h1>説明</h1>',
          'opening_date'=>$date,
          'start_at' => $time,
          'end_at' => date('H:i:s', strtotime($time.'+2 hour')),
          'place' => $faker->randomElement($room),
          'capacity' => $faker->numberBetween(10,100),
          'status' => 'close',
          'organizer_id' => 5,
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
      }
    }
}
