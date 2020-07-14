@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Həkim əlavə et</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif

    <div class="card my-2">
        <div class="card-header">Həkim əlavə et</div>
        <div class="card-body">
            {!! Form::open(['action' => 'DoctorsController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('name','Ad')}}
                    {{Form::text('name','',['class'=>'form-control','placeholder'=>'Ad'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email','Email')}}
                    {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                </div>
                <div class="form-group">
                    {{Form::label('password','Şifrə')}}
                    {{Form::password('password', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('profile_image','Şəkil')}}
                    {{Form::file('profile_image')}}
                </div>
                <div class="form-group">
                    {{Form::label('bio','Məlumat')}}
                    {{Form::textarea('bio','',['id'=>'text-editor', 'class'=>'form-control','placeholder'=>'Məlumat'])}}
                </div>
                <div class="form-group">
                    {{Form::label('type','Sahə')}}
                    {{Form::select('type', $types, '', ['class'=>'form-control'])}}
                </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection