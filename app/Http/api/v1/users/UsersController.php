<?php

namespace App\Http\Controllers\api\v1\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use App\Test;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($request->user()->with('Blogs')->get());
    }

    // ::with('Blogs')->get();
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function user(Request $request)
    {
        // $user = User::with('Blogs')->find($request->user()->id);

        return response()->json($request->user());
    }

    public function doctors(Request $request)
    {
        return response('eeee');
        $doctors=User::where('role','d')->get();
        return response()->json($doctors);
    }

    public function doctor(Request $request)
    {
        $doctor=User::with()->find($request->id);
        return response()->json($doctor);
    }

    public function calculate(Request $request){

        $test=Test::find($request->testId);
        $answers=$request->answers;
        
        $result=0;
        foreach ($test->questions as $key => $question) {
            $result+=($answers[$key]*$question->percentage);
        }

        return response()->json(['result'=>$result,'treshold'=>$test->treshold]);
    }
}
