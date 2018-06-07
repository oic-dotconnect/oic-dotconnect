<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Tag;

class EventSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Event::truncate();

    $json = file_get_contents(__DIR__ . '/../mock-data/mock-event.json');
    $events = json_decode($json, true);

    foreach ($events as $event) {
      try {
        $tags = $event['tags'];
        $members = $event['members'];
        unset($event['tags']);
        unset($event['members']);
        $event['organizer_id'] = User::findCode($event["organaizer_code"])->id;
        $event['status'] = "open";
        unset($event['organaizer_code']);
        $new_event = Event::create($event);

        foreach ($tags as $tag) {
          $t = Tag::where('name', $tag)->first();
          if(is_null($t)) {
            $new_tag = Tag::create([
              "name" => $tag
            ]);
            $new_event->tags()->attach($new_tag->id);
          } else {
            $new_event->tags()->attach($t->id);
          }
        }

        foreach ($members as $member) {
          $id = User::findCode($member)->id;
          $new_event->users()->attach($id);
        }
      } catch(Exception $e){
        // dd($event,$e);
      }
    }
  }
}
