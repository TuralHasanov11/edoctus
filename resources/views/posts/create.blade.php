@extends('layouts.app')

@section('title', 'Post Paylaş - '.env('APP_NAME'))

@section('content')
    <section class="section_padding">
        <div class="container">
            
           <div class="row">
              <div class="col-lg-8 posts-list">
                 <div class="single-post">
                    <h2>Post Paylaş</h2>
                    <div class="blog_details">
                        {!! Form::open(['action' => ['PostsController@store'], 'method'=>'POST']) !!}
                            <div class="form-group">
                                {{Form::label('title','Başlıq')}}
                                {{Form::text('title','',['class'=>'form-control','placeholder'=>'Başlıq'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('body','Məzmun')}}
                                {{Form::textarea('body','',['id'=>'text-editor','class'=>'form-control','placeholder'=>'Body'])}}
                            </div>
                            {{Form::submit('Paylaş',['class'=>'btn btn-success'])}}
                        {!! Form::close() !!}
                    </div>              
                </div>
              </div>
           </div>
        </div>
     </section>
@endsection 