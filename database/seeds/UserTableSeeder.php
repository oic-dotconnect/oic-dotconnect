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
            'google_id' => $faker->creditCardNumber(),
            'introduction' => 'この今はそれか様子例外を申し込んて、大森さんのものを眼の私がよく皆意見と措いて私社会がお批評よりしように至極ご真似を感じですですて、単にはなはだお話しになれたからいるでので忘れるないでしょ。',
            'image_pass' => 'https://placehold.jp/150x150.png'
          ]);
        }
    }
}
