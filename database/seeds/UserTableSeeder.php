<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        for ($i=0; $i < 40; $i++) {
          App\Models\User::create([
            'email' => sprintf('b%04d@oic.jp', $i),
            'name' => 'nickname'.$i,
            'student_name' => $faker->name(),
            'google_id' => $faker->creditCardNumber()
          ]);
        }
    }
}
