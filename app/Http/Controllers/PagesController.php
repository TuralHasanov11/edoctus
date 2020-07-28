<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Test;
use App\UserTest;
use App\AgeGroup;
use Illuminate\Database\Eloquent\Builder;

class PagesController extends Controller
{
    public function about(){
        return view('pages.about');
    }

    public function statistics(){

        $test = Test::first();
        
        $regionalInfo=Region::withCount(['userTest' => function (Builder $query) use($test) {
            $query->where('result', '>=', $test->treshold);
        }])->get();

        $ageGroupInfo=AgeGroup::withCount(['userTest' => function (Builder $query) use($test) {
            $query->where('result', '>=', $test->treshold);
        }])->get();


        return view('pages.statistics')->with(['regionalInfo'=>$regionalInfo,'ageGroupInfo'=>$ageGroupInfo]);
    }
}
