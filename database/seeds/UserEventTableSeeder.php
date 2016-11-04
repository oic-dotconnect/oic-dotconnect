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

        $z=0;
        for($i=0;$i<11;$i++){
            DB::table('user_event')->insert([
                'event_id' => $i,
                'user_id' => $z,
                'role' => 'admin'
                ]);
            $z++;
            }

        $z=6;
        for($i=0;$i<11;$i++){
            for($j=0;$j<5;$j++){
        DB::table('user_event')->insert([
            'event_id' => $i,
            'user_id' => $z,
            'role' => 'member'
            ]);
        $z++;
            }
        }

      /*App\Models\Event::all()->map(function($event){
        $user_count = App\Models\User::count();
        $faker = Faker\Factory::create('ja_JP');
        for ($i=0; $i < $faker->numberBetween(5,$event->capacity); $i++) {
          $event->users()->attach($faker->numberBetween(0, $user_count-1));
        }
      });*/
    }
}
