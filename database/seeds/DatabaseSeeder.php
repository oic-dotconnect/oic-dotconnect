<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(EventTagTableSeeder::class);
        $this->call(UserTagTableSeeder::class);
        $this->call(UserEventTableSeeder::class);
        $this->call(CandidyTagTableSeeder::class);
    }
}
