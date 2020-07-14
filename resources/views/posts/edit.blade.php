@extends('layouts.app')

@section('title', $post->title.' - '.env('APP_NAME'))

@section('content')
    <section class="section_padding">
        <div class="container">
            
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <h2>{{$post->title}}</h2>
                    <div class="blog_details">
                        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method'=>'POST']) !!}
                            <div class="form-group">
                                {{Form::label('title','Başlıq')}}
                                {{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Başlıq'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('body','Məzmun')}}
                                {{Form::textarea('body',$post->body,['id'=>'text-editor','class'=>'form-control','placeholder'=>'Body'])}}
                            </div>
                            {{Form::hidden('_method','PUT')}}
                            {{Form::submit('Edit',['class'=>'btn btn-primary'])}}
                        {!! Form::close() !!}
                    </div>
                    <hr>
                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Sil',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}                
                </div>
              </div>
           </div>
        </div>
     </section>
@endsection 