@extends('layouts.admin')

@section('content')
    <h1 class="mt-4">Testlər</h1>
    @include('inc.messages')
    @if (session('status'))
    <div class="alert alert-success" role="alert">
       {{ session('status') }}
    </div>
    @endif

    <div class="card my-4">
        <div class="card-header"><i class="fa fa-table mr-1"></i>Test siyahısı</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="testsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Sərhəd</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>İd</th>
                            <th>Ad</th>
                            <th>Sərhəd</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($tests as $test)
                            <tr>
                                <td>{{$test->id}}</td>
                                <td>{{$test->title}}</td>
                                <td>{{$test->treshold}}</td>
                                <td>
                                    <a href="/admin/tests/{{$test->id}}" class="btn btn-primary">Edit</a>
                                    {!!Form::open(['action'=>['TestsController@destroy',$test->id], 'method'=>'POST', 'class'=>'my-2'])!!}
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