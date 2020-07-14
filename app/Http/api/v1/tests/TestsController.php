<?php

namespace App\Http\Controllers\api\v1\tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function calculate(Request $request){

        return response()->json($request);
    }
}
