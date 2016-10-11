<?php

use Illuminate\Database\Seeder;

class CandidacyTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<16;$i++)
        {
            App\Models\Candidacy_tag::create([
                'tag_id' => $i,
            ]);
        }
    }
}
