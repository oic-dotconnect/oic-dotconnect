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
        $json = file_get_contents(__DIR__ . '/../mock-data/mock-tag.json');
        if ($json === false) {
          throw new \RuntimeException('file not found.');
        }
        $tags = json_decode($json, true);
        foreach ($tags as $tag) {
          App\Models\Tag::create([
            'name' => $tag
          ]);
        }
    }
}
