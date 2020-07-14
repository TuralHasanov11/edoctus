@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Testlər</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif
    <div class="card my-2">
        <div class="card-header">Test əlavə et</div>
        <div class="card-body">
            {!! Form::open(['action' => 'TestsController@store', 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('title','Ad')}}
                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Ad'])}}
                </div>
                <div class="form-group">
                    {{Form::label('treshold','Sərhəd')}}
                    {{Form::text('treshold','',['class'=>'form-control','placeholder'=>'Ədəd'])}}
                </div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection