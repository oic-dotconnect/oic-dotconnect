<?php

namespace App;

use Carbon\Carbon;
use Faker\Factory as Faker;

class Converter
{			
	public static function event($json,$field ,$type) {
		$data = json_decode($json, TRUE);
		$material_data = [];

		if($type === ConvertType::CONNPASS ) {
			$start = new Carbon($data['started_at']);
			$end = new Carbon($data['ended_at']);
			$r_start = new Carbon($data['started_at']);
			$r_start = $r_start->subDay(15);
			$r_end = new Carbon($data['started_at']);
			$r_end = $r_end->subDay(1);

			$material_data = [				
				'code' => array_reduce(range(1, 8), function($p){ return $p.str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz')[0]; }),
				'name' => $data['title'],
				'field' => $field,
				'description' => $data['description'],
				'opening_date'=> $start->format('Y-m-d'),
				'start_at' => $start->format('H:i:s'),
				'end_at' => $end->format('H:i:s'),
				'place' => $faker->randomElement($room),
				'capacity' => $data['limit'],
				'status' => 'open',
				'organizer_id' => $organizer_id,
				'open_date' => $r_start->format('Y-m-d'),
				'recruit_start_date' => $r_start->format('Y-m-d'),
				'recruit_end_date' => $r_end->format('Y-m-d'),
				'recruit_start_time' => $r_start->format('H:i:s'),
				'recruit_end_time' => $r_end->format('H:i:s'),
			];
		}
	}
}

class ConvertType
{
	const CONNPASS = "CONNPASS";
}

