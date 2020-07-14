<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionsController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'percentage'=>'required',
            'type'=>'required'
        ]); 
        // dd($request);
        $question=new Question;
        $question->test_id=$request->input('test_id');
        $question->title=$request->input('title');
        $question->percentage=$request->input('percentage');
        $question->type=$request->input('type');

        $question->save();

        return redirect('/admin/tests/'.$request->input('test_id'))->with('success','Question added');

    }

    public function destroy($id)
    {

        $question=Question::find($id);
        $test_id=$question->test_id;
        if($question->delete()){
            return redirect('/admin/tests/'.$test_id)->with('success','Sual silindi');
        }
        else{
            return redirect('/admin/tests'.$test_id)->with('error','Operation Failed');
        } 
    }
}
