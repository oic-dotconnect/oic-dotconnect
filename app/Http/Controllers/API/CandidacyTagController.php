<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Candidacy_tag;


class CandidacyTagController extends Controller
{
    public function index(Request $request){
      $query = $request->input('q');
      $tags = Candidacy_tag::get()->map(function($tag) use($query){
      	return $tag->tags()->where('name', 'like', '%' . $query . '%')->first();
      });
     //return $tags->toArray();
      $data = array_filter($tags->toArray(),function($tag){ return $tag != null; });
      $data = array_values($data);

      return response()->json($data);
    }
}
