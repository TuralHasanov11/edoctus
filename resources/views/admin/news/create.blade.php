@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Blog</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif
    <div class="card my-2">
        <div class="card-header">Xəbər əlavə et</div>
        <div class="card-body">
            {!! Form::open(['action' => 'NewsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('title','Başlıq')}}
                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Başlıq'])}}
                </div>
                <div class="form-group">
                    {{Form::label('body','Məzmun')}}
                    {{Form::textarea('body','',['id'=>'text-editor','class'=>'form-control','placeholder'=>'Body'])}}
                </div>
                <div class="form-group">
                    {{Form::label('cover_image','Şəkil')}}
                    {{Form::file('cover_image')}}
                </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection