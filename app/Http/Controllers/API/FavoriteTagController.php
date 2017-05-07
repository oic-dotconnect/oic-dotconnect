<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class FavoriteTagController extends Controller
{
    public function index(Request $request, $code)
    {
      	$data = \App\Models\User::findCode($code)->tags;
      	return response()->json($data);
    }
}
