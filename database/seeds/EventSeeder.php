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

    /*
    イベントデータ
    laravel勉強会とUnity勉強会は開催中
    Vue.Js勉強会とモンストは未公開
    PhotoShop勉強会は中止
    */
    public function run()
    {
      $faker = Faker::create('ja_JP');
      $fields = ['it', 'design', 'move', 'game', 'other'];
      $room = ['5A', '9D-1','3A'];
      $bool = [true, false];
      $organizer_id = 1;
      for($i = 0; $i < 2; $i++)
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
          'organizer_id' => $organizer_id,
          'open_date' => date('Y-m-d',strtotime($date.'-2 week')),
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
        $organizer_id++;
      }
      for($i = 0; $i < 2; $i++)
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
          'organizer_id' => $organizer_id,
          'open_date' => date('Y-m-d',strtotime($date.'-2 week')),
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
        $organizer_id++;
      }
      for($i = 0; $i < 2; $i++)
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
          'status' => 'stop',
          'organizer_id' => $organizer_id,
          'open_date' => date('Y-m-d',strtotime($date.'-2 week')),
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
        $organizer_id++;
      }
      for($i = 0; $i < 2; $i++)
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
          'organizer_id' => $organizer_id,
          'open_date' => date('Y-m-d',strtotime($date.'-2 week')),
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
        $organizer_id++;
      }
      for($i = 0; $i < 2; $i++)
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
          'organizer_id' => $organizer_id,
          'open_date' => date('Y-m-d',strtotime($date.'-2 week')),
          'recruit_start_date' => date('Y-m-d',strtotime($date.'-4 week')),
          'recruit_end_date' => date('Y-m-d',strtotime($date.'-1 week')),
          'recruit_start_time' => $time,
          'recruit_end_time' => date('H:i:s',strtotime($time.'+2 hour')),
        ]);
        $organizer_id++;
      }
    }
}
