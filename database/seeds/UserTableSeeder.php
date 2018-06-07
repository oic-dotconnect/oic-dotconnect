<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Tag;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::truncate();

    $json = file_get_contents(__DIR__ . '/../mock-data/mock-user.json');
    $users = json_decode($json, true);

    foreach ($users as $user) {
      $tags = $user['tags'];
      unset($user['tags']);
      $new_user = User::create($user);

      foreach ($tags as $tag) {
        $t = Tag::where('name', $tag)->first();
        if(is_null($t)) {
          $new_tag = Tag::create([
              "name" => $tag
          ]);
          $new_user->tags()->attach($new_tag->id);
        } else {
          $new_user->tags()->attach($t->id);
        }
      }

      try {
        $new_user->iconUp(base_path('/database/mock-data/icon/' . $new_user->code . '.png') , false);
      } catch(Exception $e) {
        // dd(storage_path('icon/' . $new_user->code . '.png'));
      }
    }
  }
}
