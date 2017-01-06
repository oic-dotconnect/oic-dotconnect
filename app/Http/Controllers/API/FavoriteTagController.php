<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;

class FavoriteTagController extends Controller
{
    public function index(Request $request, $code)
    {
      	$data = User::FindCode($code)->tags;        
      	return response()->json($data);
    }
}
