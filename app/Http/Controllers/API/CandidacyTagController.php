<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;


class CandidacyTagController extends Controller
{
    public function index(Request $request){
      $query = $request->input('q');      
      $tags = Tag::where('name', 'like', '%' . $query . '%')->get();
     

      return response()->json($tags);
    }
}
