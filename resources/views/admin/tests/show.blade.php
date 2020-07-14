@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">{{$test->title}}</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif
    <div class="card my-2">
        <div class="card-header">Sual əlavə et</div>
        <div class="card-body">
            {!! Form::open(['action' => ['QuestionsController@store',$test->id],  'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('title','Ad')}}
                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Ad'])}}
                </div>
                <div class="form-group">
                    {{Form::label('percentage','Faiz')}}
                    {{Form::text('percentage','',['class'=>'form-control','placeholder'=>'Ədəd'])}}
                </div>
                <div class="form-group">
                    {{Form::label('question type','Növ')}}
                    <div class="form-check">
                        {{Form::radio('type', 's')}} Ölçü
                    </div>
                    <div class="form-check">
                        {{Form::radio('type', 'b')}} Hə-Yox
                    </div>
                </div>
                {{Form::hidden('test_id',$test->id)}}
                {{Form::submit('Submit',['class'=>'btn btn-primary mt-3'])}}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header"><i class="fa fa-table mr-1"></i>Test siyahısı</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="testsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Faiz</th>
                            <th>Növ</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Faiz</th>
                            <th>Növ</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($test->questions as $question)
                            <tr>
                                <td>{{$question->id}}</td>
                                <td>{{$question->title}}</td>
                                <td>{{$question->percentage}}</td>
                                <td>{{$question->type}}</td>
                                <td>
                                    {!!Form::open(['action'=>['QuestionsController@destroy',$question->id], 'method'=>'POST', 'class'=>'my-2'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Sil',['class'=>'btn btn-danger'])}}
                                    {!!Form::close()!!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection