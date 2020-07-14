<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DoctorType;
use App\Test;
use App\News;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    
    public function users(){
        $users=User::where('role',NULL)->get();

        return view('admin.users.index')->with('users', $users);
    }

    public function doctors(){
        $doctors=User::where('role','d')->get();
        
        return view('admin.doctors.index')->with(['doctors'=>$doctors]);
    }

    public function tests(){
        $tests=Test::all();
        return view('admin.tests.index')->with('tests', $tests);
    }

    public function test($id){
        $test=Test::with('Questions')->find($id);
        return view('admin.tests.show')->with('test', $test);
    }

    public function news(){
        $news=News::orderBy('created_at','desc')->get();
        return view('admin.news.index')->with('news', $news);
    }
}
