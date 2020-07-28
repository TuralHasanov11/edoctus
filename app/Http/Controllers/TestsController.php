<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Region;
use App\AgeGroup;
use App\UserTest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestResultMail;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct(){
    //     $this->middleware('auth')->except(['index']);
    // }


    public function index()
    {
        $tests=Test::paginate(6);

        return view('tests.index')->with('tests', $tests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'treshold'=>'required'
        ]);

        $test = new Test;
        $test->title=$request->input('title');
        $test->treshold=$request->input('treshold');
        if($test->save()){
            return redirect('/admin/tests')->with('success','Test Created');
        }
        else{
            return redirect('/admin/tests')->with('error','Operation Failed');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test=Test::with(['questions'])->find($id);
        
        $ageGroups=AgeGroup::all();
        $regions=Region::all();

        return view('tests.show')->with(['result'=>NULL,'test'=>$test, 'ageGroups'=>$ageGroups, 'regions'=>$regions]);
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
        $test=Test::find($id);

       if($test->delete()){
        return redirect('/admin/tests')->with('success','Test Deleted');
       }
       else{
        return redirect('/admin/tests')->with('error','Operation Failed');
       }
        
    }

    public function calculate(Request $request, $id){

        $test=Test::find($id);
        $answers=$request->answers;
        
        $result=0;
        foreach ($test->questions as $key => $question) {
            $result+=($answers[$key]*$question->percentage);
        }

        $userTest=new UserTest([
            'result' => $result,
            'region_id'=>$request->input('region'),
            'age_group_id'=>$request->input('age_group')
        ]);

        $test->userTest()->save($userTest);

        if($request->input('email')){
            Mail::to($request->input('email'))->send(new TestResultMail(['result'=>$result,'treshold'=>$test->treshold]));
        }
        
        return redirect("/tests/$id")->with(['success'=>'Test tamamlandı','result'=>$result]);

    }

}
