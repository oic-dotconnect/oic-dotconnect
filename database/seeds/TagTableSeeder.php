<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        for ($i=0; $i < 30; $i++) {
          App\Models\Tag::create([
            'name' => 'Tag' . $count++
          ]);
        }
    }
}
