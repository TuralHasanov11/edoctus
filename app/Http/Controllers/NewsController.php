<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('checkAdmin')->except(['index', 'show']);
    }


    public function index()
    {
        $news=News::orderBy('created_at', 'desc')->paginate(6);
        return view('news.index')->with('news',$news);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('news.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        // Image upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/images/news',$fileNameToStore);
           
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
        
        $news = new News;
        $news->title=$request->input('title');
        $news->body=$request->input('body');
        $news->cover_image=$fileNameToStore;

        if($news->save()){
            return redirect('/admin/news')->with('success', 'news uploaded successfully!');
        }

        return redirect('/admin/news')->with('error', 'news could not be uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news=News::find($id);

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);

        return view('news.edit')->with('news', $news);
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
        $request->validate([
            'title'=>'required|string',
            'body'=>'required|string',
        ]);

        // Image upload
        if($request->hasFile('cover_image')){
            $fileNameWithExt=$request->file('cover_image')->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore=$fileName.'_'.time().'.'.$extension;
            $path=$request->file('cover_image')->storeAs('public/images/news',$fileNameToStore);
        }
        else{
            $fileNameToStore='noimage.jpg';
        }
        
        $news=News::find($id);
        $news->title=$request->input('title');
        $news->body=$request->input('body');
        if($request->hasFile('cover_image')){
            if($news->cover_image!='noimage.jpg'){
                // Delete image
                Storage::delete('public/images/news/'.$news->cover_image);
            }
            $news->cover_image= $fileNameToStore;
        }
        $news->save();

        return redirect('/news')->with('success','news Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news=News::find($id);

        if($news->cover_image!='noimage.jpg'){
            // Delete image
            Storage::delete('public/images/news/'.$news->cover_image);
        }

        $news->delete();
        return redirect('/admin/news')->with('success','news Deleted');
    }
}
