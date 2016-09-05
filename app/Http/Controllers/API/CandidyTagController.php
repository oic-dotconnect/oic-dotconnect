<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Candidy_tag;

class CandidyTagController extends Controller
{
    public function index(Request $request){
      $query = $request->input('q');
      return Candidy_tag::where('name', 'like', '%' . $query . '%')->get();
    }
}
