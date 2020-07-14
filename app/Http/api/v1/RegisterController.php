<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request){
        $register = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $register['password']=Hash::make($register['password']);

        if(!User::create($register)){
            return response(['message'=>'Invalid register credentials'], 401);
        }

        return response()->json(['message' => 'Register success'],200);
    }

    public function registerDoctor(Request $request){

        $register = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
            'profile_image'=>'image|max:1999',
        ]);

        $register['password']=Hash::make($register['password']);
        $register['role']='d';

        if($request->hasFile('profile_image')){
            $fileNameWithExt=$request->file('profile_image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('profile_image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('profile_image')->storeAs('public/doctor_covers',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }

        $register['profile_image']=$fileNameToStore;

        if(!User::create($register)){
            return response(['message'=>'Invalid register credentials'], 401);
        }

        return response()->json(['message' => 'Register success'],200);
    }
}
