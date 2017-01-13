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
      $json = file_get_contents(__DIR__ . '/../mock-data/mock-event.json');
      if ($json === false) {
        throw new \RuntimeException('file not found.');
      }
      $events = json_decode($json, true);
      foreach ($events as $event) {
        try {        
          $tags = $event['tags'];
          $members = $event['members'];
          unset($event['tags']);
          unset($event['members']);
          $event['organizer_id'] = App\Models\User::findCode($event["organaizer_code"])->id;
          $event['status'] = "open";
          unset($event['organaizer_code']); 
          $new_event = App\Models\Event::create($event);       

          foreach ($tags as $tag) {
            $t = App\Models\Tag::where('name', $tag)->first();                    
            if(is_null($t)) {
              $new_tag = App\Models\Tag::create([
                "name" => $tag
              ]);
              $new_event->tags()->attach($new_tag->id);
            } else {            
              $new_event->tags()->attach($t->id);            
            }
          }
          
          foreach ($members as $member) {
            $id = App\Models\User::findCode($member)->id;
            $new_event->users()->attach($id);
          }
        } catch(Exception $e){
          dd($event,$e);
        }
        
      }
    }
}
